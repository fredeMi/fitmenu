<?php
require_once "application/libraries/Etab.php";
class Etab_model extends MY_Model
{
    // charge les données des établissements du user en cours
    public function loadEtab($userId)
    {
        $query = $this->db->query("SELECT * FROM establishment WHERE user_id= $userId");
        return $query->custom_result_object('Etab');
    }

    public function loadOneEtab($userId,?int $etabId=NULL)
    {
        if($etabId === NULL){
            return new Etab;
        }
        $query = $this->db->query("SELECT * FROM establishment WHERE user_id= $userId AND id= $etabId");
        return $query->custom_row_object(0, 'Etab');
    }

    public function updateQuery($id, $name, $adress, $zip_code, $city, $phone, $web_site, $maintenance)
    {   // TODO:
        // Créer d'abord objet instance de Etab avec données du post dans updateEtab()? puis envoyer l'objet en set()
        $userId = $this->session->user_id;
        $updateInfos = ['name' => $name, 'adress' => $adress, 'zip_code' => $zip_code, 'city' => $city, 'phone' => $phone, 'web_site' => $web_site, 'maintenance' => $maintenance];
        $this->db->set($updateInfos);
        $this->db->where('id', $id);
        $this->db->where('user_id', $userId);
        $this->db->update('establishment');
    }

    public function insertEtab()
    {
        $userId = $this->session->id;
        $insertInfos = ['user_id' => $userId];
        $this->db->set($insertInfos);
        $this->db->insert('establishment');
        // recupérer dernier id inséré et le passer en session
        $this->session->etabId = $this->db->insert_id();
    }
}
