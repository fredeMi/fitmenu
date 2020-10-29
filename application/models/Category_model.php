<?php
require_once "application/libraries/Category.php";
class Category_model extends MY_Model
{
    // charge les catégories de l'établissement en cours
    public function loadCategories($etabId)
    {
        $query = $this->db->query("SELECT * FROM category WHERE estab_id= $etabId");
        return $query->custom_result_object('Category');
    }

    public function loadOneCat($etabId, $catId)
    {
        $query = $this->db->query("SELECT * FROM category WHERE estab_id= $etabId AND id= $catId");
        return $query->custom_row_object(0, 'Category');
    }

    public function insertCat()
    {
        $etabId = $this->session->etabId;
        $insertInfos = ['estab_id' => $etabId, 'name' => 'Nom de votre nouvelle catégorie', 'description' => 'Description de votre nouvelle catégorie', 'rank' => 0, 'image' => '/assets/img/egg-solid.svg'];
        $this->db->set($insertInfos);
        $this->db->insert('category');
        // retourne dernier id inséré
        return $this->db->insert_id();
    }

    public function updateQuery($catId, $name, $description)
    {
        $etabId = $this->session->etabId;
        $updateInfos = ['name' => $name, 'description' => $description];
        $this->db->set($updateInfos);
        $this->db->where('id', $catId);
        $this->db->where('estab_id', $etabId);
        $this->db->update('category');
    }
}
