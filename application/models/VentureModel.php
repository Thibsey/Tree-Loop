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

    public function get_user_by_id($id)
    {
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
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

    public function one_post($id)
    {
        return $this->db->query("SELECT posts.title, posts.post, posts.end_date, posts.language_req, posts.company_url, posts.img_url, users.comp_name, users.comp_identify FROM posts LEFT JOIN users ON posts.users_id = users.id WHERE posts.id = $id")->result_array();
    }

    public function post_tags_postId($id)
    {
        return $this->db->query("SELECT tags.id, tags.tag FROM posts LEFT JOIN tags_has_posts ON posts.id = tags_has_posts.posts_id LEFT JOIN tags ON tags_has_posts.tags_id = tags.id WHERE posts.id =$id")->result_array();
    }

    public function search_posts_by_tags($id)
    {
        return $this->db->query("SELECT posts.id, posts.title, users.comp_name FROM tags_has_posts LEFT JOIN posts ON tags_has_posts.posts_id = posts.id LEFT JOIN users ON posts.users_id = users.id WHERE tags_has_posts.tags_id =$id")->result_array();
    }

    public function home_page_list()
    {
        return $this->db->query("SELECT * FROM posts WHERE verify = 1 ORDER BY created_at DESC LIMIT 5;")->result_array();
    }

    public function admin_edit_user($id, $arg)
    {
        $query = "UPDATE users SET comp_name = ?, comp_identify = ?, email = ?, password = ?, salt_data = ?, contact_address = ?, contact_pho_num = ? WHERE id = $id";
		$values = [$arg['comp_name'], $arg['comp_identify'], $arg['email'], $arg['password'], $arg['salt_data'], $arg['contact_address'], $arg['contact_pho_num']];
        $this->db->query($query, $values);
    }

    public function show_page_list()
    {
        return $this->db->query("SELECT posts.id, posts.highlights, posts.title, posts.post, posts.created_at, posts.verify, users.comp_name
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
		return $listTitle;
    }
    
    public function highlight()
    {
        $query = "SELECT posts.title, posts.post, posts.id, users.comp_name, posts.img_url FROM posts JOIN users ON users.id = posts.users_id WHERE highlights = 1 ORDER BY posts.created_at DESC LIMIT 3";
        $highToShow = $this->db->query($query)->result_array();
        return $highToShow;
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

    public function get_postId_by_userId($id)
    {
        return $this->db->query("SELECT posts.id FROM posts WHERE users_id = $id")->result_array();
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
        $this->db->query("DELETE FROM posts WHERE users_id = $id;");
        $this->db->query("DELETE FROM users WHERE id = $id;");
    }

    public function admin_get_post_to_edit($arg)
    {
        return $this->db->query("SELECT * FROM posts WHERE id = $arg")->row_array();
    }

    public function admin_edit_post($id, $arg)
    {
        $query = "UPDATE posts SET title = ?, post = ?, company_url= ?, verify = ?, img_url = ?, language_req = ?, end_date = ? WHERE id = $id";
        $values = [$arg['title'], $arg['post'], $arg['company_url'], $arg['verify'], $arg['imgurl'], $arg['lanreq'], $arg['enddate']];
        $this->db->query($query, $values);
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
    public function admin_delete_tags($id)
    {
        $this->db->query("DELETE FROM tags_has_posts WHERE posts_id = $id");
    }

    public function admin_highlight_post($id)
    {
        $query = "UPDATE posts SET highlights = 1 WHERE id = ?";
        $this->db->query($query, $id);
    }
    public function admin_unhighlight_post($id)
    {
        $query = "UPDATE posts SET highlights = 0 WHERE id = ?";
        $this->db->query($query, $id);
    }
    public function delete_all_tags($id)
    {
        foreach ($id as $key) {
            $this->db->query("DELETE FROM tags_has_posts WHERE posts_id = {$key['id']}");
        }
    }

    public function superAdmin_update_user_rank($id, $update)
    {
        $query = "UPDATE users SET rank_id = $update WHERE id = $id";
        $this->db->query($query);
    }

    public function get_tags()
    {
        return $this->db->query("SELECT * FROM tags;")->result_array();
    }

    public function get_mail_by_id($id)
    {
        $userId = $this->db->query("SELECT posts.users_id FROM posts WHERE id = $id")->result_array();
        $userEmail =$this->db->query("SELECT users.email FROM users WHERE id = {$userId[0]['users_id']}")->result_array();
        return $userEmail;
        
    }
}
?>