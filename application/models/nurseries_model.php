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
   public function get_id($element) {
        $values = array_values($element);
        return intval($values[0]);
    }
   
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
    function delete_nursery($id)
    {
       // $result = 0;
        //if(!empty($id))
        {
            $this->db->where('id', $id);
            $this->db->delete('nursery_directory');
        }
        //return $result;
    }
}

/* End of file nurseries_model.php */
/* Location: ./application/models/nurseries_model.php */
