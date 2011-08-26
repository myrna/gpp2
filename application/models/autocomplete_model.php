<?php

/**
 *Search Autocomplete Model
 *
 * *
 * @package		GPP
 * @subpackage	Models
 * @category		Models
 */

class Autocomplete_model extends CI_Model  // this works but need to extend list to include full botanical name
{

	public function searchterms($keyword)
    {
        
        $this->db->select('id,genus');
        $this->db->from('plant_data');
        $this->db->like('genus', $keyword);
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
