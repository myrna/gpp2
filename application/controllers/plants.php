<?php
class Plants extends Controller {
    function display($query_id = 0, $sort_by = 'family', $sort_order = 'asc', $offset = 0)
         {

        $limit = 20;

         $plants['fields'] = array(
            'PlantID' => 'Plant ID',
            'family' => 'Family',
            'genus' => 'Genus',
            'species' => 'Species',
            'cultivar' => 'Cultivar',
             'PlantType' => 'PlantType',
            'PlantHeight' => 'Plant Height'
        );

        $this->input->load_query($query_id);

        $query_array = array(
            'family' => $this->input->get('family'),
            'genus' => $this->input->get('genus'),
            'species' => $this->input->get('species'),
            'cultivar' => $this->input->get('cultivar'),
            'PlantType' => $this->input->get('PlantType'),
            'height_comparison' => $this->input->get('height_comparison'),
            'PlantHeight' => $this->input->get('PlantHeight'),
        );

        $plants['query_id'] = $query_id;

        $this->load->model('list_model');

        $results = $this->list_model->search($query_array, $limit, $offset, $sort_by, $sort_order);
        $plants['plants'] = $results['rows'];
        $plants['num_results'] = $results['num_rows'];

        // pagination
        $config = array();
        $config['base_url'] = site_url("plants/display/$query_id/$sort_by/$sort_order");
        $config['total_rows'] = $plants['num_results'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $plants['pagination'] = $this->pagination->create_links();
// test this when we have more records!
        $plants['sort_by'] = $sort_by;
	$plants['sort_order'] = $sort_order;

// choose plant based on type
        $plants['planttype_options'] = $this->list_model->planttype_options();

        $this->load->view('list_plants', $plants);
    }

    function search() {
        $query_array = array(
            'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'species' => $this->input->post('species'),
            'cultivar' => $this->input->post('cultivar'),
            'PlantType' => $this->input->post('PlantType'),
            'height_comparison' => $this->input->post('height_comparison'),
            'PlantHeight' => $this->input->post('PlantHeight'),
        );

        $query_id = $this->input->save_query($query_array);

        redirect("plants/display/$query_id");
    }
}
?>
