<?php

/**
* crud.php
*
* Create, Read, Update, Delete Records
*
* @package		Great Plant Picks
* @subpackage	Controllers
* @category		Controllers
* @author		mlo
*/

class Crud extends Controller
{
    function Crud()
    {
        parent::Controller();
        $this->load->helper('plant_helper');
        //$this->output->enable_profiler(TRUE);

    }
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
                    anchor('crud/edit_record/'.$row->id, 'Edit'), anchor('crud/add_image/'.$row->id, 'Upload Image'), anchor('crud/delete_record/'.$row->id, 'Delete',
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
    function new_record()
    {
        $this->template->set('thispage','Add New Record');
        $this->template->set('title','Add New Record - Database Administration | Great Plant Picks');
        $this->template->load('template','admin/new');

    }

    function add()
    {
        // Enable Profiler.
        // $this->output->enable_profiler(TRUE);
        $this->load->model('crud_model');
        // still need to add checkbox handling
        $data = $_POST;
        unset($data['add']);
        $records = $this->crud_model->add_record($data);

        if($records)
        {
            $this->session->set_flashdata('status', '<p>Record has been successfully added</p>');
        }
        else
        {
            $this->session->set_flashdata('status', '<p>Record not added, please try again</p>');
        }
        redirect('crud', 'refresh');
    }

    function view_record($id = ''){
        // Enable Profiler.
        //$this->output->enable_profiler(TRUE);
        $this->load->model('crud_model');

        $record = $this->crud_model->get_record_as_array($id);

        $data['title'] = "View Record: ";
        //Returned data will be put into the $row variable that will be send to the view.
        $data['row'] = $record[0];

        $this->template->set('thispage','View Single Record');
        $this->template->set('title','View Single Record - Database Administration | Great Plant Picks');
        $this->template->load('template','admin/view', $data);

    }

    function edit_record($id = '') {
        // Enable Profiler.
        $this->output->enable_profiler(TRUE);
        $this->load->model('crud_model');

        $data['title'] = "Edit Record: ";
        $water = $this->crud_model->link_table($id, 'water');
        $data['water_fields'] = $water['list'];
        $data['water_requirements'] = $water['current'];
        
        $sun = $this->crud_model->link_table($id, 'sun');
        $data['sun_fields'] = $sun['list'];
        $data['sun_requirements'] = $sun['current'];

        $soil = $this->crud_model->link_table($id, 'soil');
        $data['soil_fields'] = $soil['list'];
        $data['soil_requirements'] = $soil['current'];
        
        $wildlife = $this->crud_model->link_table($id, 'wildlife');
        $data['wildlife_fields'] = $wildlife['list'];
        $data['wildlife_requirements'] = $wildlife['current'];
        
        $pest_resistance = $this->crud_model->link_table($id, 'pest_resistance');
        $data['pest_resistance_fields'] = $pest_resistance['list'];
        $data['pest_resistance_requirements'] = $pest_resistance['current'];

        $flower_color = $this->crud_model->link_table($id, 'flower_color');
        $data['flower_color_fields'] = $flower_color['list'];
        $data['flower_color_requirements'] = $flower_color['current'];

        $design_use = $this->crud_model->link_table($id, 'design_use');
        $data['design_use_fields'] = $design_use['list'];
        $data['design_use_requirements'] = $design_use['current'];

        $row = $this->crud_model->get_record_as_array($id);
        $data['row'] = $row[0];
        $this->template->set('thispage','Edit Record');
        $this->template->set('title','Edit Record - Database Administration | Great Plant Picks');
        $this->template->load('template','admin/edit', $data);
    }

    function edit()
    {
        $this->load->model('crud_model');

        $link_tables = array('water', 'soil', 'sun', 'wildlife', 'pest_resistance', 'flower_color', 'design_use');
        foreach ($link_tables as $linker) {
            $this->_update_link_table($this->input->post('id'), $linker, $this->input->post($linker));                
        }
        $data = $_POST;
        unset($data['edit']); // get rid of the submit button
        $records = $this->crud_model->edit_record($data, $_POST['id']);
        if($records)
        {
            $this->session->set_flashdata('status', 'Record Updated');
        }
        else
        {
            $this->session->set_flashdata('status', 'Record Update Unsuccessful, Please Try Again');
        }
        redirect('crud','refresh');
    }

    function add_image($id = ''){
        $this->load->model('crud_model');

        $record = $this->crud_model->get_record($id);

        $data['title'] = "Upload Image: ";

        $data['id'] = $record->id;

        $this->template->set('thispage','Upload Image');
        $this->template->set('title','Upload Image - Database Administration | Great Plant Picks');
        $this->template->load('template','gallery', $data);

    }

    function delete_record($id = '')
    {
        $this->load->model('crud_model');
        $records = $this->crud_model->delete_record($id);
        if($records)
        {
            $this->session->set_flashdata('status', 'Record Has Been Deleted');
        }
        else
        {
            $this->session->set_flashdata('status', 'Record Has Not Been Deleted, Please Try Again');
        }
        redirect('crud', 'refresh');
    }

    function _update_link_table($id, $root, $values) {
        $link_table_name = "plant_" . $root;
        $key_name = $root . "_id";
        if (empty($values)) {
            // if we got nothing checked, then just clear everything.
            $this->db->where('plant_id', $id)->delete($link_table_name);
        } else {
            // handle the  requirements linking tables
            // this is hacky and should be fixed eventually, but handling unsent checkboxes is always a clusterf.
            // first we go through and delete anything from the link table that was not sent in the post (i.e. not checked)
            $this->db->where('plant_id', $id);
            $this->db->where_not_in($key_name, $values);
            $this->db->delete($link_table_name);
            // now we go back through and make sure that the ones that were checked in the linking table.
            foreach ($values as $req) {
                $this->db->where( array('plant_id' => $id, $key_name => $req ) );
                $query = $this->db->get($link_table_name);
                if ($query->num_rows() == 0) {
                    // if it doesn't exist, insert it.
                    $this->db->set('plant_id', $id);
                    $this->db->set($key_name, $req);
                    $this->db->insert($link_table_name);
                }

            }
        }
    }

}




/* End of file crud.php */
/* Location: ./application/controllers/crud.php */
