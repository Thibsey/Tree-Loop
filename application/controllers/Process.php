<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller 
{
    public function index()
    {
        $this->load->view('homepage');
    }

    public function bringmejoin()
    {
        $this->load->view('joinpage');
    }
}