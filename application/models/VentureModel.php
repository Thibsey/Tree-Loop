<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VentureModel extends CI_Model
{
    public function add_user($arg = array())
    {
        return $this->db->insert('users', $arg);
    }

    public function get_user_by_email($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }
    public function insertJob($postInfo) 
	{
        return $this->db->insert('posts', $postInfo);
	}
}
?>