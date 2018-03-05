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
    
    public function show_post($arg)
    {
        $query = "SELECT * FROM posts WHERE users_id = $arg ORDER BY posts.id DESC";
		$postsToshow = $this->db->query($query)->result_array();
		return $postsToshow;
    }

    public function edit_item($id, $arg) 
	{
		$query = "UPDATE posts SET title = ?, post = ?, company_url= ? WHERE id = $id";
		$values = [$arg['title'], $arg['post'], $arg['company_url']];
        $this->db->query($query, $values);
    }
    
    public function delete_post($id)
    {
        $query = "DELETE FROM posts WHERE id = $id";
        $this->db->query($query);
    }

    public function delete_user($id)
    {
        $query = "DELETE FROM posts WHERE users_id = $id";
        $query2 = "DELETE FROM users WHERE id = $id";
        $this->db->query($query);
        $this->db->query($query2);
    }
}
?>