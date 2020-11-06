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

    public function loadOneEtab($userId, ?int $etabId = 0)
    {
        if ($etabId === 0) {
            return new Etab;
        }
        $query = $this->db->query("SELECT * FROM establishment WHERE user_id= $userId AND id= $etabId");
        return $query->custom_row_object(0, 'Etab');
    }

    public function loadFrontEtab($etabId)
    {
        $query = $this->db->query("SELECT * FROM establishment WHERE id= $etabId");
        return $query->custom_row_object(0, 'Etab');
    }

    public function loadFrontEtabId($etabMenuSite)
    {
        $this->db->where('menu_site', $etabMenuSite);
        return $this->db->get()->row(0, 'Etab');
    }

    public function etabExists($etabMenuSite)
    {
        $this->db->where('menu_site', $etabMenuSite);
        return $this->db->count_all_results('establishment', FALSE);
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

    public function deleteQuery($etabId)
    {
        $this->db->where('id', $etabId);
        $this->db->delete('establishment');
    }
}
