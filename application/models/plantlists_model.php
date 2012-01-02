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
        $data = array();
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
            $data['rows'] = $this->add_common_names($records);
        } else {
            $found = $this->db->select('COUNT(DISTINCT plant_data.id) as numrows')->from("(select * from plant_data where publish = 'Yes') as plant_data")->get()->result_array();
            $records = $this->db->select('plant_data.*')->from("(select * from plant_data where publish = 'Yes') as plant_data")->get()->result_array();
            
            $data['found'] = $found[0]['numrows'];
            $data['rows'] = $this->add_common_names($records);
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

        if ($query_array['common_name']) {
            $this->db->select('plant_id')->from('plant_common_name')->where('common_name', $query_array['common_name']);
            $a = $this->db->get()->result_array();
            foreach ($a as $plant) {
                $common_name_array[] = $plant['plant_id'];
            }
        }
        
        $this->db->select('plant_data.*')->from("(select * from plant_data where publish = 'yes') as plant_data");
        $this->db->join('plant_water', 'plant_water.plant_id = plant_data.id', 'left');
        $this->db->join('plant_soil', 'plant_soil.plant_id = plant_data.id', 'left');
        $this->db->join('plant_sun', 'plant_sun.plant_id = plant_data.id', 'left');            
        $this->db->join('plant_foliage_color', 'plant_foliage_color.plant_id = plant_data.id', 'left');
	    $this->db->join('plant_foliage_texture', 'plant_foliage_texture.plant_id = plant_data.id', 'left');
        $this->db->join('plant_flower_color', 'plant_flower_color.plant_id = plant_data.id', 'left');
        $this->db->join('plant_theme', 'plant_theme.plant_id = plant_data.id', 'left');
        $this->db->join('plant_design_use', 'plant_design_use.plant_id = plant_data.id', 'left');
        $this->db->join('plant_pest_resistance', 'plant_pest_resistance.plant_id = plant_data.id', 'left');
        $this->db->join('plant_common_name', 'plant_common_name.plant_id = plant_data.id', 'left');

        if ($common_name_array) {
            $this->db->where_in('plant_data.id', $common_name_array);
        }
        
        if ($query_array['foliage_color']) {
            $this->db->where('plant_foliage_color.foliage_color_id', 
				"(select id from foliage_color where lower(foliage_color) = " . $this->db->escape($query_array['foliage_color']) . ")", false);
        }
         if ($query_array['flower_color']) {
            $this->db->where('plant_flower_color.flower_color_id',
				"(select id from flower_color where lower(flower_color) = " . $this->db->escape($query_array['flower_color']) . ")", false);
        }
         if ($query_array['design_use']) {
            $this->db->where('plant_design_use.design_use_id',
				"(select id from design_use where lower(design_use) = " . $this->db->escape($query_array['design_use']) . ")", false);
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
        
        if ($query_array['theme']) {
            $this->db->where('plant_theme.theme_id', 
				"(select id from theme where lower(theme) = " . $this->db->escape($query_array['theme']) . ")", false);
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

        if ($query_array['zone_low']) {
                $this->db->where('plant_data.zone_low >= ' . intval($query_array['zone_low']));
        }

        if ($query_array['zone_low_max']) {
                $this->db->where('plant_data.zone_low <= ' . intval($query_array['zone_low_max']));
        }

        if ($query_array['flower_time']) {
            $this->db->where('lower(plant_data.flower_time)', $query_array['flower_time']);
        }
        if ($query_array['growth_habit']) {
            $this->db->where('lower(plant_data.growth_habit)', $query_array['growth_habit']);
        }
        if ($query_array['pest_resistance']) {
            $this->db->where('plant_pest_resistance.pest_resistance_id',
				"(select id from pest_resistance where lower(pest_resistance) = " . $this->db->escape($query_array['pest_resistance']) . ")", false);
        }
        if ($query_array['plant_type']) {
			if (is_array($query_array['plant_type'])) {				
				$this->db->where_in('lower(plant_data.plant_type)', $query_array['plant_type']);
			} else {
            	$this->db->where('lower(plant_data.plant_type)', $query_array['plant_type']);
			}
        }
         if ($query_array['genus']) {
			if (is_array($query_array['genus'])) {
				$this->db->where_in('lower(plant_data.genus)', $query_array['genus']);
			} else {
            	$this->db->where('lower(plant_data.genus)', $query_array['genus']);
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
        
       if ($query_array['publish']) {
            $this->db->where('plant_data.publish', $query_array['publish']);
        }

        if ($query_array['committee']) {
            $this->db->where('plant_data.committee', $query_array['committee']);
        }

        $records = $this->db->distinct()->get()->result_array();
        $data['found'] = count($records);
        $data['rows'] = $this->add_common_names($records);
        return $data;
   }

   function add_common_names($collection) {
       function extract_name($record) {
           return $record['common_name'];
       }
  
       foreach($collection as $index => $plant) {
           $this->db->select('plant_common_name.common_name')->from('plant_common_name')->where('plant_id', $plant['id']);
           $common_names = $this->db->get()->result_array();
           $collection[$index]['common_names'] = array_map("extract_name", $common_names);
       }
       return $collection;
   }

}