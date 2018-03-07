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
    public function insertJob($postInfo, $tagInfo1, $tagInfo2, $tagInfo3) 
	{
        $this->db->insert('posts', $postInfo);
        $postId = $this->db->query("SELECT id FROM posts ORDER BY created_at DESC LIMIT 1;")->row_array();
        $query = "INSERT INTO tags_has_posts (tags_id, posts_id) VALUES (?,?)";
        $values = [$tagInfo1, $postId];
        $this->db->query($query, $values);
        $values = [$tagInfo2, $postId];
        $this->db->query($query, $values);
        $values = [$tagInfo3, $postId];
        $this->db->query($query, $values);
    }

    public function one_post($num)
    {
        return $this->db->query("SELECT * FROM posts WHERE id = $num")->row_array();
    }

    public function home_page_list()
    {
        return $this->db->query("SELECT * FROM posts WHERE verify = 1 ORDER BY created_at DESC LIMIT 5;")->result_array();
    }

    public function show_page_list()
    {
        return $this->db->query("SELECT posts.id, posts.title, posts.post, posts.created_at, posts.verify, users.comp_name
                                FROM posts
                                LEFT JOIN users
                                ON posts.users_id = users.id
                                WHERE  verify = 1 
                                ORDER BY created_at DESC;")->result_array();
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

    public function addOneTitle($id) 
	{
		$query = "SELECT id, title FROM posts ORDER BY id DESC";

		$listTitle = $this->db->query($query)->result_array($id);
		// var_dump($query);
		// die();
		
		return $listTitle;
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

    public function admin_take_users_for_verify()
    {
        return $this->db->query("SELECT * FROM users WHERE rank_id = 3")->result_array();
    }

    public function admin_take_users()
    {
        return $this->db->query("SELECT * FROM users WHERE rank_id < 3")->result_array();
    }

    public function admin_take_users_non_admins()
    {
        return $this->db->query("SELECT * FROM users WHERE rank_id = 2")->result_array();
    }

    public function admin_verify_user($id)
    {
        $this->db->query("UPDATE users SET rank_id = 2 WHERE id = $id;");
    }

    public function admin_delete_user($id)
    {
        $this->db->query("DELETE FROM users WHERE id = $id;");
    }

    public function admin_take_posts()
    {
        return $this->db->query("SELECT * FROM posts")->result_array();
    }
    public function admin_take_posts_for_verify()
    {
        return $this->db->query("SELECT posts.id, posts.title, posts.post, posts.created_at, posts.verify, users.comp_name FROM posts LEFT JOIN users ON posts.users_id = users.id WHERE verify = 0 ORDER BY created_at DESC")->result_array();
    }

    public function admin_verify_post($id)
    {
        $this->db->query( "UPDATE posts SET verify = 1 WHERE id = $id;");
    }
    public function admin_delete_post($id)
    {
        $this->db->query( "DELETE FROM posts WHERE id = $id;");
    }

    public function get_tags()
    {
        return $this->db->query("SELECT * FROM tags;")->result_array();
    }
}
?>