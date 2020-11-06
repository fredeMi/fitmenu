<?php
require_once "application/libraries/Category.php";
class Category_model extends MY_Model
{
    // charge les catégories de l'établissement en cours
    public function loadCategories($etabId)
    {
        if ($etabId === 0) {
            $newCat = new Category;
            $newCat->name = 'Pas encore de catégorie créée';
            $newCat->id = 0;
            return $newCat;
        }
        $query = $this->db->query("SELECT * FROM category WHERE estab_id= $etabId");
        return $query->custom_result_object('Category');
    }

    public function loadOneCat($etabId, ?int $catId = NULL)
    {
        if ($catId === NULL) {
            $newCat = new Category;
            $newCat->estab_id = $etabId;
            return $newCat;
        }
        $query = $this->db->query("SELECT * FROM category WHERE id= $catId");
        return $query->custom_row_object(0, 'Category');
    }

    public function insertCat($insertInfos)
    {
        $this->db->insert('category', $insertInfos);
    }

    public function updateQuery($updateInfos)
    {
        $this->db->set($updateInfos);
        $this->db->where('id', $updateInfos['id']);
        $this->db->update('category');
    }

    public function deleteQuery($catId)
    {
        $this->db->where('id', $catId);
        $this->db->delete('category');
    }
}
