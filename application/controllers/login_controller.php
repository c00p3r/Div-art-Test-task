<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 22.07.2016
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (isset($this->session->userdata['logged_in'])){
            redirect('account_controller/index');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

	public function index(){
		$this->load->view('login_view');
	}

    public function login_process() {

        $request_result = array();
        $message = array();

        $this->form_validation->set_rules('input_email', 'Електронна адреса', 'trim|required|valid_email');
        $this->form_validation->set_rules('input_password', 'Пароль', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {

            $message['type'] = 'error';
            $message['text'] = 'Помилка при заповненні форми!';

            $request_result['result'] = false;
            $request_result['message'] = $message;

        } else {
//            If form validation successful
            $sign_in_data = array(
                'email' => $this->input->post('input_email'),
                'password' => $this->input->post('input_password')
            );
//            Signing in with form data
            $result = $this->user_model->login($sign_in_data);

            if ($result == TRUE) {
                $session_data = array(
                    'email' => $this->input->post('input_email'),
                );
//                Adding user data to session
                $this->session->set_userdata('logged_in', $session_data);

                $message['type'] = 'success';
                $message['text'] = 'Успішна авторизація!';

                $request_result['result'] = true;
                $request_result['message'] = $message;

            } else {
//                If login process failed
                $message['type'] = 'error';
                $message['text'] = 'Невірна електронна адреса або пароль!';

                $request_result['result'] = false;
                $request_result['message'] = $message;

            }
        }
        echo json_encode($request_result);
    }

}
