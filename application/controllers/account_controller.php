<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 22.07.2016
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();

        if (!isset($this->session->userdata['logged_in'])){
            redirect('login_controller/index');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }


    public function index(){
        $this->load->view('account_view');
    }

    public function logout() {

        // Removing session data
        $session_data = array(
            'userId' => '',
            'email' => ''
        );
        $this->session->unset_userdata('logged_in', $session_data);

        $this->load->view('login_view');
    }

}