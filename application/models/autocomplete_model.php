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
        $this->db->select('id, genus');
        $this->db->from('plant_data');
        //$this->db->where('suppress', 0);
        $this->db->like('genus', $keyword);
        $this->db->order_by("genus", "asc");

        $query = $this->db->get();
        foreach($query->result_array() as $row){
            //$data[$row['genus']];
            $data[] = $row;
        }
        //return $data;
        return $query;
    }

}

/* End of file autocomplete_model.php */
/* Location: ./application/models/autocomplete_model.php */
