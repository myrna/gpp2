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

    function plant_merge($a, $b) {
        foreach ($b as $incoming) {
            $found = false;
            foreach ($a as $plant) {
                if ($incoming['id'] == $plant) {
                    $found = true;
                }
            }
            if ($found == false) {
                $a[] = $b;
            }
        }
        return $a;
    }

    function name_search($query) {
        $matchwords = explode(" ", $query);
        $matchfields = array('genus', 'specific_epithet', 'family', 'cultivar', 'cross_species', 'trade_name','trademark_name',
            'registered_name','plant_type'); 
        foreach ($matchfields as $field) {
            foreach ($matchwords as $match) {
                $this->db->or_like('plant_data.' . $field, $match);
            }
        }
    }
    
    function common_name_search($query) {
        $matchwords = explode(" ", $query);
        foreach ($matchwords as $match) {
            $this->db->or_like('plant_common_name.common_name', $match);
        }
    }
    
    function synonym_search($query) {
        $matchwords = explode(" ", $query);
        $matchfields = array('genus', 'specific_epithet', 'family', 'cultivar', 'cross_species', 'trade_name','trademark_name',
            'registered_name'); 
        foreach ($matchfields as $field) {
            foreach ($matchwords as $match) {
                $this->db->or_like('plant_synonym.' . $field, $match);
            }
        }
    }
    
    function basic_search($query, $limit, $offset, $sort_by, $sort_order) {
        //prevent incorrect parameters being inserted into URL
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc'; // eliminate all options except desc and asc
        $sort_columns = array('genus','family_common_name','plant_height_at_10'); // determine sortable columns
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'genus';

        if ($query != "") {
            $this->common_name_search($query);
            $this->synonym_search($query);
            $this->name_search($query);
        # this ugly select in the from clause is to get only the published ones for further selections.
        # I'm sure this could be made faster with other methods, but this will do for now.
         $found = $this->db->select('COUNT(DISTINCT plant_data.id) as numrows')->from("(select * from plant_data where publish = 'yes') as plant_data")->
                join('plant_synonym', 'plant_synonym.synonym_id = plant_data.id', 'left')->
                join('plant_common_name', 'plant_common_name.plant_id = plant_data.id', 'left')->
                get()->result_array();
            

            // this seems crazy that we have to set this up twice, but whatever.

            $this->common_name_search($query);
            $this->synonym_search($query);
            $this->name_search($query);

           $records = $this->db->select('plant_data.*')->from("(select * from plant_data where publish = 'yes') as plant_data")->
                join('plant_synonym', 'plant_synonym.synonym_id = plant_data.id', 'left')->
                join('plant_common_name', 'plant_common_name.plant_id = plant_data.id', 'left')->
                distinct()->
                limit($limit, $offset)->
                get()->result_array();

            $data['found'] = $found[0]['numrows'];
            $data['rows'] = $records;
        } else {
            $data['found'] = $this->db->count_all('plant_data');
            $data['rows'] = $this->db->limit($limit, $offset)->get('plant_data')->result_array();
        }
        return $data;
    }

//unused functions below ... ok to delete?

// view individual record
    
    function view() {
        
    }
   
   function get_records($page) {
        $this->db->limit(30, $page);
        return $this->db->get('plant_data');        
    }
   
}
