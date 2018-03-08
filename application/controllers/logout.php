<?php

class Logout extends CI_Controller
{
    public function loggingout()
    {
        $this->load->model('VentureModel');
        $jobs['listjobs'] = $this->VentureModel->home_page_list();
        $jobs['highlight'] = $this->VentureModel->highlight();
        $this->session->sess_destroy();
        $this->load->view('homepage', $jobs);
    }
}