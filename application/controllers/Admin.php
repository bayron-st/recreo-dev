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
class Admin extends CI_Controller
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

    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(site_url('admin/dashboard'), 'refresh');
    }

    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('Inicio');
        $this->load->view('backend/index', $page_data);
    }


//INGRESAR USUARIOS
    function asesor_add()
{
  if ($this->session->userdata('admin_login') != 1)
          redirect(base_url(), 'refresh');

  $page_data['page_name']  = 'asesor_add';
  $page_data['page_title'] = 'Ingresar asesor';
  $this->load->view('backend/index', $page_data);
}


//FUNCION USUARIOS
  function asesor($param1 = '', $param2 = '', $param3 = '')
  {
      if ($this->session->userdata('admin_login') != 1)
          redirect('login', 'refresh');
      if ($param1 == 'create') {
          $data['name']           = $this->input->post('name');
          $data['sex']            = $this->input->post('sex');
          $data['address']        = $this->input->post('address');
          $data['phone']          = $this->input->post('phone');
          $data['email']          = $this->input->post('email');
          $data['password']       =sha1($this->input->post('password'));


          $this->db->insert('asesor', $data);
          $asesor_id = $this->db->insert_id();
          move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/asesor_image/' . $asesor_id . '.jpg');
          $this->session->set_flashdata('flash_message' , 'Datos almacenados correctamente');
          $this->email_model->account_opening_email('asesor', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
           redirect(site_url('admin/asesor'), 'refresh');
      }
      if ($param1 == 'do_update') {
          $data['name']        = $this->input->post('name');
          $data['sex']         = $this->input->post('sex');
          $data['address']     = $this->input->post('address');
          $data['phone']       = $this->input->post('phone');
          $data['email']       = $this->input->post('email');

          $this->db->where('asesor_id', $param2);
          $this->db->update('asesor', $data);
          move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/asesor_image/' . $param2 . '.jpg');
          $this->session->set_flashdata('flash_message' , 'Registro Actualizado');
          redirect(site_url('admin/asesor'), 'refresh');
      }
      if ($param1 == 'delete') {
          $this->db->where('asesor_id', $param2);
          $this->db->delete('asesor');
          $this->session->set_flashdata('flash_message' , 'Registro Eliminado');
          redirect(site_url('admin/asesor'), 'refresh');
      }
      $page_data['asesores']   = $this->db->get('asesor')->result_array();
      $page_data['page_name']  = 'asesor';
      $page_data['page_title'] = 'Gestionar asesor';
      $this->load->view('backend/index', $page_data);
  }





















        function contado()
          {
            if ($this->session->userdata('admin_login') != 1)
                    redirect(base_url(), 'refresh');

            $page_data['page_name']  = 'contado';
            $page_data['page_title'] = 'Gestion de pagos de contado';
            $this->load->view('backend/index', $page_data);
          }


      function llamadas_contado($id_marketing) {
      if ($this->session->userdata('admin_login') != 1)
      redirect(site_url('login'), 'refresh');

      $page_data['page_name']  = 'llamadas_contado';
      $page_data['id_marketing'] = $id_marketing;
      $page_data['page_title'] = 'llamadas compra de contado';
      $this->load->view('backend/index', $page_data);
      }


      function llamadas_contado_edit($param1 = '', $param2 = '', $param3 = '')
      {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {

            $data['id_marketing']     		 = $this->input->post('id_marketing');
            $id_marketing                  =  $data['id_marketing'] ;
            $data['llamadas_calendario']   = date("Y-m-d H:i:s");
            $data['llamadas_comentarios']  = $this->input->post('llamadas_comentarios');
            $data['fecha_cita_mark']     	 = $this->input->post('fecha_cita_mark');
            $data['fecha_modificacion']    = date("Y-m-d H:i");
            $data['cronometro']     	     = $this->input->post('cronometro');
            $data['proceso']     	         = $this->input->post('proceso');
            $data['estadocontado_id']             = $this->input->post('estadocontado_id');

            $this->db->insert('llamadas_contado', $data);
            $this->session->set_flashdata('flash_message' , 'Datos almacenados correctamente');

            redirect(site_url('admin/llamadas_contado/'. $id_marketing), 'refresh');
        }

       $page_data['clientes']   = $this->db->get('llamadas_contado')->result_array();
       $page_data['page_name']  = 'llamadas_contado';
       $page_data['page_title'] = 'Gestion de Llamadas';
       $this->load->view('backend/index', $page_data);
      }


    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
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
            redirect(site_url('admin/system_settings'), 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('theme_selected'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }


    function frontend_pages($param1 = '', $param2 = '', $param3 = '') {
      if ($this->session->userdata('admin_login') != 1) {
        redirect(site_url('login'), 'refresh');
      }
      if ($param1 == 'events') {
        $page_data['page_content']  = 'frontend_events';
      }
      if ($param1 == 'gallery') {
        $page_data['page_content']  = 'frontend_gallery';
      }
      if ($param1 == 'privacy_policy') {
        $page_data['page_content']  = 'frontend_privacy_policy';
      }
      if ($param1 == 'about_us') {
        $page_data['page_content']  = 'frontend_about_us';
      }
      if ($param1 == 'terms_conditions') {
        $page_data['page_content']  = 'frontend_terms_conditions';
      }
      if ($param1 == 'homepage_slider') {
        $page_data['page_content']  = 'frontend_slider';
      }
      if ($param1 == '' || $param1 == 'general') {
        $page_data['page_content']  = 'frontend_general_settings';
      }
      if ($param1 == 'gallery_image') {
        $page_data['page_content']  = 'frontend_gallery_image';
        $page_data['gallery_id']  = $param2;
      }
      $page_data['page_name'] = 'frontend_pages';
      $page_data['page_title']  = get_phrase('pages');
      $this->load->view('backend/index', $page_data);
    }

    function frontend_events($param1 = '', $param2 = '') {
      if ($param1 == 'add_event') {
        $this->frontend_model->add_event();
        $this->session->set_flashdata('flash_message' , get_phrase('event_added_successfully'));
        redirect(site_url('admin/frontend_pages/events'), 'refresh');
      }
      if ($param1 == 'edit_event') {
        $this->frontend_model->edit_event($param2);
        $this->session->set_flashdata('flash_message' , get_phrase('event_updated_successfully'));
        redirect(site_url('admin/frontend_pages/events'), 'refresh');
      }
      if ($param1 == 'delete') {
        $this->frontend_model->delete_event($param2);
        $this->session->set_flashdata('flash_message' , get_phrase('event_deleted'));
        redirect(site_url('admin/frontend_pages/events'), 'refresh');
      }
    }

    function frontend_gallery($param1 = '', $param2 = '', $param3 = '') {
      if ($param1 == 'add_gallery') {
        $this->frontend_model->add_gallery();
        $this->session->set_flashdata('flash_message' , get_phrase('gallery_added_successfully'));
        redirect(site_url('admin/frontend_pages/gallery'), 'refresh');
      }
      if ($param1 == 'edit_gallery') {
        $this->frontend_model->edit_gallery($param2);
        $this->session->set_flashdata('flash_message' , get_phrase('gallery_updated_successfully'));
        redirect(site_url('admin/frontend_pages/gallery'), 'refresh');
      }
      if ($param1 == 'upload_images') {
        $this->frontend_model->add_gallery_images($param2);
        $this->session->set_flashdata('flash_message' , get_phrase('images_uploaded'));
        redirect(site_url('admin/frontend_pages/gallery_image/'.$param2), 'refresh');
      }
      if ($param1 == 'delete_image') {
        $this->frontend_model->delete_gallery_image($param2);
        $this->session->set_flashdata('flash_message' , get_phrase('images_deleted'));
        redirect(site_url('admin/frontend_pages/gallery_image/'.$param3), 'refresh');
      }

    }



    function frontend_settings($task) {
      if ($task == 'update_terms_conditions') {
        $this->frontend_model->update_terms_conditions();
        $this->session->set_flashdata('flash_message' , get_phrase('terms_updated'));
        redirect(site_url('admin/frontend_pages/terms_conditions'), 'refresh');
      }
      if ($task == 'update_about_us') {
        $this->frontend_model->update_about_us();
        $this->session->set_flashdata('flash_message' , get_phrase('about_us_updated'));
        redirect(site_url('admin/frontend_pages/about_us'), 'refresh');
      }
      if ($task == 'update_privacy_policy') {
        $this->frontend_model->update_privacy_policy();
        $this->session->set_flashdata('flash_message' , get_phrase('privacy_policy_updated'));
        redirect(site_url('admin/frontend_pages/privacy_policy'), 'refresh');
      }
      if ($task == 'update_general_settings') {
        $this->frontend_model->update_frontend_general_settings();
        $this->session->set_flashdata('flash_message' , get_phrase('general_settings_updated'));
        redirect(site_url('admin/frontend_pages/general'), 'refresh');
      }
      if ($task == 'update_slider_images') {
        $this->frontend_model->update_slider_images();
        $this->session->set_flashdata('flash_message' , get_phrase('slider_images_updated'));
        redirect(site_url('admin/frontend_pages/homepage_slider'), 'refresh');
      }
    }

    function frontend_themes() {
      if ($this->session->userdata('admin_login') != 1) {
        redirect(site_url('login'), 'refresh');
      }
      $page_data['page_name'] = 'frontend_themes';
      $page_data['page_title']  = get_phrase('themes');
      $this->load->view('backend/index', $page_data);
    }

    // FRONTEND


    function get_session_changer()
    {
        $this->load->view('backend/admin/change_session');
    }

    function change_session()
    {
        $data['description'] = $this->input->post('running_year');
        $this->db->where('type' , 'running_year');
        $this->db->update('settings' , $data);
        $this->session->set_flashdata('flash_message' , get_phrase('session_changed'));
        redirect(site_url('admin/dashboard'), 'refresh');
    }

	/***** UPDATE PRODUCT *****/

	function update( $task = '', $purchase_code = '' ) {

        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        // Create update directory.
        $dir    = 'update';
        if ( !is_dir($dir) )
            mkdir($dir, 0777, true);

        $zipped_file_name   = $_FILES["file_name"]["name"];
        $path               = 'update/' . $zipped_file_name;

        move_uploaded_file($_FILES["file_name"]["tmp_name"], $path);

        // Unzip uploaded update file and remove zip file.
        $zip = new ZipArchive;
        $res = $zip->open($path);
        if ($res === TRUE) {
            $zip->extractTo('update');
            $zip->close();
            unlink($path);
        }

        $unzipped_file_name = substr($zipped_file_name, 0, -4);
        $str                = file_get_contents('./update/' . $unzipped_file_name . '/update_config.json');
        $json               = json_decode($str, true);

		// Run php modifications
		require './update/' . $unzipped_file_name . '/update_script.php';

        // Create new directories.
        if(!empty($json['directory'])) {
            foreach($json['directory'] as $directory) {
                if ( !is_dir( $directory['name']) )
                    mkdir( $directory['name'], 0777, true );
            }
        }

        // Create/Replace new files.
        if(!empty($json['files'])) {
            foreach($json['files'] as $file)
                copy($file['root_directory'], $file['update_directory']);
        }

        $this->session->set_flashdata('flash_message' , get_phrase('product_updated_successfully'));
        redirect(site_url('admin/system_settings'), 'refresh');
    }



    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
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
			redirect(site_url('admin/manage_language/edit_phrase/'.$language), 'refresh');
		}
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(site_url('admin/manage_language'), 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(site_url('admin/manage_language'), 'refresh');
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
			redirect(site_url('admin/manage_language'), 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

			redirect(site_url('admin/manage_language'), 'refresh');
		}
		$page_data['page_name']        = 'manage_language';
		$page_data['page_title']       = get_phrase('manage_language');
		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
		$this->load->view('backend/index', $page_data);
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $admin_id = $param2;

            $validation = email_validation_for_edit($data['email'], $admin_id, 'admin');
            if($validation == 1){
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            }
            else{
                $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
            }
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }

}
