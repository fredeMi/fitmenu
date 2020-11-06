<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{

    private array $data;
    private int $userId;

    public function __construct()
    {
        parent::__construct();
        $this->userId = $this->session->id;
        // récupère établissements de l'utilisateur en cours
        $this->data['etabs'] = $this->Etab_model->loadEtab($this->userId);
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId);
        // $this->output->enable_profiler(TRUE);
    }

    // affiche TOUS les établissements du user en cours
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('back/dashboard', $this->data);
        $this->load->view('templates/footer');
    }

    // fonctions établissement
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

    public function customisation(?int $etabId = 0)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->data['error'] = '';
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/customisation', $this->data);
        $this->load->view('templates/footer');
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('back/customisation');

            echo "<script>alert(\"Erreur de chargement de votre fichier: $error[0]\")</script>";

            // $this->load->view('upload_form', $error);
        } else {
            redirect('back/customisation');
            echo "<script>alert(\"Votre fichier a bien été téléchargé\")</script>";
            
            // $data = array('upload_data' => $this->upload->data());
            // $this->load->view('upload_success', $data);
        }
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

}
