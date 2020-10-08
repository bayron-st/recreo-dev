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
class Usuario extends CI_Controller
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

    /***default functin, redirects to login page if no usuario logged in yet***/
    public function index()
    {
        if ($this->session->userdata('usuario_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('usuario_login') == 1)
            redirect(site_url('usuario/dashboard'), 'refresh');
    }

    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('usuario_login') != 1)
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('Inicio Usuario');
        $this->load->view('backend/index', $page_data);
    }


          function participantes()
                    {
                      if ($this->session->userdata('usuario_login') != 1)
                              redirect(base_url(), 'refresh');

                      $page_data['page_name']  = 'participantes';
                      $page_data['page_title'] = 'Listado Participantes';
                      $this->load->view('backend/index', $page_data);
                    }


          function tiendas()
                    {
                      if ($this->session->userdata('usuario_login') != 1)
                              redirect(base_url(), 'refresh');

                      $page_data['page_name']  = 'tiendas';
                      $page_data['page_title'] = 'Listado Tiendas';
                      $this->load->view('backend/index', $page_data);
                    }


          function creditos()
                    {
                      if ($this->session->userdata('usuario_login') != 1)
                              redirect(base_url(), 'refresh');

                      $page_data['page_name']  = 'creditos';
                      $page_data['page_title'] = 'Créditos Participantes';
                      $this->load->view('backend/index', $page_data);
                    }

          function canjes()
                    {
                      if ($this->session->userdata('usuario_login') != 1)
                              redirect(base_url(), 'refresh');

                      $page_data['page_name']  = 'canjes';
                      $page_data['page_title'] = 'Créditos de créditos participantes';
                      $this->load->view('backend/index', $page_data);
                    }



    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('usuario_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($param1 == 'do_update') {

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);



            $data['description'] = $this->input->post('currency');
            $this->db->where('type' , 'currency');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('text_align');
            $this->db->where('type' , 'text_align');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('running_year');
            $this->db->where('type' , 'running_year');
            $this->db->update('settings' , $data);



            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(site_url('usuario/system_settings'), 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(site_url('usuario/system_settings'), 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('theme_selected'));
            redirect(site_url('usuario/system_settings'), 'refresh');
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }



    function frontend_settings($task) {
      if ($task == 'update_terms_conditions') {
        $this->frontend_model->update_terms_conditions();
        $this->session->set_flashdata('flash_message' , get_phrase('terms_updated'));
        redirect(site_url('usuario/frontend_pages/terms_conditions'), 'refresh');
      }
      if ($task == 'update_about_us') {
        $this->frontend_model->update_about_us();
        $this->session->set_flashdata('flash_message' , get_phrase('about_us_updated'));
        redirect(site_url('usuario/frontend_pages/about_us'), 'refresh');
      }
      if ($task == 'update_privacy_policy') {
        $this->frontend_model->update_privacy_policy();
        $this->session->set_flashdata('flash_message' , get_phrase('privacy_policy_updated'));
        redirect(site_url('usuario/frontend_pages/privacy_policy'), 'refresh');
      }
      if ($task == 'update_general_settings') {
        $this->frontend_model->update_frontend_general_settings();
        $this->session->set_flashdata('flash_message' , get_phrase('general_settings_updated'));
        redirect(site_url('usuario/frontend_pages/general'), 'refresh');
      }
      if ($task == 'update_slider_images') {
        $this->frontend_model->update_slider_images();
        $this->session->set_flashdata('flash_message' , get_phrase('slider_images_updated'));
        redirect(site_url('usuario/frontend_pages/homepage_slider'), 'refresh');
      }
    }




    function get_session_changer()
    {
        $this->load->view('backend/usuario/change_session');
    }

    function change_session()
    {
        $data['description'] = $this->input->post('running_year');
        $this->db->where('type' , 'running_year');
        $this->db->update('settings' , $data);
        $this->session->set_flashdata('flash_message' , get_phrase('session_changed'));
        redirect(site_url('usuario/dashboard'), 'refresh');
    }


    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('usuario_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] 	= $param2;
		}
		if ($param1 == 'update_phrase') {
			$language	=	$param2;
			$total_phrase	=	$this->input->post('total_phrase');
			for($i = 1 ; $i < $total_phrase ; $i++)
			{
				//$data[$language]	=	$this->input->post('phrase').$i;
				$this->db->where('phrase_id' , $i);
				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
			}
			redirect(site_url('usuario/manage_language/edit_phrase/'.$language), 'refresh');
		}
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(site_url('usuario/manage_language'), 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(site_url('usuario/manage_language'), 'refresh');
		}
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT'
				)
			);
			$this->dbforge->add_column('language', $fields);

			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(site_url('usuario/manage_language'), 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

			redirect(site_url('usuario/manage_language'), 'refresh');
		}
		$page_data['page_name']        = 'manage_language';
		$page_data['page_title']       = get_phrase('manage_language');
		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
		$this->load->view('backend/index', $page_data);
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('usuario_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $id_usuario = $param2;

            $validation = email_validation_for_edit($data['email'], $id_usuario, 'usuario');
            if($validation == 1){
                $this->db->where('id_usuario', $this->session->userdata('id_usuario'));
                $this->db->update('usuario', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/usuario_image/' . $this->session->userdata('id_usuario') . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            }
            else{
                $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
            }
            redirect(site_url('usuario/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('usuario', array(
                'id_usuario' => $this->session->userdata('id_usuario')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('id_usuario', $this->session->userdata('id_usuario'));
                $this->db->update('usuario', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }
            redirect(site_url('usuario/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('usuario', array(
            'id_usuario' => $this->session->userdata('id_usuario')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }

}
