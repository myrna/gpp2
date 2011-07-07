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

class Crud_model extends CI_Model
{

    /**
    * Get and return all records from DB table.
    *
    */
    public function get_id($element) {
        $values = array_values($element);
        return intval($values[0]);
    }
    
    public $plant_link_tables = array(
			'water',
			'sun',
			'flower_color',
                      //  'foliage_color',
                        'design_use',
			'pest_resistance',
			'soil',
			'wildlife'                       
    );

    public function update_link_table($id, $primary, $attribute, $values) {
        $link_table_name = "$primary" . "_" . $attribute;
        $attribute_key = $attribute . "_id";
		$primary_key = $primary . "_id";
        if (empty($values)) {
            // if we got nothing checked, then just clear everything.
            $this->db->where($primary_key, $id)->delete($link_table_name);
        } else {
            // handle the  requirements linking tables
            // this is hacky and should be fixed eventually, but handling unsent checkboxes is always a clusterf.
            // first we go through and delete anything from the link table that was not sent in the post (i.e. not checked)
            $this->db->where($primary_key, $id);
            $this->db->where_not_in($attribute_key, $values);
            $this->db->delete($link_table_name);
            // now we go back through and make sure that the ones that were checked in the linking table.
            foreach ($values as $req) {
                $this->db->where( array($primary_key => $id, $attribute_key => $req ) );
                $query = $this->db->get($link_table_name);
                if ($query->num_rows() == 0) {
                    // if it doesn't exist, insert it.
                    $this->db->set($primary_key, $id);
                    $this->db->set($attribute_key, $req);
                    $this->db->insert($link_table_name);
                }
            }
        }
    }
    
    public function link_table($id, $attribute, $primary) {

        $join_table_name = $primary . "_" . $attribute;
        $list_table_name = $attribute;
        $list = $this->db->get($list_table_name)->result_array();

        if ($id) {
            $attribute_key = $attribute . "_id";
            $primary_key = $primary . "_id";
            $current = array_map("Crud_model::get_id", $this->db->where($primary_key, $id)->select($attribute_key)->get($join_table_name)->result_array());
        } else {
            $current = array();
        }
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
        if(!empty($data))
        {

            foreach ($this->plant_link_tables as $link_name) {
                if (array_key_exists($link_name, $data)) {
                    $link_name = $data[$link_name];
                    unset($data[$link_name]);
                }
            }
            $this->db->insert('plant_data',$data);
            $id = $this->db->insert_id();

            foreach ($this->plant_link_tables as $linkname) {
                if (isset(${$linkname})) {
                    $this->update_link_table($id, 'plant', $linkname, ${$linkname});
                }
            }            
        }
        return $id;
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

            foreach ($this->plant_link_tables as $link_name) {
                if (array_key_exists($link_name, $data)) {
                    $this->update_link_table($id, 'plant', $link_name, $data[$link_name]);
                    unset($data[$link_name]);
                } else {
                    $this->update_link_table($id, 'plant', $link_name, array());
                }
            }
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
