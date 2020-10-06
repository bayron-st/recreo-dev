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

        if ($this->session->userdata('usuario_login') == 1)
            redirect(site_url('usuario/dashboard'), 'refresh');

        if ($this->session->userdata('asesor_login') == 1)
        redirect(site_url('asesor/dashboard'), 'refresh');

        if ($this->session->userdata('participante_login') == 1)
        redirect(site_url('participante/dashboard'), 'refresh');


        $this->load->view('backend/login');
    }

    //Validating login from ajax request
    function validate_login() {

      $identificacion = $this->input->post('identificacion');
      $password = $this->input->post('telefono');

      $credential = array('identificacion' => $identificacion, 'telefono' => $password);
      // Checking login credential for usuario
      $query = $this->db->get_where('usuarios', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('usuario_login', '1');
          $this->session->set_userdata('id_usuario', $row->id_usuario);
          $this->session->set_userdata('login_user_id', $row->id_usuario);
          $this->session->set_userdata('name', $row->name);
          $this->session->set_userdata('last_name', $row->last_name);
          $this->session->set_userdata('login_type', 'usuario');
          redirect(site_url('usuario/dashboard'), 'refresh');
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

      $query = $this->db->get_where('participantes', $credential);

      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('participante_login', '1');
          $this->session->set_userdata('id_participante', $row->id_participante);
          $this->session->set_userdata('login_user_id', $row->id_participante);
          $this->session->set_userdata('name', $row->name);
          $this->session->set_userdata('last_name', $row->last_name);
          $this->session->set_userdata('login_type', 'participante');
          redirect(site_url('participante/dashboard'), 'refresh');
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
        $query = $this->db->get_where('usuarios' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $reset_account_type     =   'usuario';
            $this->db->where('email' , $email);
            $this->db->update('usuarios' , array('password' => sha1($new_password)));
            // send new password to user email
            $this->email_model->password_reset_email($new_password , $reset_account_type , $email);
            $this->session->set_flashdata('reset_success', 'Porfavor revise su correo y su nueva contraseña');
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
            $this->session->set_flashdata('reset_success', get_phrase('Por favor revise su correo electrónico para obtener una nueva contraseña'));
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

                $data['nombres']          = $this->input->post('nombres');
                $data['apellidos']        = $this->input->post('apellidos');
                $data['tipo_documento']   = $this->input->post('tipo_documento');
                $data['identificacion']   = $this->input->post('identificacion');
                $data['ID_PAIS']          = $this->input->post('ID_PAIS');





                $data['ANO_NACIMIENTO'] = $this->input->post('ANO_NACIMIENTO');




                $data['telefono']         = $this->input->post('telefono');
                $data['email']            = $this->input->post('email');
                $data['aceptar']          = $this->input->post('aceptar');
                $data['fecha']            = date("Y-m-d");


                $query = $this->db->get_where('participantes', array('identificacion' => $data['identificacion']));

               if ($query->num_rows() > 0) {


                //$this->form_validation->set_rules('Identificacion', 'Identificacion', 'Ya existe un registro con ese numero de identificacion');
                $this->session->set_flashdata('flash_message' ,'Ya existe un registro con ese numero de identificacion');
                redirect(site_url('login/register_account'), 'refresh');
        }

        else {

                $this->db->insert('participantes', $data);
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
