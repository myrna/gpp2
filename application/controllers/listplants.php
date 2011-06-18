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
        $this->load->model('listplants_model');
        $records = $this->listplants_model->get_records($page);        
        $this->show_plants($page, $records);

    }
    function search($page = 0) {
        $this->load->model('listplants_model');
        $matchwords = explode(" ", $this->input->post('searchterms'));
        $matchfields = array('genus', 'specific_epithet', 'family');
        foreach ($matchfields as $field) {
            foreach ($matchwords as $match) {
                $this->db->or_like($field, $match);
            }
        }
        $records = $this->listplants_model->get_records($page);
        $this->show_plants($page, $records, $this->input->post('searchterms'));
    }
    
    function show_plants($page, $records, $query = "") {
         // Enable Profiler.
            //$this->output->enable_profiler(TRUE);
            $this->load->library('table');

            if ($records['query']->num_rows() > 0)
            {
                $table = array();
                $table[] = array(
                    'Plant ID',
                    'Family',
                    'Genus',
                    'Cross Genus',
                    'Specific Epithet',
                    'Designator',
                    'Infraspecific Epithet',
                    'x Species',
                    'Group',
                    'Cultivar',
                    'Trade Name',
                    'PP#',
                    'PPAF',
                    'PBR',
                    'View',
                    'Edit',
                    'Add Image',
                    'Delete'
                );
                foreach ($records['query']->result() as $row)
                {
                    $table[] = array(
                        $row->id,
                        $row->family,
                        $row->genus,
                        $row->cross_genus,
                        $row->specific_epithet,
                        $row->infraspecific_epithet_designator,
                        $row->infraspecific_epithet,
                        $row->cross_species,
                        $row->plantname_group,
                        $row->cultivar,
                        $row->trade_name,
                        $row->plant_patent_number,
                        $row->plant_patent_number_applied_for,
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
            $data['searchterms'] = $query;
            // initialize pagination
            $config = array();
            $config['base_url'] = site_url("listplants/index");
            $config['total_rows'] = $records['total_rows'];
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $this->template->set('thispage','View Records');
            $this->template->set('title','View Records - Database Administration | Great Plant Picks');
            $this->template->load('template','list_plants', $data);
    }
 }

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */