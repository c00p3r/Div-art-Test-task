<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 21.07.2016
 */

defined('BASEPATH') OR exit('No direct script access allowed');

Class User_Model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function login($data) {

        $query = $this->db->get_where('users', array('email' => $data['email'], 'password' => $data['password']));

        if ($query->num_rows() != 1) {
            return false;
        } else {
            return true;
        }
    }

//    FOR TESTING
    public function getAll(){
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query_result[] = $row;
            }
            return $query_result;
        }

    }

}
