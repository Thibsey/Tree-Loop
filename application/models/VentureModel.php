<?php
defined('BASEPATH') or exit('No direct script access allowed');
class VentureModel extends CI_Model
{

    public function add_user($arg = array())
    {
        return $this->db->insert('users', $arg);
    }

    public function get_user_by_username($username)
    {
        return $this->db->query("SELECT * FROM users WHERE user_name = ?", array($username))->row_array();
    }

}
?>