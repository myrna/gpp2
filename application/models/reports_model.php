<?php

/**
 * listnurseries_model.php
 *
 * Connects with nursery_directory table to display nursery lists grouped by state/province
 * and sorted by nursery name ascending
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Reports_model extends CI_Model {

    function get_shrubs_report(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus','cross_genus','specific_epithet','infraspecific epithet designator',
                    'infraspecific epithet','cross_species','cultivar','trade_name','registered','trademark',
                    'plant_patent_number','plant_patent_number_applied_for','plant_breeders_rights','plantname_group',
                    'gpp_history','nominator')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"Shrubs - Vines")->get();
             $data['query'] = $query;
             return $data;
        }
}

/* End of file listnurseries_model.php */
/* Location: ./application/models/listnurseries_model.php */
