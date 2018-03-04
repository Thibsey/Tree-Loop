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
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userName', 'Username', 'required|alpha');
        $this->form_validation->set_rules('companyName', 'Company Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmPassword', 'Password Confirm', 'required|matches[password]');
        $this->form_validation->set_rules('contactAddress', 'Contact Address', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('contactPhoneNumber', 'Contact Phone Number', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $error['error'] = validation_errors();
            $this->load->view('login_register', $error);

        } else {
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
            if ($add_user) {
                $this->load->view('index');
            } else {
                $error['error'] = "Registration failed";
                $this->load->view('login_register', $error);
            }
        }
    }


    public function login()
    {
        $email_login = $this->input->post('email-login', true);
        $password_login = $this->input->post('password-login', true);
        $this->load->model('modelbec');
        $user = $this->VentureModel->get_user_by_username($user_login);
        $encrypted_password = md5($password_login . '' . $user['salt_data']);
        if ($user && $user['password'] == $encrypted_password) {
            $user1 = array(
                'id' => $user['id'],
                'email' => $user['email'],
                'user_name' => $user['user_name'],
                'age' => $user['age'],
                'is_logged_in' => true
            );
            $this->session->set_userdata($user1);
            header('Location: http://localhost/');

        } else {
            $error['logerror'] = "Wrong Username or Email";
            $this->load->view('register', $error);
        }
    }


}




// echo "<pre>";
// var_dump($query);
// echo "</pre>";
// die();