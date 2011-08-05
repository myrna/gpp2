<?php

/**
* crud.php
*
* Create, Read, Update, Delete Records
*
* @package		Great Plant Picks
* @subpackage	Controllers
* @category		Controllers
*/

class Crud extends CI_Controller
{
    
   function add_record()
    {
       // $this->output->enable_profiler(TRUE);
       if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );
             
        $this->load->model('crud_model');
		$id = "";
        $data['row'] = array();
        $fields = $this->db->list_fields('plant_data');
        foreach ($fields as $field) {
            $data['row'][$field] = "";
        }

        $data['plant_attributes'] = $this->get_plant_link_data(false);

        $this->template->set('thispage','Add New Record');
        $this->template->set('title','Add New Record - Database Administration | Great Plant Picks');
        $this->template->load('admin_template','admin/new', $data);
         }
    }
    function add() {
        $this->load->model('crud_model');
        $data = $_POST;

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
        redirect("crud/edit_record/$id",'refresh');
    }
    
    function synonym($id) {
        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );
        $this->load->model('crud_model');

        $record = $this->crud_model->get_record_as_array($id);
        $fields = array(
            'family',
            'family_common_name',
            'genus',
            'cross_genus',
            'specific_epithet',
            'infraspecific_epithet_designator',
            'infraspecific_epithet',            
            'cross_species',
            'cultivar',
            'trade_name',
            'registered_name'
        );
        
        foreach ($fields as $field) {
            $data['row'][$field] = $record[0][$field];
        }
        $data['synonym_id'] = $id;
        $this->template->set('thispage', 'Add Synonym');
        $this->template->set('title', 'Add Synonym - Database Administration | Great Plant Picks');
        $this->template->load('admin_template', 'admin/synonym', $data);

          }
    }
    
    function common_name($id) {
        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );

        $this->load->model('crud_model');
        
        $record = $this->crud_model->get_record_as_array($id);
        $data['row']['common_name'] = "";
        $data['plant_data'] = $record[0];
        $data['plant_id'] = $record[0]['id'];
        $this->template->set('thispage', 'Add Common Name');
        $this->template->set('title', 'Add Common Name - Database Administration | Great Plant Picks');
        $this->template->load('admin_template', 'admin/common_name', $data);
          }
    }
    function save_common_name() {
        $this->load->model('crud_model');
        $id = $this->crud_model->save_common_name($_POST);
        $this->session->set_flashdata('status', "Common Name Added");
        redirect("crud/edit_record/$id", "refresh");
    }
    
    function delete_common_name($id) {
        $this->load->model('crud_model');
        $plant_id = $this->crud_model->delete_common_name($id);
        $this->session->set_flashdata('status', 'Common Name Deleted');
        redirect("crud/edit_record/$plant_id", "refresh");
    }
    
    function save_synonym() {
        $this->load->model('crud_model');
        $id = $this->crud_model->save_synonym($_POST);
        $this->session->set_flashdata('status', "Synonym Added");
        redirect("crud/edit_record/$id", "refresh");
    }
    
    function delete_synonym($id) {
        $this->load->model('crud_model');
        $plant_id = $this->crud_model->delete_synonym($id);
        $this->session->set_flashdata('status', 'Synonym Deleted');
        redirect("crud/edit_record/$plant_id", "refresh");
    }

    function edit_record($id = '') {
       //$this->output->enable_profiler(TRUE);
        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );

        $this->load->model('crud_model');
        $this->load->model('gallery_model');
        $this->load->helper('image');
        $this->load->helper('html');
                      
        $data['title'] = "Edit Record: ";
       
        $data['images'] = $this->gallery_model->get_images($id); //get image thumbnail(s) and display
        $data['synonyms'] = $this->crud_model->get_synonyms($id);
        $data['common_names'] = $this->crud_model->get_common_names($id);
        $data['plant_attributes'] = $this->get_plant_link_data($id);

        $row = $this->crud_model->get_record_as_array($id);
        $data['row'] = $row[0];
        $data['id'] = $data['row']['id'];
        $this->template->set('thispage','Edit Record');
        $this->template->set('title','Edit Record - Database Administration | Great Plant Picks');
        $this->template->load('admin_template','admin/edit', $data);
          }
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

        $foliage_color = $this->crud_model->link_table($id, 'foliage_color', 'plant');
        $data['foliage_color']['fields'] = $foliage_color['list'];
        $data['foliage_color']['requirements'] = $foliage_color['current'];

        $foliage_texture = $this->crud_model->link_table($id, 'foliage_texture', 'plant');
        $data['foliage_texture']['fields'] = $foliage_texture['list'];
        $data['foliage_texture']['requirements'] = $foliage_texture['current'];
         
        $design_use = $this->crud_model->link_table($id, 'design_use', 'plant');
        $data['design_use']['fields'] = $design_use['list'];
        $data['design_use']['requirements'] = $design_use['current'];
        
        return $data;
    }

    function edit()
    {
        //$this->output->enable_profiler(TRUE);
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
