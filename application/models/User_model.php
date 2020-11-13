<?php

class User_model extends CI_Model
{
    private int $id;
    private string $email;
    private int $active = 0;
    private string $password = '';
    private $creation;

    public function loadUser($email, $password)
    {
        $this->db->select('id', 'active');
        $this->db->from('user');
        $user = ['email' => $email, 'password' => $password];
        $this->db->where($user);
        $query = $this->db->get();
        return $query;
    }

    public function insertUser($email, $password)
    {
        $user = ['email' => $email, 'password' => $password];
        $query = $this->db->insert('user', $user);
        return $query;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
