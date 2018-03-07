<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller 
{
    public function index()
    {
        $this->load->model('VentureModel');
        $jobs['listjobs'] = $this->VentureModel->home_page_list();
        $this->load->view('homepage', $jobs);
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
        $this->load->view('postpage');

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
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminVerifyPost($id)
    {
        if ($this->session->userdata('id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_verify_post($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $this->load->view('homepage', $jobs);
        }

    }

    public function adminDeletePost($id)
    {
        if ($this->session->userdata('id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_delete_post($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $this->load->view('homepage', $jobs);
        }
    }

    public function adminVerifyUser($id)
    {
        if ($this->session->userdata('id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_verify_user($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $this->load->view('homepage', $jobs);
        }
        
    }
    public function adminDeleteUser($id)
    {
        if ($this->session->userdata('id') < 2) {
            $this->load->model('VentureModel');
            $this->VentureModel->admin_delete_user($id);
            $data['usersv'] = $this->VentureModel->admin_take_users_for_verify();
            $data['users'] = $this->VentureModel->admin_take_users();
            $data['usersna'] = $this->VentureModel->admin_take_users_non_admins();
            $data['posts'] = $this->VentureModel->admin_take_posts();
            $data['verify'] = $this->VentureModel->admin_take_posts_for_verify();
            $this->load->view('adminpanal', $data);
        } else {
            $this->load->model('VentureModel');
            $jobs['listjobs'] = $this->VentureModel->home_page_list();
            $this->load->view('homepage', $jobs);
        }
        
    }

    public function postjob()
    {
       $this->form_validation->set_rules('title', 'Title', 'required');
       $this->form_validation->set_rules('description', 'Job Description', 'required');
       $this->form_validation->set_rules('company-url', 'Link to Original Offer', 'required|valid_url');
       
       //  $this->form_validation->set_rules('contact', 'Contact', 'required');
       
       if ($this->form_validation->run() == false) 
       {
           $validationerror = validation_errors();
           $this->load->view('postpage', array('errors' => $validationerror));
        } 
        else
        {
            $title = $this->input->post('title', TRUE);
            $description = $this->input->post('description', TRUE);
            $companyUrl = $this->input->post('company-url', TRUE);
            $verify = $this->input->post('verify', TRUE);
            $userId = $this->input->post('id', TRUE);
            
            $postInfo = $arrayName = array(
                'title' => $title,
                'post' => $description,
                'verify' => $verify,
                'company_url' => $companyUrl,
                'users_id' => $userId
            );
                 $this->load->model('VentureModel');
                 $this->VentureModel->insertJob($postInfo);
                 $this->load->view('postpage');
        }
    }

    public function onePost($arg)
    {
        $this->load->model('VentureModel');
        $postInfo['posts'] = $this->VentureModel->one_post($arg);
        $this->load->view('showOnepage', $postInfo);
    }

    //  public function showPost()
    //  {
    //     $this->load->model('VentureModel');
    //     $query['postsToShow'] = $this->VentureModel->show_post();
    //     var_dump($id);
    //     die($query);
	// 	$this->load->view('editPostPage', $query);
    //  }
    public function editPostShow($arg)//show the post inside the form, ready to be edited
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
        // var_dump($editPost);
        // var_dump($args);
        // die();
		$this->load->model('VentureModel');
		$this->VentureModel->edit_item($arg, $editInfo);
		$this->load->view('editPostPage');
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
		$query['deleteIt'] = $this->VentureModel->delete_post($id);
		$this->load->view('editPostPage');
    }

    public function deletePage()
    {
        $this->load->view('deleteAccount');
    }

    public function deleteUser($id)
    {
        $this->load->model('VentureModel');
        $this->VentureModel->delete_user($id);
        $this->session->sess_destroy();
        $this->session->set_userdata($user1 = null);
        $jobs['listjobs'] = $this->VentureModel->home_page_list();
        $this->load->view('homepage', $jobs);
    } 

     public function logout()
    {
         $this->session->sess_destroy();
         $this->session->set_userdata($user1 = null);
        $this->load->model('VentureModel');
        $jobs['listjobs'] = $this->VentureModel->home_page_list();
        $this->load->view('homepage', $jobs);
    }

    
}


// echo "<pre>";
// var_dump();
// echo "</pre>";
// die();
