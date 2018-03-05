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

    public function one_post($num)
    {
        return $this->db->query("SELECT * FROM posts WHERE id = $num")->row_array();
    }

    public function home_page_list()
    {
        return $this->db->query("SELECT * FROM posts WHERE verify = 1 ORDER BY created_at DESC;")->result_array();
    }
}
?>