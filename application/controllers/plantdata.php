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
    function update() {
    $plantid = $this->uri->segment(3);

    if ($this->input->post('submit')) {
        $family = $this->input->xss_clean($this->input->post('family'));
        $genus = $this->input->xss_clean($this->input->post('genus'));
        $species = $this->input->xss_clean($this->input->post('species'));
        $PlantType = $this->input->xss_clean($this->input->post('PlantType'));
        $this->db_model->updatePost($PlantID, $genus, $species, $PlantType);

        $plants['plantdata'] = $this->db_model->getPlantdata();
        $this->load->view('update_db', $plants);
    } else {
        $plants = array('PlantID' => $PlantID);
        $this->load->view('update_db', $plants);
    }
}
 
 }

?>
