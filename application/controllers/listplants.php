<?php

/**
 * listplants.php
 *
 * Show plant lists in sortable table, search for plants to display in table
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		mlo
 */

class Listplants extends Controller {

    function index($page = 0)
        {
            // Enable Profiler.
            //$this->output->enable_profiler(TRUE);
            $this->load->library('table');
            $this->load->model('crud_model');
            $records = $this->crud_model->get_records($page);

            if ($records['query']->num_rows() > 0)
            {
                $table = array();
                $table[] = array('Plant ID','Family','Genus','Cross Genus','Specific Epithet','Designator','Infraspecific Epithet',
                    'x Species','Group','Cultivar','Trade Name','PP#','PPAF','PBR','View','Edit','Add Image','Delete');
                foreach ($records['query']->result() as $row)
                {
                    $table[] = array($row->id,$row->family,$row->genus,$row->cross_genus,
                        $row->specific_epithet,$row->infraspecific_epithet_designator,$row->infraspecific_epithet,
                        $row->cross_species,$row->plantname_group,$row->cultivar,$row->trade_name,$row->plant_patent_number,$row->plant_patent_number_applied_for,
                        $row->plant_breeders_rights,
                        anchor('crud/view_record/'.$row->id, 'View'),
                        anchor('crud/edit_record/'.$row->id, 'Edit'), 
                        anchor('gallery/upload_image/'.$row->id, 'Upload Image'), 
                        anchor('crud/delete_record/'.$row->id, 'Delete',
                        array('onclick' => 'return confirm(\'Are you sure you want to delete the record?\');')));
                }
                $data['records'] = $table;
            }
            $data['heading'] = "GPP Database Administration";
            // initialize pagination
            $config = array();
            $config['base_url'] = site_url("crud/index");
            $config['total_rows'] = $records['total_rows'];
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $this->template->set('thispage','View Records');
            $this->template->set('title','View Records - Database Administration | Great Plant Picks');
            $this->template->load('template','admin/crud_view', $data);

        }   
    function display($query_id = 0, $sort_by = 'family', $sort_order = 'asc', $offset = 0)
         {
         // Enable Profiler.
        // $this->output->enable_profiler(TRUE);
               $limit = 20; // number of items to show per page

         $plants['fields'] = array(   // fields to show in table
            'id' => 'id',
            'family' => 'family',
            'genus' => 'genus',
            'specific_epithet' => 'specific_epithet',
            'cultivar' => 'cultivar',
             'plant_type' => 'plant_type',
            'plant_height_at_10' => 'plant_height_at_10'
        );

        $this->input->load_query($query_id);   // searchable fields

        $query_array = array(
            'family' => $this->input->get('family'),
            'genus' => $this->input->get('genus'),
            'specific_epithet' => $this->input->get('specific_epithet'),
            'cultivar' => $this->input->get('cultivar'),
            'plant_type' => $this->input->get('plant_type'),
            'height_comparison' => $this->input->get('height_comparison'),
            'plant_height_at_10' => $this->input->get('plant_height_at_10'),
        );

        //print_r($query_array); return;   // test query if bug

        $plants['query_id'] = $query_id;

        $this->load->model('listplants_model');

        $results = $this->listplants_model->search($query_array, $limit, $offset, $sort_by, $sort_order);
        $plants['plants'] = $results['rows'];
        $plants['num_results'] = $results['num_rows'];  // show number of query results

        // pagination
         // establish url sequence and allow pagination
        $config = array();
        $config['base_url'] = site_url("listplants/display/$query_id/$sort_by/$sort_order");
        $config['total_rows'] = $plants['num_results'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $plants['pagination'] = $this->pagination->create_links();
// test this when we have more records!
        $plants['sort_by'] = $sort_by;
	$plants['sort_order'] = $sort_order;

// choose plant based on type
        $plants['planttype_options'] = $this->listplants_model->planttype_options();  // load dropdown options

        $this->template->set('thispage','List Plants');
        $this->template->set('title','List Plants | Great Plant Picks');
        $this->template->load('template','list_plants', $plants);
        
    }

    function search() {   // searchable fields
         
        $query_array = array(
            'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'species' => $this->input->post('species'),
            'cultivar' => $this->input->post('cultivar'),
            'plant_type' => $this->input->post('plant_type'),
            'height_comparison' => $this->input->post('height_comparison'),
            'plant_height_at_10' => $this->input->post('plant_height_at_10'),
        );

        $query_id = $this->input->save_query($query_array);

        redirect("listplants/display/$query_id");   // query URL
       
    }
 }

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */