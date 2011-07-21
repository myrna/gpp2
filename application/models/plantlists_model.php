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

   function search($query_array, $limit, $offset, $sort_by, $sort_order) {

		// results query
             
               $q = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,infraspecific_epithet,
                   cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,plant_patent_number_applied_for,
                   plant_breeders_rights,plantname_group,plant_height_at_10,publish')
                        ->from('plant_data')
                        ->limit($limit, $offset)
			->order_by($sort_by, $sort_order);

		if (strlen($query_array['genus'])) {
			$q->like('genus', $query_array['genus']);
		}
		if (strlen($query_array['plant_type'])) {
			$q->where('plant_type', $query_array['plant_type']);
		}
		if (strlen($query_array['plant_height_at_10'])) {
			$operators = array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<');
			$operator = $operators[$query_array['height_comparison']];
						
			$q->where("plant_height_at_10 $operator", $query_array['plant_height_at_10']);
		}

               $ret['rows'] = $q->get()->result();

		// count query
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('plant_data')->where('publish',"Yes");

		if (strlen($query_array['genus'])) {
			$q->like('genus', $query_array['genus']);
		}
		if (strlen($query_array['plant_type'])) {
			$q->where('plant_type', $query_array['plant_typey']);
		}
		if (strlen($query_array['plant_height_at_10'])) {
			$operators = array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<');
			$operator = $operators[$query_array['height_comparison']];
						
			$q->where("plant_height_at_10 $operator", $query_array['plant_height_at_10']);
		}

                $tmp = $q->get()->result();

		$ret['num_rows'] = $tmp[0]->count;

		return $ret;
	}

}
