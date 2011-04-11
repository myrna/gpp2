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
		$query = $this->db->get('plantdata');
              	return $query->result();
	}
    function add_record($plants)
    {
        $this->db->insert('plantdata', $plants);
        return;
    }
    function update_record($plants)
    {
        $this->db->where('id', $plantid);
        $this->db->update('plantdata', $plants);
    }
    function delete_row()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('plantdata');
    }
     
}
/* End of file db_model.php */
/* Location: ./application/models/db_model.php */
