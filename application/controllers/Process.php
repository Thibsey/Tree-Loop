<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller 
{
    public function index()
    {
        $this->load->view('homepage');
    }
    public function register()
    {
        $this->form_validation->set_rules('userName', 'Username', 'required|alpha');
        $this->form_validation->set_rules('companyName', 'Company Name', 'required|alpha_numeric_spaces');
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
            $userName = $this->input->post('userName', true);
            $rankId = $this->input->post('rankId', true);
            $companyName = $this->input->post('companyName', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5($password . '' . $salt);
            $contactAddress = $this->input->post('contactAddress', true);
            $contactPhoneNumber = $this->input->post('contactPhoneNumber', true);
           
            $query = array(
                'user_name' => $userName,
                'rank_id' => $rankId,
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
                $this->load->view('index');
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
        $encrypted_password = md5($password_login . '' . $user['salt_data']);
        if ($user['rank_id'] > 2) 
        {
            $logerror['logerror'] = "Your account has not been verified yet, please contact a Venture Cafe administrator";
            $this->load->view('login_register', $logerror);
        } else {
            
            if ($user && $user['password'] == $encrypted_password) {
                $user1 = array(
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'rank_id' => $user['user_name'],
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

    public function postjob()
   {
        //  var_dump($postInfo);
        //  die();
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

     public function logout()
     {
         $this->session->sess_destroy();
         $this->session->set_userdata($user1 = null);
         $this->load->view('homepage');
     }
}


// echo "<pre>";
// var_dump();
// echo "</pre>";
// die();
