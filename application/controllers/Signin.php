<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
{

    public function index()
    {
        if ($this->session->flashdata('info') == 'ko') {
            $this->data['info'] = '<div class="alert alert-warning" role="alert">Inscription impossible, veuillez vérifier votre saisie</div>';
        } elseif ($this->session->flashdata('info') == 'ok') {
            $this->data['info'] = '<div class="alert alert-success" role="alert">Vous êtes bien inscrit.e, vous pouvez   <a href="login" type="button" class="btn btn-info text-light">Vous connecter</a></div>';
        } else {
            $this->data['info'] = '<div class="alert alert-info" role="alert">Veuillez saisir email et mot de passe valides</div>';
        }
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('front/signin', $this->data);
        $this->load->view('templates/footer');
    }

    public function addUser()
    {
        // recup les données entrées dans formulaire
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // recup infos du user correspondant dans la DB
        $this->load->model('User_model', 'User');
        $userQuery = $this->User->insertUser($email, $password);

        // si requete nulle alors redirect mm page sinon ok inscription et redirect vers login?
        if (!$userQuery) {
            $this->session->set_flashdata('info', 'ko');
            redirect('signin');
        } else {
            $this->session->set_flashdata('info', 'ok');
            redirect('signin');
        }
    }
}