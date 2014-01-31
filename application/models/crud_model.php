<?php

/**
* crud_model.php
*
* Handle CRUD DB operations.
*
* @package		Great Plant Picks
* @subpackage	Models
* @category		Models
* @author		jg :)
*/

class Crud_model extends CI_Model {

    public function get_id($element) {
        $values = array_values($element);
        return intval($values[0]);
    }

    public $plant_link_tables = array(
        'water',
        'sun',
        'flower_color',
        'foliage_color',
        'foliage_texture',
        'flower_time',
        'design_use',
        'pest_resistance',
        'soil',
        'wildlife',
        'theme',
        'habit',
        'scent'
        );

    public function update_link_table($id, $primary, $attribute, $values) {
        $link_table_name = "$primary" . "_" . $attribute;
        $attribute_key = $attribute . "_id";
        $primary_key = $primary . "_id";
        if (empty($values)) {
            // if we got nothing checked, then just clear everything.
            $this->db->where($primary_key, $id)->delete($link_table_name);
        } else {
            // handle the  requirements linking tables
            // this is hacky and should be fixed eventually, but handling unsent checkboxes is always a clusterf.
            // first we go through and delete anything from the link table that was not sent in the post (i.e. not checked)
            $this->db->where($primary_key, $id);
            $this->db->where_not_in($attribute_key, $values);
            $this->db->delete($link_table_name);
            // now we go back through and make sure that the ones that were checked in the linking table.
            foreach ($values as $req) {
                $this->db->where( array($primary_key => $id, $attribute_key => $req ) );
                $query = $this->db->get($link_table_name);
                if ($query->num_rows() == 0) {
                    // if it doesn't exist, insert it.
                    $this->db->set($primary_key, $id);
                    $this->db->set($attribute_key, $req);
                    $this->db->insert($link_table_name);
                }
            }
        }
    }

    public function link_table($id, $attribute, $primary) {
        $join_table_name = $primary . "_" . $attribute;
        $list_table_name = $attribute;
        $list = $this->db->get($list_table_name)->result_array();

        if ($id) {
            $attribute_key = $attribute . "_id";
            $primary_key = $primary . "_id";
            $current = array_map("Crud_model::get_id", $this->db->where($primary_key, $id)->select($attribute_key)->get($join_table_name)->result_array());
        } else {
            $current = array();
        }
        $current_values = array();

        foreach ($current as $setting) {
            $a = $this->db->where('id',$setting)->select($attribute)->get($attribute)->result_array();
            $b = array_values($a[0]);
            $current_values[] = $b[0];
        }

        return array('list' => $list, 'current' => $current, 'values' => $current_values);
    }

    function add_record($data) {
        $result = 0;
        if(!empty($data)) {
            foreach ($this->plant_link_tables as $link_name) {
                if (array_key_exists($link_name, $data)) {
                    $$link_name = $data[$link_name];
                    unset($data[$link_name]);
                }
            }
            $this->db->insert('plant_data',$data);
            $id = $this->db->insert_id();

            foreach ($this->plant_link_tables as $linkname) {
                if (isset($$linkname)) {
                    $this->update_link_table($id, 'plant', $linkname, $$linkname);
                }
            }            
        }
        return $id;
    }

    function save_common_name($data) {
        if (!empty($data)) {
            unset($data['save_common_name']);
            $this->db->insert('plant_common_name', $data);
            return $data['plant_id'];
        }
    }

    function get_common_names($id) {
        $this->db->where('plant_id', $id);
        $query = $this->db->get('plant_common_name');
        return $query->result_array();
    }

    function delete_common_name($id) {
        $this->db->where('id', $id);
        $record = $this->db->get('plant_common_name')->result_array();
        $plant_id = $record[0]['plant_id'];

        $this->db->where('id', $id);
        $result = $this->db->delete('plant_common_name');
        return $plant_id;
    }

    function save_synonym($data) {
        if (!empty($data)) {
            unset($data['save_synonym']);
            $this->db->insert('plant_synonym', $data);
            return $data['synonym_id'];
        }
    }

    function get_synonyms($id) {
        $this->db->where('synonym_id', $id);
        $query = $this->db->get('plant_synonym');
        return $query->result_array();
    }

    function delete_synonym($id) {
        $this->db->where('id', $id);
        $record = $this->db->get('plant_synonym')->result_array();
        $plant_id = $record[0]['synonym_id'];

        $this->db->where('id', $id);
        $result = $this->db->delete('plant_synonym');
        return $plant_id;
    }

   function get_record($id) {
        if(!empty($id)) {
            
            $query = $this->db->where('id', $id);
            $query = $this->db->get('plant_data');
        }
        if ($query->num_rows() > 0) {
            return $row = $query->row();
        } else {
            $row = FALSE;
        }
        return $row;
    }

   function get_record_as_array($id)
    {
        if(!empty($id))
        {
           
            $query = $this->db->where('id', $id);

            $query = $this->db->get('plant_data');
            
        }
        if ($query->num_rows() > 0) {
            return $row = $query->result_array();
        }
        else
        {
            $row = FALSE;
        }
    }

    
    // Update existing record in DB table.

