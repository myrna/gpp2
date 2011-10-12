<?php

/**
 *Search Autocomplete Model
 *
 * *
 * @package		GPP
 * @subpackage	Models
 * @category		Models
 */

class Autocomplete_model extends CI_Model  
{

	public function searchterms($keyword)
    {
        $this->db->select('genus');
        $this->db->from('plant_data');
        $this->db->like('genus',$keyword); // is this where the problem is?  All autocomplete results start at "A"
        $this->db->order_by("genus", "asc");
        $this->db->group_by('genus');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[] = $row;
        }
        return $query;
    }

}



/* End of file autocomplete_model.php */
/* Location: ./application/models/autocomplete_model.php */

