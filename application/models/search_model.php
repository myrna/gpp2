<?php

/**
 *Search Autocomplete Model
 *
 * *
 * @package		GPP
 * @subpackage	Models
 * @category		Models
 */

class Search_model extends CI_Model
{

	public function sw_search($keyword)
    {
        $this->db->select('genus');
        $this->db->from('plant_data');
        $this->db->where('suppress', 0);
        $this->db->like('genus', $searchterms);
        $this->db->order_by("genus", "asc");

        $q = $this->db->get();
        foreach($q->result_array() as $row){
            //$data[$row['friendly_name']];
            $data[] = $row;
        }
        //return $data;
        return $q;
    }

}

/* End of file search_model.php */
/* Location: ./application/models/search_model.php */
