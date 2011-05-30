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

class Nurserylist_model extends Model {

    function get_nurseries(){
            $this->db->get('nursery_directory');
            $this->db->select("CONCAT(phone_area_code, '-', phone_prefix, '-', phone_number) AS phone", FALSE);
             $this->db->select("CONCAT(city, ',', state_province) AS location", FALSE);
            $query = $this->db->select('nursery_name,city,state_province,phone_area_code,phone_prefix,phone_number,website_url')
                    ->from('nursery_directory')->
                    order_by('state_province','desc')->order_by('nursery_name','asc')->get();
           
            $data['query'] = $query;
            return $data;
        }
}
/* End of file listnurseries_model.php */
/* Location: ./application/models/listnurseries_model.php */
