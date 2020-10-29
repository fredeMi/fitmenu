<?php
require_once "application/libraries/Category.php";
class Category_model extends MY_Model
{
    // charge les catégories de l'établissement en cours
    public function loadCategories()
    {
        $etabId = $this->session->etabId;
        $query = $this->db->query("SELECT * FROM category WHERE estab_id= $etabId");
        return $query->custom_result_object('Category');
    }

    public function loadOneCat($etabId, $catId)
    {
        $query = $this->db->query("SELECT * FROM category WHERE estab_id= $etabId AND id= $catId");
        return $query->custom_row_object(0, 'Category');
    }

}