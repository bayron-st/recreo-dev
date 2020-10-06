<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *  @author   : Creativeitem
 *  date    : 14 september, 2017
 *  Ekattor School Management System Pro
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */
class Home extends CI_Controller {

  protected $theme;

  // constructor
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->theme = $this->frontend_model->get_frontend_general_settings('theme');
  }

  // default function
  public function index() {
    $page_data['page_name']  = 'home';
    $page_data['page_title'] = get_phrase('home');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // noticeboard
  function noticeboard() {
    $count_notice = $this->db->get_where('noticeboard', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_notice, 9);
    $config['base_url']  = site_url('home/noticeboard/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'noticeboard';
    $page_data['page_title'] = get_phrase('noticeboard');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function notice_details($notice_id = '') {
    $page_data['notice_id'] = $notice_id;
    $page_data['page_name']  = 'notice_details';
    $page_data['page_title'] = get_phrase('notice_details');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function events() {
    $count_events = $this->db->get_where('frontend_events', array('status' => 1))->num_rows();
    $config = array();
    $config = manager($count_events, 8);
    $config['base_url']  = site_url('home/events/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'event';
    $page_data['page_title'] = get_phrase('event_list');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function teachers() {
    $count_teachers = $this->db->get_where('teacher', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_teachers, 9);
      $config['base_url']  = site_url('home/teachers/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'teacher';
    $page_data['page_title'] = get_phrase('teachers');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function gallery() {
    $count_gallery = $this->db->get_where('frontend_gallery', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_gallery, 6);
    $config['base_url']  = site_url('home/gallery/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'gallery';
    $page_data['page_title'] = get_phrase('gallery');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function gallery_view($gallery_id = '') {
    $count_images = $this->db->get_where('frontend_gallery_image', array(
      'frontend_gallery_id' => $gallery_id
    ))->num_rows();
    $config = array();
    $config = manager($count_images, 9);
    $config['base_url']  = site_url('home/gallery_view/'.$gallery_id.'/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['gallery_id']  = $gallery_id;
    $page_data['page_name']  = 'gallery_view';
    $page_data['page_title'] = get_phrase('gallery');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function admission() {
    $page_data['page_name']  = 'admission';
    $page_data['page_title'] = get_phrase('admission_form');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function about() {
    $page_data['page_name']  = 'about';
    $page_data['page_title'] = get_phrase('about_us');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function contact($param1 = '', $param2 = '', $param3 = '')
  {
    if ($param1 == 'create') {


              $data['nombre']        			         = $this->input->post('nombre');
              $data['correo']       			         = $this->input->post('correo');
              $data['celular']       			         = $this->input->post('celular');
              $data['comentarios']       			     = $this->input->post('comentarios');



        $data['fecha']=date("Y-m-d");


        $this->db->insert('marketing', $data);

        $id_marketing=$this->db->insert_id();

 //tabla finanzas
        $data8['id_marketing']     		= $id_marketing;
        $this->db->insert('finanzas', $data8);

    //tabla ciudad
        $data1['id_marketing']     		= $id_marketing;


        $this->db->insert('ciudad', $data1);

    //tabla datos_laborales
        $data2['id_marketing']     		= $id_marketing;


        $this->db->insert('datos_laborales', $data2);

    //tabla datos_familia
        $data3['id_marketing']     		= $id_marketing;

        $this->db->insert('datos_familia', $data3);

    //tabla referencias_familiares
        $data4['id_marketing']     		= $id_marketing;

        $this->db->insert('referencias_familiares', $data4);

    //tabla referencias_personales
        $data5['id_marketing']     		= $id_marketing;

        $this->db->insert('referencias_personales', $data5);

    //tabla referencias_proveedor
        $data9['id_marketing']     		   = $id_marketing;


        $this->db->insert('referencias_proveedor', $data9);

    //tabla referencias_cliente
        $data10['id_marketing']     		= $id_marketing;

        $this->db->insert('referencias_cliente', $data10);

    //tabla vivienda
        $data7['id_marketing']     		= $id_marketing;


        $this->db->insert('vivienda', $data7);

    //tabla vehiculo_patrimonio
        $data12['id_marketing']     		= $id_marketing;

        $this->db->insert('vehiculos_patrimonio', $data12);

    //tabla raices_patrimonio
        $data13['id_marketing']     		= $id_marketing;

        $this->db->insert('raices_patrimonio', $data13);

    //tabla vehiculos
        $data6['id_marketing']     		     = $id_marketing;


        $this->db->insert('vehiculos', $data6);

        $data14['id_marketing']     		= $id_marketing;

        $this->db->insert('llamadas_marketing', $data14);


        $data15['id_marketing']     		= $id_marketing;
        $this->db->insert('llamadas_documentos_f', $data15);
                                //tabla llamadas_captacion

                                    $data16['id_marketing']     		= $id_marketing;
                                    $this->db->insert('captacion_comprare_contado', $data16);

        $this->session->set_flashdata('flash_message' , 'Datos almacenados correctamente');




redirect('https://elrecreoesdetodos.com//', 'refresh');

  }

   $page_data['page_name']  = 'contact';
   $page_data['page_title'] = 'contact-us';
   $this->load->view('frontend/'.$this->theme.'/index', $page_data);


  }

  function terms_conditions() {
    $page_data['page_name']  = 'terms_conditions';
    $page_data['page_title'] = get_phrase('terms_&_conditions');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }
}
