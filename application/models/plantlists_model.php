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

    // this seems overly complex, but now if we need to adjust what is in the botanical name frag,
    // we just add or subtract the fields from this array
    public function botanical_name_parts() {
        return array(
            "genus",
            "specific_epithet",
            "cultivar",
            "cross_species",
            "trade_name",
            "trademark_name",
            "registered_name",
            "family"
        );
    }

    public function consolidate_name_fields($name_parts) {
        $fields = array();
        foreach ($name_parts as $field) {
            $fields[] = "trim(".$field.") ";
        }
        return join($fields, ", ");
    }
    
    function where_fragment($query_parts, $field_name) {
        $a = array();
        foreach ($query_parts as $term) {
            $a[] = "($field_name like ? or $field_name like ?)";
        }
        return join($a, " and ");
    }
    
    function params($query_parts) {
        $a = array();
        foreach ($query_parts as $term) {
            $a[] = "$term%";
            $a[] = "% $term%";
        }
        return $a;
    }

    public function autocomplete_consolidate_botanical_name($name_parts) {
        return "(select distinct(lower(concat_ws(' ', " . $this->consolidate_name_fields($name_parts) . "))) as botanical_name from (select * from plant_data where publish = 'yes') as plant_data)";
    }

    public function consolidate_botanical_name($name_parts) {
        return "(select *,lower(concat_ws(' ', " . $this->consolidate_name_fields($name_parts) . ")) as botanical_name from (select * from plant_data where publish = 'yes') as plant_data)";
    }
        
    function basic_search($query) {
        // codeignitors activerecord is too dumb to use for these queries
        // so I build the sql by hand.
        // It might be better to use a regexp here, not sure performance wise how it will pan out.
        $data = array();
        $query_parts = explode(" ", $query);
        $name_parts = $this->botanical_name_parts();
        $params = $this->params($query_parts);

        $botanical_consolidated_fragment = $this->consolidate_botanical_name($name_parts);
        $botanical_where_fragment = $this->where_fragment($query_parts, 'botanical_name');
        $botanical_query = "select * from $botanical_consolidated_fragment as b where $botanical_where_fragment;";
        $q = $this->db->query($botanical_query, $params);
        $botanical_names = $q->result_array();
                
        $common_name_fragment = "select plant_data.*, plant_common_name.common_name as common_name from (select * from plant_data where publish = 'yes') as plant_data left join plant_common_name on plant_common_name.plant_id = plant_data.id";
        $common_name_where_fragment = $this->where_fragment($query_parts, 'common_name');

        // if we found something in the botanical search, don't find it again in the common name search.
        if (count($botanical_names) > 0) {
            $botanical_ids = array();
            foreach ($botanical_names as $botanical_name) {
                $botanical_ids[] = $botanical_name['id'];
            }
            $already_found = implode(", ", $botanical_ids);
            $q = $this->db->query("$common_name_fragment where $common_name_where_fragment and plant_data.id not in ($already_found);", $params);
        } else {
            $q = $this->db->query("$common_name_fragment where $common_name_where_fragment;", $params);
        }

        $common_names = $q->result_array();

        $found = array_merge($botanical_names, $common_names);
        sort($found);
        $data['rows'] = $this->add_common_names($found);
        $data['found'] = count($found);
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