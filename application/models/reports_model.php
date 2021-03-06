<?php

/**
 * reports_model.php
 *
 * Administrative Committee Reports
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Reports_model extends CI_Model {

    function get_shrubs_status(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus,cross_genus,cross_specific_epithet,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered_name,trademark_name,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"shrubs - vines")->get();
            $data['query'] = $query;
             return $data;
        }
      function get_shrubs_by_name(){
            $this->db->get('plant_data');
            $query2 = $this->db->select('genus,cross_genus,cross_specific_epithet,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered_name,trademark_name,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('genus','asc')->where('committee',"shrubs - vines")->get();
            $data['query2'] = $query2;
             return $data;
        }
      function get_trees_status(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus,cross_genus,cross_specific_epithet,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered_name,trademark_name,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"trees - conifers")->get();
            $data['query'] = $query;
             return $data;
        }
      function get_trees_by_name(){
            $this->db->get('plant_data');
            $query2 = $this->db->select('genus,cross_genus,cross_specific_epithet,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered_name,trademark_name,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('genus','asc')->where('committee',"trees - conifers")->get();
            $data['query2'] = $query2;
             return $data;
        }
       function get_perennials_status(){
            $this->db->get('plant_data');
            $query = $this->db->select('genus,cross_genus,cross_specific_epithet,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered_name,trademark_name,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('status','asc')->order_by('genus','asc')->where('committee',"perennials - bulbs")->get();
            $data['query'] = $query;
             return $data;
        }
      function get_perennials_by_name(){
            $this->db->get('plant_data');
            $query2 = $this->db->select('genus,cross_genus,cross_specific_epithet,specific_epithet,infraspecific_epithet_designator,
                infraspecific_epithet,cross_species,cultivar,trade_name,registered_name,trademark_name,plant_patent_number,
                plant_patent_number_applied_for,plant_breeders_rights,plantname_group,nominator,status,committee,gpp_history')
                    ->from('plant_data')->
                    order_by('genus','asc')->where('committee',"perennials - bulbs")->get();
            $data['query2'] = $query2;
             return $data;
        }
}

/* End of file reports_model.php */
/* Location: ./application/models/reports_model.php */
