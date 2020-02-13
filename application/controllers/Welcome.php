<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('session_username')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
