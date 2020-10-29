<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // public function select($table){
    //     $query = $this->db->query("SELECT * FROM establishment WHERE user_id= $userId");
    //     return $query->custom_result_object('Etab');
    // }


}