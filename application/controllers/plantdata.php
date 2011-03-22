<?php

class Plantdata extends Controller {

    function Plantdata()
	{
		parent::Controller();
	}

    function index() {
    $data = array(
      'logged_in' => $this->ion_auth->logged_in()
        );
     $this->load->view('options_view', $data);
        $plants=array();
        
        if($query = $this->db_model->get_records())
        {
            $plants['records'] = $query;
        }
          }

    function create()
    {
        $plants = array(
            'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'species' => $this->input->post('species'),
            'PlantType' => $this->input->post('PlantType'),
        );
        $this->db_model->add_record($plants);
        $this->index();  //send user back to plant records page
    }
}

?>
