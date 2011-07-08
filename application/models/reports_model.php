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

    function get_shrubs_status(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"Shrubs - Vines")->get();
            $data['query'] = $query;
             return $data;
        }
      function get_shrubs_by_name(){
            $this->db->get('plant_data');
            $query2 = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('genus','asc')->where('committee',"Shrubs - Vines")->get();
            $data['query2'] = $query2;
             return $data;
        }
      function get_trees_status(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"Trees - Conifers")->get();
            $data['query'] = $query;
             return $data;
        }
      function get_trees_by_name(){
            $this->db->get('plant_data');
            $query2 = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('genus','asc')->where('committee',"Trees - Conifers")->get();
            $data['query2'] = $query2;
             return $data;
        }
       function get_perennials_status(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"Perennials - Bulbs")->get();
            $data['query'] = $query;
             return $data;
        }
      function get_perennials_by_name(){
            $this->db->get('plant_data');
            $query2 = $this->db->select('genus,cross_genus,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered,trademark,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('genus','asc')->where('committee',"Perennials - Bulbs")->get();
            $data['query2'] = $query2;
             return $data;
        }
}

/* End of file listnurseries_model.php */
/* Location: ./application/models/listnurseries_model.php */
