<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->data['errorLog'] = '';
        if ($this->session->flashdata('errorLog') == 'ko') {
            $this->data['errorLog'] = '<div class="alert alert-warning" role="alert">Connexion impossible, veuillez vérifier vos identifiants</div>';
        }
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('front/login', $this->data);
        $this->load->view('templates/footer');
    }

    // va recup les données user via model User pour lui afficher son tableau de bord
    public function checkUser()
    {
        // recup les données entrées dans formulaire
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // recup infos du user correspondant dans la DB
        $this->load->model('User_model', 'User');
        $userQuery = $this->User->loadUser($email, $password);
        $user = $userQuery->row();

        // si requete nulle alors redirect mm page sinon ok ouverture session et redirect vers controller Back / methode qui va afficher vue dashboard
        if($userQuery->num_rows() == 0){ // TODO ajouter si user non validé par email envoyé: || $user->active === 0
            $this->session->set_flashdata('errorLog', 'ko');
            redirect('login');
        }
        else{
            $this->session->id = $user->id;
            redirect('back');
        }

    }
}
