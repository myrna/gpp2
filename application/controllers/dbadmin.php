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

class Dbadmin extends Controller {

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
            'CrossGenus' => $this->input->post('CrossGenus'),
            'species' => $this->input->post('species'),
            'Subspecies' => $this->input->post('Subspecies'),
            'CrossSpecies' => $this->input->post('CrossSpecies'),
            'Variety' => $this->input->post('Variety'),
            'Cultivar' => $this->input->post('Cultivar'),
            'TradeName' => $this->input->post('TradeName'),
            'RegisteredName' => $this->input->post('RegisteredName'),
            'PlantGroup' => $this->input->post('PlantGroup'),
            'Synonym' => $this->input->post('Synonym'),
            'Origin' => $this->input->post('Origin'),
            'PlantType' => $this->input->post('PlantType'),
            'FoliageType' => $this->input->post('FoliageTypey'),
            'GrowthHabit' => $this->input->post('GrowthHabit'),
            'FoliageColor' => $this->input->post('FoliageColor'),
            'FlowerColor' => $this->input->post('FlowerColor'),
            'FlowerTime' => $this->input->post('FlowerTime'),
            'Sun' => $this->input->post('Sun'),
            'Soil' => $this->input->post('Soil'),
            'Water' => $this->input->post('Water'),
            'PlantWidth' => $this->input->post('PlantWidth'),
            'PlantHeight' => $this->input->post('PlantHeight'),
            'ZoneLow' => $this->input->post('ZoneLow'),
            'ZoneHigh' => $this->input->post('ZoneHigh'),
            'Culture' => $this->input->post('Culture'),
            'Qualities' => $this->input->post('Qualities'),
            'DesignUse' => $this->input->post('DesignUse'),
            'Wildlife' => $this->input->post('Wildlife'),
            'NominatedBy' => $this->input->post('NominatedBy'),
            'NominatedForYear' => $this->input->post('NominatedForYear'),
            'Status' => $this->input->post('Status'),
            'Year' => $this->input->post('Year'),
            'Theme' => $this->input->post('Theme'),
            'Publish' => $this->input->post('Publish'),
            'Tag' => $this->input->post('Tag'),

        );
        $this->db_model->add_record($plants);
        $this->index();  //send user back to plant records page
    }
   
 
 }

/* End of file dbadmin.php */
/* Location: ./application/controllers/dbadmin.php */