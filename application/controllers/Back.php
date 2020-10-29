<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{

    // affiche tous les établissements du user en cours
    public function index()
    {
        $this->load->view('templates/header');
        // récupère et affiche infos DB via id utilisateur en session
        $userId = $this->session->id;
        $this->load->model('Etab_model');
        $data['etabs'] = $this->Etab_model->loadEtab($userId);
        $this->load->view('back/dashboard', $data);
        $this->load->view('templates/footer');
    }

    // fonctions établissement
    // affiche info établissement en cours
    public function establishment($etabId)
    {
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back');
        // récupère et affiche infos DB via etabId en get
        $userId = $this->session->id;
        $this->session->etabId = $etabId;
        $this->load->model('Etab_model');
        $data['etab'] = $this->Etab_model->loadOneEtab($userId, $etabId);
        $this->load->view('back/etabInfos', $data);
        $this->load->view('templates/footer');
    }

    // initialise un établissement et renvoie sur affichage infos
    public function createEtab()
    {
        $this->load->model('Etab_model');
        $this->Etab_model->insertEtab();
        $etabId = $this->session->etabId;
        redirect('back/establishment/' . $etabId);
    }

    // modifie infos établissement
    public function updateEtab()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $adress = $this->input->post('adress');
        $zip_code = $this->input->post('zip_code');
        $city = $this->input->post('city');
        $phone = $this->input->post('phone');
        $web_site = $this->input->post('web_site');
        $maintenance = $this->input->post('maintenance');
        $this->load->model('Etab_model');
        $this->Etab_model->updateQuery($id, $name, $adress, $zip_code, $city, $phone, $web_site, $maintenance);
        redirect('back');
    }

    // TODO méthode supprimer etablissement
    // fin fonctions établissement(s)

    // fonctions catégories
    public function categories()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back');
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->loadCategories();
        $this->load->view('back/categories', $data);
        $this->load->view('templates/footer');
    }

    public function category($catId)
    {
        $this->load->view('templates/header');
        $this->load->view('templates/nav_back');
        $etabId = $this->session->etabId;
        $this->load->model('Category_model');
        $data['cat'] = $this->Category_model->loadOneCat($etabId, $catId);
        $this->load->view('back/category', $data);
        $this->load->view('templates/footer');
    }

    public function createCat()
    {
        $this->load->model('Category_model');
        $this->Etab_model->insertCat();
        redirect('back/category');
    }
}
