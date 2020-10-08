<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function getLastCodeID($lim){
              
        $this->db->where('TIPO_CODIGO', 'JUEGO');
        $this->db->where('ESTADO', 'INACTIVO');
        $this->db->limit($lim);
        $this->db->select('CODIGO');
        $this->db->from('codigos');
        $query = $this->db->get();
        return $query->result();
    }


    function get_type_name_by_id($type = '', $type_id = '', $field = 'name') {
        if ($type_id != null && $type_id != 0){
            return $this->db->get_where($type, array($type.'_id' => $type_id))->row()->$field;
        }

    }

    ////////ASESORES/////////////
    function get_type_nombre_asesor_by_id($type, $type_id = '', $field = 'name') {
      return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }



    function get_system_settings() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }


    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url('uploads/' . $type . '_image/' . $id . '.jpg');
        else
            $image_url = base_url('uploads/user.jpg');

        return $image_url;
    }



    function curl_request($code = '') {

        $product_code = $code;

        $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$product_code.'.json';
        $ch_verify = curl_init( $verify_url . '?code=' . $product_code );

        curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec( $ch_verify );
        curl_close( $ch_verify );

        $response = json_decode($cinit_verify_data, true);

        if (count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return false;
        }

  	}


    function get_settings($type)
    {
        $des = $this->db->get_where('settings', array('type' => $type))->row()->description;
        return $des;
    }


    // update stripe keys
    function update_stripe_keys() {
        $info = array();

        $stripe['active'] = $this->input->post('stripe_active');
        $stripe['testmode'] = $this->input->post('testmode');
        $stripe['public_key'] = $this->input->post('public_key');
        $stripe['secret_key'] = $this->input->post('secret_key');
        $stripe['public_live_key'] = $this->input->post('public_live_key');
        $stripe['secret_live_key'] = $this->input->post('secret_live_key');

        array_push($info, $stripe);

        $data['description']    =   json_encode($info);
        $this->db->where('type', 'stripe_keys');
        $this->db->update('settings', $data);
    }




}