    function edit_record($data, $id)
    {
        $result = 0;
        if(!empty($data)){

            foreach ($this->plant_link_tables as $link_name) {
                if (array_key_exists($link_name, $data)) {
                    $this->update_link_table($id, 'plant', $link_name, $data[$link_name]);
                    unset($data[$link_name]);
                } else {
                    $this->update_link_table($id, 'plant', $link_name, array());
                }
            }
            $this->db->where('id', $id);
            $result = $this->db->update('plant_data', $data);
        }
        return $result;
    }

    //Delete specified records from the DB table.

    function delete_record($id) {
        $return = 0;   // result?
        if(!empty($id)) {
            $this->db->where('id', $id);
            $result = $this->db->delete('plant_data');
        }
        return $result;
    }

 //setting up admin query and reports function

  function admin_query($query_array, $limit, $offset, $sort_by, $sort_order) {
        foreach ($query_array as $attribute => $value) {
            if (!$value) {
                unset($query_array[$attribute]);
            } else {
                $query_array[$attribute] = strtolower($value);
            }
        }
/* working on adding common name to administrative query results but not functioning yet */
         if ($query_array['common_name']) {
            $this->db->select('plant_id')->from('plant_common_name')->where('common_name', $query_array['common_name']);
            $a = $this->db->get()->result_array();
            foreach ($a as $plant) {
                $common_name_array[] = $plant['plant_id'];
            }
        }
        
        $this->db->select('plant_data.*')->from("(select * from plant_data) as plant_data");

        $this->db->join('plant_water', 'plant_water.plant_id = plant_data.id', 'left');
        $this->db->join('plant_soil', 'plant_soil.plant_id = plant_data.id', 'left');
        $this->db->join('plant_sun', 'plant_sun.plant_id = plant_data.id', 'left');
        $this->db->join('plant_foliage_color', 'plant_foliage_color.plant_id = plant_data.id', 'left');
	$this->db->join('plant_foliage_texture', 'plant_foliage_texture.plant_id = plant_data.id', 'left');
        $this->db->join('plant_flower_color', 'plant_flower_color.plant_id = plant_data.id', 'left');
        $this->db->join('plant_flower_time', 'plant_flower_time.plant_id = plant_data.id', 'left');
        $this->db->join('plant_theme', 'plant_theme.plant_id = plant_data.id', 'left');
        $this->db->join('plant_design_use', 'plant_design_use.plant_id = plant_data.id', 'left');
        $this->db->join('plant_pest_resistance', 'plant_pest_resistance.plant_id = plant_data.id', 'left');
        $this->db->join('plant_wildlife', 'plant_wildlife.plant_id = plant_data.id', 'left');
        $this->db->join('plant_common_name', 'plant_common_name.plant_id = plant_data.id', 'left');
        $this->db->join('plant_habit', 'plant_habit.plant_id = plant_data.id', 'left');
        $this->db->join('plant_scent', 'plant_scent.plant_id = plant_data.id', 'left');

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
         if ($query_array['flower_time']) {
            $this->db->where('plant_flower_time.flower_time_id',
				"(select id from flower_time where lower(flower_time) = " . $this->db->escape($query_array['flower_time']) . ")", false);
        }
        if ($query_array['habit']) {
            $this->db->where('plant_habit.habit_id',
				"(select id from habit where lower(habit) = " . $this->db->escape($query_array['habit']) . ")", false);
        }
        if ($query_array['foliage_texture']) {
            $this->db->where('plant_foliage_texture.foliage_texture_id',
				"(select id from foliage_texture where lower(foliage_texture) = " . $this->db->escape($query_array['foliage_texture']) . ")", false);
		}
        if ($query_array['design_use']) {
            $this->db->where('plant_design_use.design_use_id',
				"(select id from design_use where lower(design_use) = " . $this->db->escape($query_array['design_use']) . ")", false);
        }
        if ($query_array['scent']) {
            $this->db->where('plant_scent.scent_id',
				"(select id from scent where lower(scent) = " . $this->db->escape($query_array['scent']) . ")", false);
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
         if ($query_array['wildlife']) {
            $this->db->where('plant_wildlife.wildlife_id',
				"(select id from wildlife where lower(wildlife) = " . $this->db->escape($query_array['wildlife']) . ")", false);
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

        /*if ($query_array['flower_time']) {
            $this->db->where('lower(plant_data.flower_time)', $query_array['flower_time']);
        }*/
        if ($query_array['growth_habit']) { //remove this when habit table info is filled
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
        if ($query_array['pest_resistance']) {
            $this->db->where('plant_pest_resistance.pest_resistance_id',
				"(select id from pest_resistance where lower(pest_resistance) = " . $this->db->escape($query_array['pest_resistance']) . ")", false);
        }
        if ($query_array['gpp_year']) {
            $this->db->where('plant_data.gpp_year', $query_array['gpp_year']);
        }
          if ($query_array['theme']) {
            $this->db->where('plant_theme.theme_id',
				"(select id from theme where lower(theme) = " . $this->db->escape($query_array['theme']) . ")", false);
        }
       if ($query_array['publish']) {
            $this->db->where('plant_data.publish', $query_array['publish']);
        }
         if ($query_array['committee']) {
            $this->db->where('plant_data.committee', $query_array['committee']);
        }
       $found = $this->db->distinct()->get()->result_array();
            return $found;

   }
}

/* End of file crud_model.php */
/* Location: ./application/models/crud_model.php */
