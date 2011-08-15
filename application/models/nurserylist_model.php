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
                    ->from('nursery_directory')->order_by('nursery_name','asc')->order_by('state_province','asc')->
                    where('state_province !=',"WA")->where('state_province !=',"OR")->where('state_province !=',"BC")->
                    where('publish',"yes")->get();
             $data['query4'] = $query4;
             return $data;
        }
        /**
    * Add new record to DB table.
    *
    */
    function add_record($data)
    {
        $result = 0;
        //check if $data is not empty
        if(!empty($data))
        {
            //insert $data with insert method
            $result = $this->db->insert('nursery_directory',$data);
        }
        return $result;

    }

    // get individual record from database using list produced by get_records//

    function get_record($id)
    {
        if(!empty($id))
        {
            //use the where function to add a filter to our query, this time the id, with the $id value

            $query = $this->db->where('id', $id);

            //and then execute the query
            $query = $this->db->get('nursery_directory');
        }
        if ($query->num_rows() > 0) {
            return $row = $query->row();
        }
        else
        {
            $row = FALSE;
        }
        return $row;
    }


    function get_record_as_array($id)
    {
        if(!empty($id))
        {
            //use the where function to add a filter to our query, this time the id, with the $id value

            $query = $this->db->where('id', $id);

            //and then execute the query
            $query = $this->db->get('nursery_directory');
        }
        if ($query->num_rows() > 0) {
            return $row = $query->result_array();
        }
        else
        {
            $row = FALSE;
        }
    }

    // Update existing record in DB table.


    function edit_record($data, $id)
    {

        $result = 0;
        if(!empty($data)){
            $this->db->where('id', $id);
            $result = $this->db->update('nursery_directory', $data);
        }

        return $result;
    }

    //Delete specified records from the DB table.

    function delete_record($id)
    {
        $return = 0;
        if(!empty($id))
        {
            $this->db->where('id', $id);
            $result = $this->db->delete('nursery_directory');
        }
        return $result;
    }

}
/* End of file listnurseries_model.php */
/* Location: ./application/models/listnurseries_model.php */
