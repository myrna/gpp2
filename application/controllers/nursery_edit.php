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

class Nursery_edit extends CI_Controller
{
    
      function setup_search_query($terms) {
        $matchwords = explode(" ", $terms);
        $matchfields = array('nursery_name');
        foreach ($matchfields as $field) {
            foreach ($matchwords as $match) {
                $this->db->or_like($field, $match);
            }
        }
    }

    function search() {
        if ($this->input->post('searchterms')) {
            $this->session->set_userdata('nursery_search', $this->input->post('searchterms'));
        }

        $query = $this->session->userdata('nursery_search');

        $this->load->model('nurserylist_model');
        $this->setup_search_query($this->session->userdata('nursery_search'));
        $total = $this->db->count_all_results('nursery_directory');
        $this->setup_search_query($this->session->userdata('nursery_search'));
        $records = $this->listplants_model->get_records();
        $path = "nursery_edit/search";
        $this->show_nurseries($records, $total, $path, $query);
    }

    function new_record()
    {
        $this->template->set('thispage','Add New Record');
        $this->template->set('title','Add New Record - Nursery Directory | Great Plant Picks');
        $this->template->load('template','nursery/new');
    }

    function add()
    {
        // Enable Profiler.
        // $this->output->enable_profiler(TRUE);
        $this->load->model('nurserylist_model');
        // still need to add checkbox handling
        $data = $_POST;
        unset($data['add']);
        $records = $this->nurserylist_model->add_record($data);

        if($records)
        {
            $this->session->set_flashdata('status', '<p>Nursery has been successfully added</p>');
        }
        else
        {
            $this->session->set_flashdata('status', '<p>Nursery not added, please try again</p>');
        }
        redirect('nursery_edit', 'refresh');
    }

    function view_record($id = ''){
        // Enable Profiler.
        //$this->output->enable_profiler(TRUE);
        $this->load->model('nurserylist_model');

        $record = $this->nurserylist_model->get_record_as_array($id);

        $data['title'] = "View Nursery: ";
        //Returned data will be put into the $row variable that will be send to the view.
        $data['row'] = $record[0];

        $this->template->set('thispage','View Single Nursery');
        $this->template->set('title','View Single Nursery - Nursery Directory | Great Plant Picks');
        $this->template->load('template','nursery_edit/view', $data);

    }

    function edit_record($id = '') {
        // Enable Profiler.
        $this->output->enable_profiler(TRUE);
        $this->load->model('nurserylist_model');

        $row = $this->nurserylist_model->get_record_as_array($id);
        $data['row'] = $row[0];
        $this->template->set('thispage','Edit Record');
        $this->template->set('title','Edit Nursery - Nursery Directory | Great Plant Picks');
        $this->template->load('template','nursery/edit', $data);
    }

    function edit()
    {
        $this->load->model('nurserylist_model');
        $data = $_POST;


        unset($data['edit']); // get rid of the submit button
        $records = $this->nurserylist_model->edit_record($data, $_POST['id']);
        if($records)
        {
            $this->session->set_flashdata('status', 'Nursery Updated');
        }
        else
        {
            $this->session->set_flashdata('status', 'Nursery Update Unsuccessful, Please Try Again');
        }
		$id = $data['id'];
        redirect("nursery/edit_record/$id",'refresh');
    }



    function delete_record($id = '')
    {
        $this->load->model('nurserylist_model');
        $records = $this->nurserylist_model->delete_record($id);
        if($records)
        {
            $this->session->set_flashdata('status', 'Nursery Has Been Deleted');
        }
        else
        {
            $this->session->set_flashdata('status', 'Nursery Has Not Been Deleted, Please Try Again');
        }
        redirect('nursery/edit_record');
    }

}




/* End of file crud.php */
/* Location: ./application/controllers/crud.php */
