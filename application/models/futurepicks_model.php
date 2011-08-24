<?php
/**
 * plantlists_model.php
 *  PUBLIC
 * Connects with plantdata table, allows search and lists plants in table
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 *
 */

class Futurepicks_model extends CI_Model {

    function get_picks($query, $limit, $offset, $sort_by, $sort_order) {
        //prevent incorrect parameters being inserted into URL
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc'; // eliminate all options except desc and asc
        $sort_columns = array('genus','plant_type','gpp_year'); // determine sortable columns
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'gpp_year';
                                      
        $records = $this->db->select()->from('plant_data')->where('gpp_year >','2011')->
                limit($limit, $offset)->
                get()->result_array();

            $data['records'] = $found[0]['numrows'];
            $data['rows'] = $records;
       
        return $data;
    }

   
}
