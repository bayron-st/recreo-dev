<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author   : Creativeitem
 *  date    : 14 september, 2017
 *  Ekattor School Management System Pro
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(site_url('admin/dashboard'), 'refresh');

        if ($this->session->userdata('asesor_login') == 1)
        redirect(site_url('asesor/dashboard'), 'refresh');


        $this->load->view('backend/login');
    }

    //Validating login from ajax request
    function validate_login() {

      $num_documento =  str_replace('.','',$this->input->post('num_documento'));

      $password = $this->input->post('password');
      $credential = array('num_documento' => $num_documento, 'password' => sha1($password));
      // Checking login credential for admin
      $query = $this->db->get_where('admin', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('admin_login', '1');
          $this->session->set_userdata('admin_id', $row->admin_id);
          $this->session->set_userdata('login_user_id', $row->admin_id);
          $this->session->set_userdata('name', $row->name);
          $this->session->set_userdata('last_name', $row->last_name);
          $this->session->set_userdata('login_type', 'admin');
          redirect(site_url('admin/dashboard'), 'refresh');
      }

      $query = $this->db->get_where('asesor', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('asesor_login', '1');
          $this->session->set_userdata('asesor_id', $row->asesor_id);
          $this->session->set_userdata('login_user_id', $row->asesor_id);
          $this->session->set_userdata('name', $row->name);
          $this->session->set_userdata('last_name', $row->last_name);
          $this->session->set_userdata('login_type', 'asesor');
          redirect(site_url('asesor/dashboard'), 'refresh');
      }

      $this->session->set_flashdata('login_error', get_phrase('login no valido'));
      redirect(site_url('login'), 'refresh');
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    // PASSWORD RESET BY EMAIL
    function forgot_password()
    {
        $this->load->view('backend/forgot_password');
    }

    function reset_password()
    {
        $email = $this->input->post('email');
        $reset_account_type     = '';
        //resetting user password here
        $new_password           =   substr( md5( rand(100000000,20000000000) ) , 0,7);

        // Checking credential for admin
        $query = $this->db->get_where('admin' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $reset_account_type     =   'admin';
            $this->db->where('email' , $email);
            $this->db->update('admin' , array('password' => sha1($new_password)));
            // send new password to user email
            $this->email_model->password_reset_email($new_password , $reset_account_type , $email);
            $this->session->set_flashdata('reset_success', 'Porfavor revise su correo y su nueva contrase���a');
            redirect(site_url('login/forgot_password'), 'refresh');
        }

        $query = $this->db->get_where('asesor' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $reset_account_type     =   'asesor';
            $this->db->where('email' , $email);
            $this->db->update('asesor' , array('password' => sha1($new_password)));
            // send new password to user email
            $this->email_model->password_reset_email($new_password , $reset_account_type , $email);
            $this->session->set_flashdata('reset_success', get_phrase('Por favor revise su correo electr���nico para obtener una nueva contrase���a'));
            redirect(site_url('login/forgot_password'), 'refresh');
        }

        // Checking credential for student
          $this->session->set_flashdata('reset_error', get_phrase('password_reset_was_failed'));
        redirect(site_url('login/forgot_password'), 'refresh');
    }

    function register_account()
    {
        $this->load->view('backend/register_account');
    }


    function register($param1 = '', $param2 = '', $param3 = '')
    {

            if ($param1 == 'create') {

                $data['name']             = $this->input->post('name');
                $data['apellido']         = $this->input->post('apellido');
                $data['identificacion']   = $this->input->post('identificacion');

                $data['num_documento']    =   str_replace('.','',$this->input->post('num_documento'));

                $data['pais']             = $this->input->post('pais');
                $data['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');

                $data['phone']            = $this->input->post('phone');

                $data['email']            = $this->input->post('email');
                $data['password']         = sha1($this->input->post('password'));
                $data['aceptar']          = $this->input->post('aceptar');

                $query = $this->db->get_where('asesor', array('num_documento' => $data['num_documento']));

               if ($query->num_rows() > 0) {


                //$this->form_validation->set_rules('num_documento', 'num_documento', 'Ya existe un registro con ese numero de identificacion');
                $this->session->set_flashdata('flash_message' ,'Ya existe un registro con ese numero de identificacion');
                redirect(site_url('login'), 'refresh');
        }

        else {

                $this->db->insert('asesor', $data);
                $asesor_id = $this->db->insert_id();

                $this->session->set_flashdata('flash_message' , 'Datos almacenados correctamente');

                 redirect(site_url('login'), 'refresh');
            }
          }
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(site_url('login'), 'refresh');
    }

}