<?php

/**
 * dbadmin.php
 *
 * Database Administration (create new record)
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		mlo
 */

class Dbadmin extends CI_Controller {

     function index() {
   // login function //
   //     $data = array(
   //   'logged_in' => $this->ion_auth->logged_in()
   //     );
   //  $this->load->view('options_view', $data);

   //CRUD functions //
        
		$plants = array();

		if($query = $this->db_model->get_records())
		{
			$plants['records'] = $query;
		}

		$this->load->view('dbadmin_view', $plants);
	}

    function create()
    {
        $plants = array(
            'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'cross_genus' => $this->input->post('cross_genus'),
            'species' => $this->input->post('species'),
            'subspecies' => $this->input->post('subspecies'),
            'cross_species' => $this->input->post('cross_species'),
            'variety' => $this->input->post('variety'),
            'cultivar' => $this->input->post('cultivar'),
            'trade_name' => $this->input->post('trade_name'),
            'registered_name' => $this->input->post('registered_name'),
            'plant_patent_number' => $this->input->post('plant_patent_number'),
            'plant_breeders_rights' => $this->input->post('plant_breeders_rights'),
            'plantname_group' => $this->input->post('plantname_group'),
            'synonym' => $this->input->post('synonym'),
            'plant_origin' => $this->input->post('plant_origin'),
            'plant_type' => $this->input->post('plant_type'),
            'foliage_type' => $this->input->post('foliage_type'),
            'growth_habit' => $this->input->post('growth_habit'),
            'foliage_color' => $this->input->post('foliage_color'),
            'flower_color' => $this->input->post('flower_color'),
            'flower_time' => $this->input->post('flower_time'),
            'sun' => $this->input->post('sun'),
            'soil' => $this->input->post('soil'),
            'water' => $this->input->post('water'),
            'plant_width' => $this->input->post('plant_width'),
            'plant_height' => $this->input->post('plant_height'),
            'zone_low' => $this->input->post('zone_low'),
            'zone_high' => $this->input->post('zone_high'),
            'culture_notes' => $this->input->post('culture_notes'),
            'qualities' => $this->input->post('qualities'),
            'design_use' => $this->input->post('design_use'),
            'wildlife' => $this->input->post('wildlife'),
            'nominator' => $this->input->post('nominator'),
            'committee' => $this->input->post('committee'),
            'advisory_group' => $this->input->post('advisory_group'),
            'eval_trial' => $this->input->post('eval_trial'),
            'verify_name' => $this->input->post('verify_name'),
            'status' => $this->input->post('status'),
            'gpp_history' => $this->input->post('gpp_history'),
            'gpp_year' => $this->input->post('gpp_year'),
            'theme' => $this->input->post('theme'),
            'geek_notes' => $this->input->post('geek_notes'),
            'publish' => $this->input->post('publish'),
            'sort' => $this->input->post('sort'),

        );
        $this->db_model->add_record($plants);
        $this->index();  //send user back to plant records page
    }
   
 
 }

/* End of file dbadmin.php */
/* Location: ./application/controllers/dbadmin.php */