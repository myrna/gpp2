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

class Plantlists_model extends CI_Model {

    function search($limit, $offset, $sort_by, $sort_order) {
        //prevent incorrect parameters being inserted into URL
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc'; // eliminate all options except desc and asc
        $sort_columns = array('genus','plant_height_at_10'); // determine sortable columns
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'genus';
        
        $q = $this->db->select()
                ->from('plant_data')
                ->where('publish','yes')
                ->limit($limit,$offset)
                ->order_by($sort_by, $sort_order);
     
        $ret['rows'] = $q->get()->result_array();
        
        // count query (function as field requires FALSE)
        $q = $this->db->select('COUNT(*) as count',FALSE)
            ->from('plant_data')
            ->where('publish','yes');
    
        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;
        
        return $ret;
    }

    // view individual record

    function view() {
        
    }
   
}
