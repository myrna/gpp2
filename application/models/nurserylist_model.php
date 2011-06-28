<?php

/**
 * listnurseries_model.php
 *
 * Connects with nursery_directory table to display nursery lists grouped by state/province
 * and sorted by nursery name ascending
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Nurserylist_model extends CI_Model {

    function get_nurseries_wa(){
            $this->db->get('nursery_directory');
            $this->db->select("CONCAT(phone_area_code, '-', phone_prefix, '-', phone_number) AS phone", FALSE);
             $this->db->select("CONCAT(city, ',', state_province) AS location", FALSE);
            $query = $this->db->select('nursery_name,city,state_province,phone_area_code,phone_prefix,phone_number,website_url')
                    ->from('nursery_directory')->
                    order_by('state_province','asc')->order_by('nursery_name','asc')->where('state_province',"WA")->where('publish',"yes")->get();
             $data['query'] = $query;
             return $data;
        }
     function get_nurseries_or(){
            $this->db->get('nursery_directory');
            $this->db->select("CONCAT(phone_area_code, '-', phone_prefix, '-', phone_number) AS phone", FALSE);
             $this->db->select("CONCAT(city, ',', state_province) AS location", FALSE);
            $query2 = $this->db->select('nursery_name,city,state_province,phone_area_code,phone_prefix,phone_number,website_url')
                    ->from('nursery_directory')->
                    order_by('state_province','asc')->order_by('nursery_name','asc')->where('state_province',"OR")->where('publish',"yes")->get();
             $data['query2'] = $query2;
             return $data;
        }
      function get_nurseries_bc(){
            $this->db->get('nursery_directory');
            $this->db->select("CONCAT(phone_area_code, '-', phone_prefix, '-', phone_number) AS phone", FALSE);
             $this->db->select("CONCAT(city, ',', state_province) AS location", FALSE);
            $query3 = $this->db->select('nursery_name,city,state_province,phone_area_code,phone_prefix,phone_number,website_url')
                    ->from('nursery_directory')->
                    order_by('state_province','asc')->order_by('nursery_name','asc')->where('state_province',"BC")->where('publish',"yes")->get();
             $data['query3'] = $query3;
             return $data;
        }
        function get_nurseries_other(){
            $this->db->get('nursery_directory');
            $this->db->select("CONCAT(phone_area_code, '-', phone_prefix, '-', phone_number) AS phone", FALSE);
            $this->db->select("CONCAT(city, ',', state_province) AS location", FALSE);
            $query4 = $this->db->select('nursery_name,city,state_province,phone_area_code,phone_prefix,phone_number,website_url')
                    ->from('nursery_directory')->order_by('state_province','asc')->order_by('nursery_name','asc')->
                    where('state_province !=',"WA")->where('state_province !=',"OR")->where('state_province !=',"BC")->
                    where('publish',"yes")->get();
             $data['query4'] = $query4;
             return $data;
        }
}
/* End of file listnurseries_model.php */
/* Location: ./application/models/listnurseries_model.php */
