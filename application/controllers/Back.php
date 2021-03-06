<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{

    private array $data;
    private int $userId;

    public function __construct()
    {
        parent::__construct();
        if(!isset($this->session->id)){
            redirect('login');
        };
        $this->userId = $this->session->id;
        // récupère établissements de l'utilisateur en cours
        $this->data['etabs'] = $this->Etab_model->loadEtab($this->userId);
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId);
    }

    // affiche TOUS les établissements du user en cours
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('back/dashboard', $this->data);
        $this->load->view('templates/footer');
    }

    // fonctions pour un établissement
    // affiche info UN établissement en cours
    public function establishment(?int $etabId = 0)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/etabInfos', $this->data);
        $this->load->view('templates/footer');
    }

    // page modif du logo et de la description etablissement
    public function customisation(?int $etabId = 0)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        if ($this->session->flashdata('error') == 'ok') {
            $this->data['error'] = '<div class="alert alert-info" role="alert">Votre fichier a bien été téléchargé</div>';
        } elseif ($this->session->flashdata('error') == 'ko') {
            $this->data['error'] = '<div class="alert alert-warning" role="alert">Erreur de chargement de votre fichier</div>';
        }
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/customisation', $this->data);
        $this->load->view('templates/footer');
    }

    public function upload_logo()
    {
        $etabId = $this->input->post('etabId');
        $updateInfos['id'] = $etabId;
        $updateInfos['user_id'] = $this->session->id;

        // crée un tableau des chemins des fichiers correspondant au pattern et supprime ces fichiers
        array_map('unlink', glob('uploads/logos/logo_' . $etabId . '.*'));

        $config['upload_path']          = './uploads/logos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = 'logo_' . $etabId;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        // si le chargement ne se fait pas renvoie ko à la div alert sinon met à jour la db et vide les caches
        if (!$this->upload->do_upload('userfile')) {
            $this->session->set_flashdata('error', 'ko');
        } else {
            $this->session->set_flashdata('error', 'ok');
            $updateInfos['logo'] = 'logo_'.$etabId.$this->upload->data('file_ext');
            $this->Etab_model->updateQuery($updateInfos);
            $this->output->delete_cache('back/customisation/' . $etabId);
            $this->output->delete_cache('back/establishment/' . $etabId);
        }
        redirect('back/customisation/' . $etabId);
    }

    // crée nouvel établissement ou modifie infos établissement
    public function registerEtab()
    {
        // recup infos du post et ajoute le userId en cours
        $updateInfos = $this->input->post(NULL, TRUE);
        $updateInfos['user_id'] = $this->session->id;
        // si nouvel etab alors insere dans la DB
        if ($updateInfos['id'] == 0) {
            $this->Etab_model->insertEtab($updateInfos);
        } else {
            // sinon met à jour infos etab dans la DB
            $this->Etab_model->updateQuery($updateInfos);
        }
        redirect('back');
    }

    public function deleteEtab($etabId)
    {
        $this->Etab_model->deleteQuery($etabId);
        redirect('back');
    }
    // fin fonctions établissement(s)

    // fonctions catégories
    public function categories($etabId)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/categories', $this->data);
        $this->load->view('templates/footer');
    }

    public function category($etabId,  ?int $catId = NULL)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->data['cat'] = $this->Category_model->loadOneCat($etabId, $catId);
        $this->load->view('back/category', $this->data);
        $this->load->view('templates/footer');
    }


    public function registerCat()
    {
        // recup infos du post "enregistrer la catégorie"
        $updateInfos = $this->input->post(NULL, TRUE);
        // si nouvel cat alors insere dans la DB
        if ($updateInfos['id'] == 0) {
            $this->Category_model->insertCat($updateInfos);
        } else {
            // sinon met à jour infos cat dans la DB
            $this->Category_model->updateQuery($updateInfos);
        }
        redirect('back/categories/' . $updateInfos['estab_id']);
    }

    public function deleteCat($etabId, $catId)
    {
        $this->Category_model->deleteQuery($catId);
        redirect('back/categories/' . $etabId);
    }

    // fin fonctions catégories

    // fonctions produits
    public function products($etabId, $catId)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->data['cat'] = $this->Category_model->loadOneCat($etabId, $catId);
        $this->data['products'] = $this->Product_model->loadProducts($catId);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/products', $this->data);
        $this->load->view('templates/footer');
    }

    public function product($etabId, $catId, ?int $prodId = NULL)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->data['prod'] = $this->Product_model->loadOneProd($catId, $prodId);
        $this->load->view('back/product', $this->data);
        $this->load->view('templates/footer');
    }


    public function registerProd($etabId)
    {
        $updateInfos = $this->input->post(NULL, TRUE);
        // si nouveau produit alors insere dans la DB
        if ($updateInfos['id'] == 0) {
            $this->Product_model->insertProd($updateInfos);
        } else {
            // sinon met à jour infos prod dans la DB
            $this->Product_model->updateQuery($updateInfos);
        }
        redirect('back/products/' . $etabId . '/' . $updateInfos['cat_id']);
    }

    public function deleteProd($etabId, $catId, $prodId)
    {
        $this->Product_model->deleteQuery($prodId);
        redirect('back/products/' . $etabId . '/' . $catId);
    }

    // fin fonctions produits

    // se deconnecter
    public function logOut(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('infoLog', 'logout');
        redirect('login');
    }

}
