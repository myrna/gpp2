<?php

/**
 * listplants.php
 *ADMIN ONLY
 * Show plant lists in sortable table, search for plants to display in table
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		
 */

class Listplants extends CI_Controller {

    function index($page = 0)
    {
	//	$this->output->enable_profiler(TRUE);
        
        $this->load->model('listplants_model');
        $records = $this->listplants_model->get_records($page);
        $total = $this->db->count_all_results('plant_data');
        $path = "admin/listplants/index";
        $this->show_plants($page, $records, $total, $path);
    }
    
    function setup_search_query($terms) {
        $matchwords = explode(" ", $terms);
        $matchfields = array('genus', 'specific_epithet', 'family', 'cultivar', 'cross_species', 'trade_name','trademark_name',
            'registered_name','status','gpp_year','sort');
        foreach ($matchfields as $field) {
            foreach ($matchwords as $match) {
                $this->db->or_like($field, $match);
            }
        }        
    }
    
    function search($page = 0, $query = '') {

        if ($this->input->post('searchterms')) {
            $this->session->set_userdata('plant_search', $this->input->post('searchterms'));
        }

        $query = $this->session->userdata('plant_search');
      
        $this->load->model('listplants_model');
        $this->setup_search_query($this->session->userdata('plant_search'));
        $total = $this->db->count_all_results('plant_data');
        $this->setup_search_query($this->session->userdata('plant_search'));
        $records = $this->listplants_model->get_records($page);
        $path = "admin/listplants/search";
      // $path = "admin/listplants/search/" . $query;
      //  //this adds searchterm to URL but not on first page of search results and screws up pagination
        $this->show_plants($page, $records, $total, $path, $query);
    }
    
    function show_plants($page, $records, $total, $path, $query = '') {
         // Enable Profiler.
         //$this->output->enable_profiler(TRUE);
        //user cannot access this page unless logged in, offer logout option
         if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('admin'))
		{
                        $this->session->set_flashdata('message', 'You Must Be Logged In To View This Page');
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );

         //set table style-see stylesheet
            $this->load->library('table');           	
            $tmpl = array (
                    'table_open'          => '<table class="dblist">',
                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',
                    'row_alt_start'       => '<tr class="alternate">',                  
                    'table_close'         => '</table>'
              );
            $this->table->set_template($tmpl);

        if ($records->num_rows() > 0)
            {
                $table = array();
                $table[] = array(
                    'ID',
                    'Plant Name',
                    'Status',
                    'GPP Year',
                    'Edit/View',
                    'Images',
                    'Delete'
                );
         foreach ($records->result_array() as $row)
                {
                    $id = $row['id'];
                    $status = $row['status'];
                    $gpp_year = $row['gpp_year'];
                    $table[] = array(
                        $id,
                        display_full_botanical_name($row),
                        $status,
                        $gpp_year,
                        anchor('admin/crud/edit_record/'.$id, 'Edit/View'),
                        anchor('admin/gallery/upload_image/'.$id, 'Images'),
                        anchor('admin/crud/delete_record/'.$id, 'Delete',
                        array('onclick' => 'return confirm(\'Are you sure you want to delete the record?\');')));
                }
                $data['records'] = $table;
            }
            $data['heading'] = "GPP Database Administration";
            $data['total_rows'] = $total;
            $config = array();
            $config['base_url'] = site_url($path);
            $config['per_page'] = 30;
            $config['total_rows'] = $total;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);

            $this->template->set('thispage','View Records');
            $this->template->set('title','Search Records - Database Administration | Great Plant Picks');
            $this->template->load('admin/admin_template','admin/listplants', $data);
            
     }
    }
        
 }

/* End of file listplants.php */
/* Location: ./application/controllers/listplants.php */
