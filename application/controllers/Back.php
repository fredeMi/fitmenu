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
        $this->output->enable_profiler(TRUE);
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
    public function establishment(?int $etabId = NULL)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/etabInfos', $this->data);
        $this->load->view('templates/footer');
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

    // TODO méthode supprimer etablissement
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

    public function category($catId)
    {
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back');
        $etabId = $this->session->etabId;
        $this->data['cat'] = $this->Category_model->loadOneCat($etabId, $catId);
        $this->load->view('back/category', $this->data);
        $this->load->view('templates/footer');
    }

    public function createCat()
    {
        $catId = $this->Category_model->insertCat();
        redirect('back/category/' . $catId);
    }

    public function updateCat($catId)
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $this->Category_model->updateQuery($catId, $name, $description);
        redirect('back/categories');
    }
}
