<?php

/**
* crud_model.php
*
* Handle CRUD DB operations.
*
* @package		Great Plant Picks
* @subpackage	Models
* @category		Models
* @author		jg :)
*/

class Crud_model extends Model
{

    /**
    * Get and return all records from DB table.
    *
    */
    function get_records($page = "0"){
        $this->db->limit(30, $page);
        $query = $this->db->get('plant_data');
        $query2 = $this->db->get('plant_data');
        $total_rows = $query2->num_rows();
        $data['query'] = $query;
        $data['total_rows'] = $total_rows;
        return $data;
    }

    public function get_id($element) {
        $values = array_values($element);
        return intval($values[0]);
    }

    function link_table($id, $root) {
        $join_table_name = 'plant_' . $root;
        $list_table_name = $root;
        $key_name = $root . "_id";

        $list = $this->db->get($list_table_name)->result();
        $current = array_map("Crud_model::get_id", $this->db->where('plant_id', $id)->select("$key_name")->get($join_table_name)->result_array());

        return array(
            'list' => $list,
            'current' => $current
        );

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
            $result = $this->db->insert('plant_data',$data);
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
            $query = $this->db->get('plant_data');
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
            $query = $this->db->get('plant_data');
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
            $result = $this->db->update('plant_data', $data);
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
            $result = $this->db->delete('plant_data');
        }
        return $result;
    }


}

/* End of file crud_model.php */
/* Location: ./application/models/crud_model.php */
