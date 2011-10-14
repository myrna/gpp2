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

    function basic_search($query) {
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
                get()->result_array();

            $data['found'] = $found[0]['numrows'];
            $data['rows'] = $records;
        } else {
            $found = $this->db->select('COUNT(DISTINCT plant_data.id) as numrows')->from("(select * from plant_data where publish = 'Yes') as plant_data")->get()->result_array();
            $records = $this->db->select('plant_data.*')->from("(select * from plant_data where publish = 'Yes') as plant_data")->get()->result_array();
            $data['found'] = $found[0]['numrows'];
            $data['rows'] = $records;
        }
        return $data;
    }

    function advanced_search($query_array) {
        foreach ($query_array as $attribute => $value) {
            if (!isset($value)) {
                unset($query_array[$attribute]);
            } elseif (is_string($value)) {
                $query_array[$attribute] = strtolower($value);
            }
        }
        $this->db->select('plant_data.*')->from("(select * from plant_data where publish = 'yes') as plant_data");

        $this->db->join('plant_water', 'plant_water.plant_id = plant_data.id', 'left');
        $this->db->join('plant_soil', 'plant_soil.plant_id = plant_data.id', 'left');
        $this->db->join('plant_sun', 'plant_sun.plant_id = plant_data.id', 'left');            
        $this->db->join('plant_foliage_color', 'plant_foliage_color.plant_id = plant_data.id', 'left');
	$this->db->join('plant_foliage_texture', 'plant_foliage_texture.plant_id = plant_data.id', 'left');
        $this->db->join('plant_flower_color', 'plant_flower_color.plant_id = plant_data.id', 'left');

        if ($query_array['foliage_color']) {
            $this->db->where('plant_foliage_color.foliage_color_id', 
				"(select id from foliage_color where lower(foliage_color) = " . $this->db->escape($query_array['foliage_color']) . ")", false);
        }
         if ($query_array['flower_color']) {
            $this->db->where('plant_flower_color.flower_color_id',
				"(select id from flower_color where lower(flower_color) = " . $this->db->escape($query_array['flower_color']) . ")", false);
        }

		if ($query_array['foliage_texture']) {
			$this->db->where('plant_foliage_texture.foliage_texture_id',
				"(select id from foliage_texture where lower(foliage_texture) = " . $this->db->escape($query_array['foliage_texture']) . ")", false);
		}
        
        if ($query_array['water']) {
            $this->db->where('plant_water.water_id', 
				"(select id from water where lower(water) = " . $this->db->escape($query_array['water']) . ")", false);
        }
        if ($query_array['soil']) {
            $this->db->where('plant_soil.soil_id', 
				"(select id from soil where lower(soil) = " . $this->db->escape($query_array['soil']) . ")", false);
        }
        if ($query_array['sun']) {
            $this->db->where('plant_sun.sun_id', 
				"(select id from sun where lower(sun) = " . $this->db->escape($query_array['sun']) . ")", false);
        }

		if ($query_array['plant_height_at_10']) {
			$this->db->where('plant_data.plant_height_at_10 <= ' . intval($query_array['plant_height_at_10']));
		}

		if ($query_array['plant_height_min']) {
			$this->db->where('plant_data.plant_height_at_10 >= ' . intval($query_array['plant_height_min']));
		}
                if ($query_array['plant_width_at_10']) {
			$this->db->where('plant_data.plant_width_at_10 <= ' . intval($query_array['plant_width_at_10']));
		}

		if ($query_array['plant_width_min']) {
			$this->db->where('plant_data.plant_width_at_10 >= ' . intval($query_array['plant_width_min']));
		}

        if ($query_array['flower_time']) {
            $this->db->where('lower(plant_data.flower_time)', $query_array['flower_time']);
        }
        if ($query_array['growth_habit']) {
            $this->db->where('lower(plant_data.growth_habit)', $query_array['growth_habit']);
        }
        if ($query_array['plant_type']) {
			if (is_array($query_array['plant_type'])) {
				
				$this->db->where_in('lower(plant_data.plant_type)', $query_array['plant_type']);
			} else {
            	$this->db->where('lower(plant_data.plant_type)', $query_array['plant_type']);
			}
        }
        if ($query_array['foliage_type']) {
			if (is_array($query_array['foliage_type'])) {
				$this->db->where_in('lower(plant_data.foliage_type)', $query_array['foliage_type']);
			} else {
            	$this->db->where('lower(plant_data.foliage_type)', $query_array['foliage_type']);
			}	
        }

        if ($query_array['gpp_year']) {
            $this->db->where('plant_data.gpp_year', $query_array['gpp_year']);
        }
        if ($query_array['theme']) {
            $this->db->where('plant_data.theme', $query_array['theme']);
        }
       if ($query_array['publish']) {
            $this->db->where('plant_data.publish', $query_array['publish']);
        }
        $data['rows'] = $this->db->distinct()->get()->result_array();
		$data['found'] = count($data['rows']);
        return $data;

   }
   
}