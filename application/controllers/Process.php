<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller 
{
    public function index()
    {
        $this->load->model('VentureModel');
        $jobs['listjobs'] = $this->VentureModel->home_page_list();
        $jobs['highlight'] = $this->VentureModel->highlight();
        $this->load->view('homepage', $jobs);
    }

    public function hightlight()
    {
        $this->load->model('VentureModel');
        $highlight['highlight'] = $this->VentureModel->highlight();
        $this->load->view('homepage', $highlight);
    }

    public function showpage()
    {
        $this->load->model('VentureModel');
        $jobs['titles'] = $this->VentureModel->show_page_list();
        $this->load->view('showpage', $jobs);
    }

    public function register()
    {
        $this->form_validation->set_rules('companyName', 'Company Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('companyIdentify', 'Company Identifier', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmPassword', 'Password Confirm', 'required|matches[password]');
        $this->form_validation->set_rules('contactAddress', 'Contact Address', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('contactPhoneNumber', 'Contact Phone Number', 'required|numeric');

        if ($this->form_validation->run() == false) 
        {
            $error['error'] = validation_errors();
            $this->load->view('login_register', $error);

        } 
        else 
        {
            $rankId = $this->input->post('rankId', true);
            $companyIdentify = $this->input->post('companyIdentify', true);
            $companyName = $this->input->post('companyName', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = sha1($password . '' . $salt);
            $contactAddress = $this->input->post('contactAddress', true);
            $contactPhoneNumber = $this->input->post('contactPhoneNumber', true);
           
            $query = array(
                'rank_id' => $rankId,
                'comp_identify' => $companyIdentify,
                'comp_name' => $companyName,
                'email' => $email,
                'password' => $encrypted_password,
                'salt_data' => $salt,
                'contact_address' => $contactAddress,
                'contact_pho_num' => $contactPhoneNumber
            );
            $this->load->model('VentureModel');
            $add_user = $this->VentureModel->add_user($query);
            if ($add_user) 
            {
                $message['success'] = "You have been registered";
                $this->load->view('login_register', $message);
            } 
            else 
            {
                $error['error'] = "Registration failed";
                $this->load->view('login_register', $error);
            }
        }
    }

    public function login()
    {
        $email_login = $this->input->post('email-login', true);
        $rank_id = $this->input->post('rank-id', true);
        $password_login = $this->input->post('password-login', true);
        $this->load->model('VentureModel');
        $user = $this->VentureModel->get_user_by_email($email_login);
        $encrypted_password = sha1($password_login . '' . $user['salt_data']);
        if ($user['rank_id'] > 2) 
        {
            $logerror['logerror'] = "Your account has not been verified yet, please contact a Venture Cafe administrator";
            $this->load->view('login_register', $logerror);
        } else {
            
            if ($user && $user['password'] == $encrypted_password) {
                $user1 = array(
                    'id' => $user['id'],
                    'comp_name' => $user['comp_name'],
                    'email' => $user['email'],
                    'rank_id' => $user['rank_id'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($user1);
                header('Location: http://localhost/');
            } else {
                $logerror['logerror'] = "Wrong Username or Email";
                $this->load->view('login_register', $logerror);
            }
        }
    }
    
    public function postpage()
    {
        $this->load->model('VentureModel');
        $data['tags'] = $this->VentureModel->get_tags();
        $data['highlight'] = $this->VentureModel->highlight();
        $this->load->view('postpage', $data);
        
    }
    
    public function postjob()
    {
    
        
        $this->form_validation->set_rules('title', 'Title', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('description', 'Job Description', 'required|max_length[500]');
        $this->form_validation->set_rules('lanreq', 'Language Requirement', 'required|alpha');
        $this->form_validation->set_rules('company-url', 'Link to Original Offer', 'required|valid_url');
        $this->form_validation->set_rules('tag1', 'Tags', 'required|differs[tag2]|differs[tag3]');
        $this->form_validation->set_rules('tag2', 'Tags', 'differs[tag1]|differs[tag3]');
        $this->form_validation->set_rules('tag3', 'Tags', 'differs[tag1]|differs[tag2]');
        
        if ($this->form_validation->run() == false) 
        {
            $this->load->model('VentureModel');
            $validationerror['errors'] = validation_errors();
            $validationerror['tags'] = $this->VentureModel->get_tags();
            $this->load->view('postpage', $validationerror);
        }  else {
            $title = $this->input->post('title', TRUE);
            $tags1 = $this->input->post('tag1', TRUE);
            $tags2 = $this->input->post('tag2', TRUE);
            $tags3 = $this->input->post('tag3', TRUE);
            $imgURL = $this->input->post('imgurl', TRUE);
            $description = $this->input->post('description', TRUE);
            $endDate = $this->input->post('enddate', TRUE);
            $lanReq = $this->input->post('lanreq', TRUE);
            $companyUrl = $this->input->post('company-url', TRUE);
            $verify = $this->input->post('verify', TRUE);
            $userId = $this->input->post('id', TRUE);
            
            $postInfo = array(
                'title' => $title,
                'img_url' => $imgURL,
                'post' => $description,
                'end_date' => $endDate,
                'language_req' => $lanReq,
                'verify' => $verify,
                'company_url' => $companyUrl,
                'users_id' => $userId
            );
            $tagInfo1 = array(
                'tags_id' => $tags1,
            );
            $tagInfo2 = array(
                'tags_id' => $tags2,
            );
            $tagInfo3 = array(
                'tags_id' => $tags3,
            );
    
            $this->load->model('VentureModel');
            $this->VentureModel->insertJob($postInfo, $tagInfo1, $tagInfo2, $tagInfo3);
            $tag['tags'] = $this->VentureModel->get_tags();
            $this->load->view('postpage');
        }
    }

    public function adminpanel()
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminVerifyPost($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $this->load->library('email');
            $userE = $this->VentureModel->get_mail_by_id($id);
            $msg = "The job post has been approved by the Venture Café Admins and now visable to everyone.";
            $userEmail = $userE[0]['email'];
            $this->email->from('tihomir.balaban@treeloop.com', 'Tree Loop Inc');
            $this->email->to($userEmail);
            $this->email->subject('Your post at Venture Café - Tree Loop Inc');
            $this->email->message($msg);
            $this->email->send();
            $this->VentureModel->admin_verify_post($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }

    }

    public function adminDeletePost($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $this->load->library('email');
            $userE = $this->VentureModel->get_mail_by_id($id);
            $msg = "The job post has been declined by the Venture Café Admins.
please contact an Venture Café Admin for more information.";
            $userEmail = $userE[0]['email'];
            $this->email->from('tihomir.balaban@treeloop.com', 'Tree Loop Inc');
            $this->email->to($userEmail);
            $this->email->subject('Your post at Venture Café - Tree Loop Inc');
            $this->email->message($msg);
            $this->email->send();
            $this->VentureModel->admin_verify_post($id);
            $this->VentureModel->admin_delete_tags($id);
            $this->VentureModel->admin_delete_post($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminVerifyUser($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_verify_user($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
        
    }
    public function adminDeleteUser($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_delete_user($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
        
    }
    public function adminEditUser($arg)
	{
        if ($this->session->userdata('rank_id)')< 2){
            $this->load->model('VentureModel');
            $companyIdentify = $this->input->post('comp_identify', true);
            $companyName = $this->input->post('comp_name', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = sha1($password . '' . $salt);
            $contactAddress = $this->input->post('contact_address', true);
            $contactPhoneNumber = $this->input->post('contact_pho_num', true);
        
            $query = array(
                'comp_identify' => $companyIdentify,
                'comp_name' => $companyName,
                'email' => $email,
                'password' => $encrypted_password,
                'salt_data' => $salt,
                'contact_address' => $contactAddress,
                'contact_pho_num' => $contactPhoneNumber
            );
            $this->VentureModel->admin_edit_user($arg, $query);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    } 
    
    public function adminEditUserPage($id)
    {
        if ($this->session->userdata('rank_id)')< 2){
            $this->load->model('VentureModel');
            $user['user_edit'] = $this->VentureModel->get_user_by_id($id);
            $this->load->view('adminUserEdit', $user);
        }
        
    }

    public function superAdminRankUpdate($id)
    {
        if ($this->session->userdata('rank_id') == 0) {
            $this->load->model('VentureModel');
            $rank_id = $this->input->post('rank-update', true);
            $this->VentureModel->superAdmin_update_user_rank($id, $rank_id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }
    public function superAdminDeleteUser($id)
    {
        if ($this->session->userdata('rank_id') == 0) {
            $this->load->model('VentureModel');
            $pId = $this->VentureModel->get_postId_by_userId($id);
            $this->VentureModel->delete_all_tags($pId);
            $this->VentureModel->admin_delete_user($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminGoEditPost($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $data['postEdit'] = $this->VentureModel->admin_get_post_to_edit($id);
            $data['tags'] = $this->VentureModel->get_tags();
            $this->load->view('admineditpost', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminEditPost($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $editInfo = $this->input->post(null, true);
            $this->VentureModel->admin_edit_post($id, $editInfo);
            $data['postEdit'] = $this->VentureModel->admin_get_post_to_edit($id);
            $data['tags'] = $this->VentureModel->get_tags();
            $this->load->view('admineditpost', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminHighlightPost($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_highlight_post($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }
    public function adminUnhighlightPost($id)
    {
        if ($this->session->userdata('rank_id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_unhighlight_post($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $data['userposts'] = $this->VentureModel->show_page_list();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $jobs['highlight'] = $this->VentureModel->highlight();
            $this->load->view('homepage', $jobs);
        }
    }


    public function onePost($arg)
    {
        $this->load->model('VentureModel');
        $postInfo['posts'] = $this->VentureModel->one_post($arg);
        $postInfo['tags'] = $this->VentureModel->post_tags_postId($arg);
        $this->load->view('showOnepage', $postInfo);
    }

    public function searchByTags($arg)
    {
        $this->load->model('VentureModel');
        $posts['postsByTags'] = $this->VentureModel->search_posts_by_tags($arg);
        $this->load->view('postsbytags', $posts);
    }

    public function editPostShow($arg)
    {
		$this->load->model('VentureModel');
        $query['showIt'] = $this->VentureModel->show_post($arg);
        // var_dump($id);
        // die();
		$this->load->view('editPostPage', $query);
    }

    public function editPost($arg)
	{
        $editInfo = $this->input->post(NULL, TRUE);
		$this->load->model('VentureModel');
		$this->VentureModel->edit_item($arg, $editInfo);
        $arg = $this->session->userdata('id');
        $query['showIt'] = $this->VentureModel->show_post($arg);
        $this->load->view('editPostPage', $query);
    } 

    public function addOneTitle($id)
	{
    	$this->load->model('VentureModel');
        $query['titles'] = $this->VentureModel->addOneTitle($id);
        // var_dump($query);
        // die();
        $this->load->view('showpage', $query);
    }
    
    public function deletePost($id)
    {
        $this->load->model('VentureModel');
        $this->VentureModel->admin_delete_tags($id);
        $this->VentureModel->delete_post($id);
        $arg = $this->session->userdata('id');
        $query['showIt'] = $this->VentureModel->show_post($arg);
		$this->load->view('editPostPage', $query);
    }

    public function deletePage()
    {
        $this->load->view('deleteAccount');
    }

    public function deleteUser($id)
    {
        $this->load->model('VentureModel');
        $pId = $this->VentureModel->get_postId_by_userId($id);
        $this->VentureModel->delete_all_tags($pId);
        $this->VentureModel->delete_user($id);
        $this->session->sess_destroy();
        $this->load->view('logout');
    } 

     public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('logout');
    }

    
}