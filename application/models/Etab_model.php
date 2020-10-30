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

    public function loadOneEtab($userId, ?int $etabId = NULL)
    {
        if ($etabId === NULL) {
            return new Etab;
        }
        $query = $this->db->query("SELECT * FROM establishment WHERE user_id= $userId AND id= $etabId");
        return $query->custom_row_object(0, 'Etab');
    }

    public function updateQuery($updateInfos)
    {
        // update ne fonctionne pas avec objet !
        $this->db->set($updateInfos, FALSE);
        $this->db->where('id', $updateInfos['id']);
        $this->db->where('user_id', $updateInfos['user_id']);
        $this->db->update('establishment');
    }

    // TODO modifier pour qu'elle s'éxécute après enregistrement des infos
    public function insertEtab($insertInfos)
    {
        $this->db->insert('establishment', $insertInfos);
    }
}
