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
}