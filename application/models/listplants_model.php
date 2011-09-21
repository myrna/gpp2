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

class Listplants_model extends CI_Model {

    function get_records($page,$query) {
        $this->db->limit(30, $page);
        $this->db->order_by("genus", "asc")->order_by("specific_epithet", "asc")->order_by("cultivar", "asc");
        return $this->db->get('plant_data');        
    }

}
/* Note query string dependent on ./application/libraries/MY_Input.php */
/* End of file listplants_model.php */
/* Location: ./application/models/listplants_model.php */
