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

    function search($query_array, $limit, $offset, $sort_by, $sort_order) {

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc'; // if desc selected then desc, else asc order
        $sort_columns = array('plant_id','family','genus','species','cultivar', 'plant_type', 'plant_height');  // sortable columns
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by  : 'family';
        //results query
        $q = $this->db->select('plant_id, family, genus, species, cultivar, plant_type, plant_height')
                ->from('plant_data')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

            if (strlen($query_array['genus'])) {
            $q->where('genus', $query_array['genus']);
        }
            if (strlen($query_array['plant_type'])) {
            $q->where('plant_type', $query_array['plant_type']);
        }
          if (strlen($query_array['plant_height'])) {
            $operators =  array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<');
            $operator = $operators[$query_array['height_comparison']];

            $q->where("plant_height $operator", $query_array['plant_height']);
        }
        $ret['rows'] = $q->get()->result();
        //count query
        $q = $this->db->select('COUNT(*) as count', FALSE) // whenever function is used as field enter FALSE
                ->from('plant_data');

              if (strlen($query_array['genus'])) {
            $q->where('genus', $query_array['genus']);
        }
             if (strlen($query_array['plant_type'])) {
            $q->where('plant_type', $query_array['plant_type']);
        }
             if (strlen($query_array['plant_height'])) {
            $operators =  array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<');
            $operator = $operators[$query_array['height_comparison']];

            $q->where("plant_height $operator", $query_array['plant_height']);
          }
        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;
        return $ret;
    }
// create dropdown for Plant Type input field
    function planttype_options() {
        $rows = $this->db->select('plant_type')
                ->from('plant_data')
                ->get()->result();

        $planttype_options = array('' => '');
        foreach ($rows as $row) {
            $planttype_options[$row->plant_type] = $row->plant_type;
        }

        return $planttype_options;       
    }
}

/* End of file listplants_model.php */
/* Location: ./application/models/listplants_model.php */
