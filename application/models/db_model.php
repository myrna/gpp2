<?php

/**
 * db_model.php
 *
 * Database Administration model (controller: dbadmin.php)
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Db_model extends Model {

    function get_records()
	{
		$query = $this->db->get('plant_data');
              	return $query->result();
	}
    function add_record($plants)
    {
        $this->db->insert('plant_data', $plants);
        return;
    }
    function update_record($plants)
    {
        $this->db->where('plant_id', $plant_id);
        $this->db->update('plant_data', $plants);
    }
    function delete_row()
    {
        $this->db->where('plant_id', $this->uri->segment(3));
        $this->db->delete('plant_data');
    }
     
}
/* End of file db_model.php */
/* Location: ./application/models/db_model.php */
