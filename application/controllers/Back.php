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
        $this->data['etabs'] = $this->Etab_model->loadEtab($this->userId);
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId);
        // print_r($this->data['etab']);
        $this->output->enable_profiler(TRUE);
    }

    // affiche tous les établissements du user en cours
    public function index()
    {
        $this->load->view('templates/header');
        // récupère et affiche infos DB via id utilisateur en session
        $this->load->view('back/dashboard', $this->data);
        $this->load->view('templates/footer');
    }

    // fonctions établissement
    // affiche info UN établissement en cours
    public function establishment(?int $etabId = NULL)
    {
        $this->data['etab'] = $this->Etab_model->loadOneEtab($this->userId, $etabId);
        print_r($this->data['etab']);
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back', $this->data);
        $this->load->view('back/etabInfos', $this->data);
        $this->load->view('templates/footer');
    }

    // initialise un établissement et renvoie sur affichage infos
    public function createEtab()
    {
        $this->Etab_model->insertEtab();
        $etabId = $this->session->etabId;
        redirect('back/establishment/' . $etabId);
    }

    // modifie infos établissement
    public function updateEtab()
    {
        // recup infos du post et ajoute le userId en cours
        $updateInfos = $this->input->post(NULL, TRUE);
        $updateInfos['user_id'] = $this->session->id;
        $this->Etab_model->updateQuery($updateInfos);
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
