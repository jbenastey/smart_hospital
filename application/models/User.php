<?php
/**
 * Created by PhpStorm.
 * User: jbenastey
 * Date: 26-Feb-19
 * Time: 21:49
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
    public function __construct()
    {
    	parent::__construct();

        $this->load->database();
    }
    function get_user(){
        $query = $this->db->get('user');
        return $query->result_array();
    }
    function get_users($user){
        return $this->db->get_where('user',$user);
    }
    function get_user_account($user){
        $query = $this->db->get_where('user',$user);
        return $query->row_array();
    }
    function get_user_by_id($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_user($id,$dataUser){
        $this->db->where('id_user',$id);
        return $this->db->update('user',$dataUser);
    }
}
