<?php
require_once "application/libraries/Product.php";
class Product_model extends MY_Model
{
    public function loadProducts($catId)
    {
        $query = $this->db->query("SELECT * FROM product WHERE cat_id = $catId");
        return $query->custom_result_object('Product');
    }

    public function loadOneProd($catId, ?int $prodId = NULL)
    {
        if ($prodId === NULL) {
            $newProd = new Product;
            $newProd->cat_id = $catId;
            return $newProd;
        }
        $query = $this->db->query("SELECT * FROM product WHERE id= $prodId");
        return $query->custom_row_object(0, 'Product');
    }

    public function insertProd($insertInfos)
    {
        $this->db->insert('product',$insertInfos);
    }

    public function updateQuery($updateInfos)
    {
        $this->db->set($updateInfos);
        $this->db->where('id', $updateInfos['id']);
        $this->db->update('product');
    }

    public function deleteQuery($prodId)
    {
        $this->db->where('id', $prodId);
        $this->db->delete('product');
    }

}
