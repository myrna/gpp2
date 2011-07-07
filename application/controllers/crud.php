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

class Crud extends CI_Controller
{
    
    function add_record()
    {
        // Enable Profiler.
       // $this->output->enable_profiler(TRUE);
        $this->load->model('crud_model');
		$id = "";
        $data['row'] = array();
        $fields = $this->db->list_fields('plant_data');
        foreach ($fields as $field) {
            $data['row'][$field] = "";
        }

        // $water = $this->crud_model->link_table($id, 'water', 'plant');
        //        $data['water_fields'] = $water['list'];
        // 
        //        $sun = $this->crud_model->link_table($id, 'sun', 'plant');
        //        $data['sun_fields'] = $sun['list'];
        // 
        //        $soil = $this->crud_model->link_table($id, 'soil', 'plant');
        //        $data['soil_fields'] = $soil['list'];
        // 
        //        $wildlife = $this->crud_model->link_table($id, 'wildlife', 'plant');
        //        $data['wildlife_fields'] = $wildlife['list'];
        // 
        //        $pest_resistance = $this->crud_model->link_table($id, 'pest_resistance', 'plant');
        //        $data['pest_resistance_fields'] = $pest_resistance['list'];
        // 
        //        $flower_color = $this->crud_model->link_table($id, 'flower_color', 'plant');
        //        $data['flower_color_fields'] = $flower_color['list'];
        // 
        //        $design_use = $this->crud_model->link_table($id, 'design_use', 'plant');
        //        $data['design_use_fields'] = $design_use['list'];

        $data['plant_attributes'] = $this->get_plant_link_data(false);

        $this->template->set('thispage','Add New Record');
        $this->template->set('title','Add New Record - Database Administration | Great Plant Picks');
        $this->template->load('template','admin/new', $data);
         }
         
    function add() {
        $this->load->model('crud_model');
        $data = $_POST;
		echo "<pre>" . print_r($data) . "</pre>";
		

        unset($data['add']); // get rid of the submit button

        $id = $this->crud_model->add_record($data);
        if($id)
        {
            $this->session->set_flashdata('status', "Record Added: $id");
        }
        else
        {
            $this->session->set_flashdata('status', 'Record Addition Unsuccessful, Please Try Again');
        }
        redirect("crud/add_record",'refresh');
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
       // $this->output->enable_profiler(TRUE);
        $this->load->model('crud_model');
        $this->load->model('gallery_model');
        $this->load->helper('image');
        $this->load->helper('html');
                      
        $data['title'] = "Edit Record: ";
       
        $data['images'] = $this->gallery_model->get_images($id); //get image thumbnail(s) and display

        $data['plant_attributes'] = $this->get_plant_link_data($id);

        $row = $this->crud_model->get_record_as_array($id);
        $data['row'] = $row[0];
        $this->template->set('thispage','Edit Record');
        $this->template->set('title','Edit Record - Database Administration | Great Plant Picks');
        $this->template->load('template','admin/edit', $data);
    }

    function get_plant_link_data($id) {
        $data = array();
        $water = $this->crud_model->link_table($id, 'water', 'plant');
        $data['water']['fields'] = $water['list'];
        $data['water']['requirements'] = $water['current'];
        
        $sun = $this->crud_model->link_table($id, 'sun', 'plant');
        $data['sun']['fields'] = $sun['list'];
        $data['sun']['requirements'] = $sun['current'];

        $soil = $this->crud_model->link_table($id, 'soil', 'plant');
        $data['soil']['fields'] = $soil['list'];
        $data['soil']['requirements'] = $soil['current'];
        
        $wildlife = $this->crud_model->link_table($id, 'wildlife', 'plant');
        $data['wildlife']['fields'] = $wildlife['list'];
        $data['wildlife']['requirements'] = $wildlife['current'];
        
        $pest_resistance = $this->crud_model->link_table($id, 'pest_resistance', 'plant');
        $data['pest_resistance']['fields'] = $pest_resistance['list'];
        $data['pest_resistance']['requirements'] = $pest_resistance['current'];

        $flower_color = $this->crud_model->link_table($id, 'flower_color', 'plant');
        $data['flower_color']['fields'] = $flower_color['list'];
        $data['flower_color']['requirements'] = $flower_color['current'];

     //  $foliage_color = $this->crud_model->link_table($id, 'foliage_color', 'plant');
      //  $data['foliage_color']['fields'] = $foliage_color_color['list'];
     //   $data['foliage_color']['requirements'] = $foliage_color['current'];

        $design_use = $this->crud_model->link_table($id, 'design_use', 'plant');
        $data['design_use']['fields'] = $design_use['list'];
        $data['design_use']['requirements'] = $design_use['current'];
        
        return $data;
    }

    function edit()
    {
        $this->output->enable_profiler(TRUE);
        $this->load->model('crud_model');
        $this->load->model('gallery_model');
        $this->load->helper('image');
        $this->load->helper('html');
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
		$id = $data['id'];
        redirect("crud/edit_record/$id",'refresh');
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
        redirect('listplants');
    }
}





/* End of file crud.php */
/* Location: ./application/controllers/crud.php */
