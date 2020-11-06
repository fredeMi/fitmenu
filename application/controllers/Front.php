<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('front/home');
        $this->load->view('templates/footer');
    }

    public function cover()
    {
        $uri = explode('/', uri_string());
        $etabURI = $uri['1'];
        // si URI appartient à la DB dans menu_site -> affiche couverture carte
        if ($this->Etab_model->etabExists($etabURI) == 1) {
            $this->data['etab'] = $this->Etab_model->loadFrontEtabId($etabURI);
            $this->data['categories'] = $this->Category_model->loadCategories($this->data['etab']->id);
            $this->load->view('templates/header');
            $this->load->view('templates/nav_front', $this->data);
            $this->load->view('front/cover', $this->data);
            $this->load->view('templates/footer');
        } else {
            redirect('/');
        }
    }

    public function card($etabId, $catId)
    {
        $this->data['etab'] = $this->Etab_model->loadFrontEtab($etabId);
        $this->data['categories'] = $this->Category_model->loadCategories($etabId);
        $this->data['cat'] = $this->Category_model->loadOneCat($etabId, $catId);
        $this->data['products'] = $this->Product_model->loadProducts($catId);

        $this->load->view('templates/header');
        $this->load->view('templates/nav_front', $this->data);
        $this->load->view('front/card', $this->data);
        $this->load->view('templates/footer');
    }
}
