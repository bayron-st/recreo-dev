<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 date_default_timezone_set  ("America/Bogota");

/*
 *  @author     : Creativeitem
 *  date        : 14 september, 2017
 *  Ekattor School Management System Pro
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */
class Participante extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
        $this->load->model('Barcode_model');

       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
    }

    /***default functin, redirects to login page if no asesor logged in yet***/
    public function index()
    {
        if ($this->session->userdata('participante_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('participante_login') == 1)
            redirect(site_url('participante/dashboard'), 'refresh');
    }

    /***asesor DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('participante_login') != 1)
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('Inicio Participante');
        $this->load->view('backend/index', $page_data);
    }

    function whatsapp()
    {
        if ($this->session->userdata('participante_login') != 1)
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'whatsapp';
        $page_data['page_title'] = get_phrase('Registra tus compras');
        $this->load->view('backend/index', $page_data);
    }



    function redimir()
              {
                if ($this->session->userdata('participante_login') != 1)
                        redirect(base_url(), 'refresh');

                $page_data['page_name']  = 'redimir';
                $page_data['page_title'] = 'Redime tus creditos';
                $this->load->view('backend/index', $page_data);
              }

    /***participante DASHBOARD***/
    function redimir_game($param1 = '', $id_participante)
    {
        if ($this->session->userdata('participante_login') != 1)
            redirect(site_url('login'), 'refresh');

            if ($param1 == 'game') {

                $lCodeGame = $this->input->post('lcode_game');
                $data['LAST'] = 0;
                
                $this->db->where('ID_PARTICIPANTE' , $id_participante);
                $this->db->where('CODIGO' , $lCodeGame);
                $this->db->update('codigos' , $data);
                
                $sql = "SELECT * FROM `codigos` WHERE TIPO_CODIGO = 'JUEGO' AND ESTADO = 'INACTIVO' ORDER by ID_CODIGO LIMIT 1";
                $query = $this->db->query($sql);

                if ($query->num_rows() > 0) {
                    
                    $result_sql = $query->result_array();
                    foreach ($result_sql as $row_sql) {$new_lcode = $row_sql['CODIGO']; $new_idlcode = $row_sql['ID_CODIGO'];}
    
                    $data2['ID_PARTICIPANTE'] = $id_participante;
                    $data2['ESTADO'] = 'ACTIVO';
                    $data2['LAST'] = 1;
    
                    $this->db->where('TIPO_CODIGO' , 'JUEGO');
                    $this->db->where('ESTADO' , 'INACTIVO');
                    $this->db->where('CODIGO' , $new_lcode);
                    $this->db->update('codigos' , $data2);

                    $date_reg = date('Y-m-d');
                    $sql2 = "INSERT INTO `canjes` (`ID_PARTICIPANTE`, `ID_CODIGO`, `CANTIDAD`, `FECHA`, `USUARIO`) VALUES ($id_participante, '$new_idlcode', '6', '$date_reg', 'SYSTEM');";
                    $query2 = $this->db->query($sql2);
                    
                    $this->session->set_flashdata('flash_message' ,'Codigo redimido exitosamente.');
                    redirect(site_url('participante/redimir'), 'refresh');
                    // if ($query2->num_rows() > 0) {
                    // } else {
                    //     $this->session->set_flashdata('error_message' , 'No pudimos redimir tu codigo :( ... Error C002');
                    // }
                } else {
                    $this->session->set_flashdata('error_message' , 'No pudimos redimir tu codigo :( ... Error C001');
                }

            }

        $page_data['page_name']  = 'redimir';
        // $page_data['page_title'] = get_phrase('Juego');
        $this->load->view('backend/index', $page_data);

    }

    /***participante DASHBOARD***/
    function juego($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('participante_login') != 1)
            redirect(site_url('login'), 'refresh');

            if ($param1 == 'create') {

              $data['ID_CREDITO']     			   = $this->input->post('ID_CREDITO');
              $data['ID_USUARIO']              = $this->session->userdata('id_participante');
              $data['ID_TIENDA']     			     = $this->input->post('ID_TIENDA');

              $data['TIPO']     			         = $this->input->post('TIPO');
              $data['CANTIDAD']     			     = $this->input->post('CANTIDAD');
              $data['ARCHIVO']     			       = $this->input->post('ARCHIVO');

              $data['FECHA']                   = date("Y-m-d H:i");
              $data['USUARIO']     			       = $this->session->userdata('name');

              $this->db->insert('codigos', $data);

              $this->session->set_flashdata('flash_message' , 'Datos almacenados correctamente');

            }

        $page_data['page_name']  = 'juego';
        $page_data['page_title'] = get_phrase('Juego');
        $this->load->view('backend/index', $page_data);

    }


    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('participante_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $id_participante = $param2;

            $validation = email_validation_for_edit($data['email'], $id_participante, 'participante');
            if($validation == 1){
                $this->db->where('id_participante', $this->session->userdata('id_participante'));
                $this->db->update('participantes', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/participante_image/' . $this->session->userdata('id_participante') . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            }
            else{
                $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
            }
            redirect(site_url('participante/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('participantes', array(
                'id_participante' => $this->session->userdata('id_participante')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('id_participante', $this->session->userdata('id_participante'));
                $this->db->update('participantes', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }
            redirect(site_url('participante/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('participantes', array(
            'id_participante' => $this->session->userdata('id_participante')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }


}
