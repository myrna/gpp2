<?php

/**
* nurseries.php
*
* ADMIN: Create, Update, Delete Nursery Records
*
* @package		Great Plant Picks
* @subpackage	Controllers
* @category		Controllers
* @author		mlo
*/

class Nurseries extends CI_Controller
{
    
    function view($id = ''){
         // Enable Profiler.
   $this->output->enable_profiler(TRUE);
        $this->load->library('table');
     $tmpl = array (
                    'table_open'          => '<table class="nursery">',
                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',
                    'row_alt_start'       => '<tr class="alternate">',
                    'table_close'         => '</table>'
              );

            $this->table->set_template($tmpl);
     $this->load->model('nurseries_model');
     $nurseries = $this->nurseries_model->get_nurseries();

     if ($nurseries['query']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('ID','Nursery Name','Location','Edit/View','Delete');

         foreach ($nurseries['query']->result() as $row)
         {
             
             $table[] = array($row->id,$row->nursery_name,$row->location,
             anchor('nurseries/edit_nursery/',$row->id, 'Edit/View'),
                        anchor('nurseries/delete/'.$id, 'Delete',
                        array('onclick' => 'return confirm(\'Are you sure you want to delete this record?\');')));

         }
         $data['nurseries'] = $table;
         }
        $this->template->set('thispage','Edit Nurseries');
        $this->template->set('title','Edit Nurseries | Great Plant Picks');
        $this->template->load('admin_template','nurseries/view', $data);
    }

    function add_new()
    {
        $this->template->set('thispage','Edit Nurseries');
        $this->template->set('title','Edit Nurseries | Great Plant Picks');
        $this->template->load('admin_template','nurseries/new');
        }
    function add()
    {
        $this->load->model('nurseries_model');
        $data = array(
            'nursery_name' => $this->input->post('nursery_name'),
            'street_address' => $this->input->post('street_address'),
            'city' => $this->input->post('city'),
            'state_province' => $this->input->post('state_province'),
            'zip_postal_code' => $this->input->post('zip_postal_code'),
            'phone_area_code' => $this->input->post('phone_area_code'),
            'phone_prefix' => $this->input->post('phone_prefix'),
            'phone_number' => $this->input->post('phone_number'),
            'website_url' => $this->input->post('website_url'),
            'retail' => $this->input->post('retail'),
            'wholesale' => $this->input->post('wholesale'),
            'contact_name' => $this->input->post('contact_name'),
            'contact_phone' => $this->input->post('contact_phone'),
            'contact_email' => $this->input->post('contact_email'),
            'publish' => $this->input->post('publish'),
        );
        $this->nurseries_model->add_nursery($data);
        
        redirect("nurseries/add_new",'refresh');
       
    }
        function edit_nursery($id = '')
    {
        $this->output->enable_profiler(TRUE);
        $this->load->model('nurseries_model');
        $nursery = $this->nurseries_model->get_nursery($id);
        $data['row'] = $nursery;
        $this->template->set('thispage','Edit Nursery Record');
        $this->template->set('title','Edit Nursery Record | Great Plant Picks');
        $this->template->load('admin_template','nurseries/edit', $data);
    }
        function edit()
        {
            $this->load->model('nurseries_model');
        }

        function delete($id)
    {
        $this->load->model('nurseries_model');
        $this->nurseries_model->delete_nursery($id);
        if($id)
        {
            $this->session->set_flashdata('status', 'Record Has Been Deleted');
        }
        else
        {
            $this->session->set_flashdata('status', 'Record Has Not Been Deleted, Please Try Again');
        }
        redirect('nurseries/view');
    }
}
/* End of file editnurseries.php */
/* Location: ./application/controllers/nurseries.php */
