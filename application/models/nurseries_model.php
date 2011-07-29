<?php

/**
* nurseries_model.php
*
* Handle ADMIN nursery table add/delete operations.
*
* @package		Great Plant Picks
* @subpackage	Models
* @category		Models
*/

class Nurseries_model extends CI_Model
{

    /**
    * Get and return all nursery records from DB table.
    *
    */
  
    function get_nurseries()
    {
        $this->db->get('nursery_directory');
            
        $this->db->select("CONCAT(city, ',', state_province) AS location", FALSE);
        $query = $this->db->select('id,nursery_name,city,state_province')
                    ->from('nursery_directory')->order_by('nursery_name','asc')->get();
        $data['query'] = $query;
        return $data;
    }
    function add_nursery($data)
	{
		$this->db->insert('nursery_directory', $data);
		return;
	}
    function get_nursery($id)
    {
      if(!empty($id))
        {            
           $this->db->where('id', $id);
           $query = $this->db->get('nursery_directory');
        }
      if ($query->num_rows() > 0)
        {
        $row = $query->row();
        }
      else
        {
        $row = FALSE;
        }
      return $row;
    }
    function edit_nursery($data, $id)
    {
        $result = 0;
        if(!empty($data))
        {
            $this->db->where('id', $id);
            $result = $this->db->update('nursery_directory', $data);
        }
        return $result;
    }

    function delete_nursery()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('nursery_directory');
    }
}

/* End of file nurseries_model.php */
/* Location: ./application/models/nurseries_model.php */
