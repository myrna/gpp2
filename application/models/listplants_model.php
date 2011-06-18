<?php

/**
 * listplants_model.php
 *
 * Connects with plantdata table, allows search and lists plants in table
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Listplants_model extends Model {

    function get_records($page = "0"){
        $this->db->limit(30, $page);
        $query = $this->db->get('plant_data');
        $data['query'] = $query;
        $data['total_rows'] = $query->num_rows();
        return $data;
    }

}
/* Note query string dependent on ./application/libraries/MY_Input.php */
/* End of file listplants_model.php */
/* Location: ./application/models/listplants_model.php */
