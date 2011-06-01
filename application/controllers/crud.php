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
    }
	function index($page = 0)
	{
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
                 $config['base_url'] = site_url("");
                 $config['total_rows'] = $records['total_rows'];
                 $config['per_page'] = 5;
                 $config['uri_segment'] = 3;
                 $this->pagination->initialize($config);
                 
                $this->load->view('admin/crud_view', $data);
	}
            function new_record()
            {
                $this->load->view('admin/new');
            }
           
            function add()
            {
                $this->load->model('crud_model');
                $data = array (
             'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'cross_genus' => $this->input->post('cross_genus'),
            'specific_epithet' => $this->input->post('specific_epithet'),
            'infraspecific_epithet_designator' => $this->input->post('infraspecific_epithet_designator'),
             'infraspecific_epithet'  => $this->input->post('infraspecific_epithet'),
            'cross_species' => $this->input->post('cross_species'),
            'plantname_group' => $this->input->post('plantname_group'),
            'cultivar' => $this->input->post('cultivar'),
            'trade_name' => $this->input->post('trade_name'),
            'plant_patent_number' => $this->input->post('plant_patent_number'),
             'plant_patent_number_applied_for' => $this->input->post('plant_patent_number_applied_for'),
            'plant_breeders_rights' => $this->input->post('plant_breeders_rights'),
            'plant_origin' => $this->input->post('plant_origin'),
            'native_to_gpp_region' => $this->input->post('native_to_gpp_region'),
            'plant_type' => $this->input->post('plant_type'),
            'foliage_type' => $this->input->post('foliage_type'),
            'growth_habit' => $this->input->post('growth_habit'),
            'growth_rate' => $this->input->post('growth_rate'),
            'foliage_texture' => $this->input->post('foliage_texture'),
            'foliage_notes' => $this->input->post('foliage_notes'),
            'flower_showy' =>  $this->input->post('flower_showy'),
            'flower_time' => $this->input->post('flower_time'),
            'plant_width_at_10' => $this->input->post('plant_width_at_10'),
            'plant_height_at_10' => $this->input->post('plant_height_at_10'),
            'plant_width_max' => $this->input->post('plant_width_max'),
            'plant_height_max' => $this->input->post('plant_height_max'),
            'zone_low' => $this->input->post('zone_low'),
            'zone_high' => $this->input->post('zone_high'),
            'growing_notes' => $this->input->post('growing_notes'),
            'culture_notes' => $this->input->post('culture_notes'),
            'qualities' => $this->input->post('qualities'),
            'plant_combinations' => $this->input->post('plant_combinations'),
            'nominator' => $this->input->post('nominator'),
            'nominated_for_year' => $this->input->post('nominated_for_year'),
            'committee' => $this->input->post('committee'),
            'advisory_group' => $this->input->post('advisory_group'),
            'eval_trial' => $this->input->post('eval_trial'),
            'gpp_reference' => $this->input->post('gpp_reference'),
            'status' => $this->input->post('status'),
            'evaluation_available' => $this->input->post('evaluation_available'),
            'gpp_history' => $this->input->post('gpp_history'),
            'gpp_year' => $this->input->post('gpp_year'),
            'theme' => $this->input->post('theme'),
            'programmed_search' => $this->input->post('programmed_search'),
            'geek_notes' => $this->input->post('geek_notes'),
            'publish' => $this->input->post('publish'),
            'sort' => $this->input->post('sort'),
                    );
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
		$this->load->model('crud_model');

		$record = $this->crud_model->get_record($id);

		$data['title'] = "View Record: ";
		//Returned data will be put into the $row variable that will be send to the view.
		$data['row'] = $record;

		$this->load->view('admin/view', $data);

	}

        function edit_record($id = ''){
		$this->load->model('crud_model');

		$record = $this->crud_model->get_record($id);

		$data['title'] = "Edit Record: ";
		
		$data['row'] = $record;

		$this->load->view('admin/edit', $data);
        }
         function edit()
        {
            $this->load->model('crud_model');
            $data = array (
             'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'cross_genus' => $this->input->post('cross_genus'),
            'specific_epithet' => $this->input->post('specific_epithet'),
            'infraspecific_epithet_designator' => $this->input->post('infraspecific_epithet_designator'),
             'infraspecific_epithet'  => $this->input->post('infraspecific_epithet'),
            'cross_species' => $this->input->post('cross_species'),
            'plantname_group' => $this->input->post('plantname_group'),
            'cultivar' => $this->input->post('cultivar'),
            'trade_name' => $this->input->post('trade_name'),
            'plant_patent_number' => $this->input->post('plant_patent_number'),
             'plant_patent_number_applied_for' => $this->input->post('plant_patent_number_applied_for'),
            'plant_breeders_rights' => $this->input->post('plant_breeders_rights'),
            'plant_origin' => $this->input->post('plant_origin'),
            'native_to_gpp_region' => $this->input->post('native_to_gpp_region'),
            'plant_type' => $this->input->post('plant_type'),
            'foliage_type' => $this->input->post('foliage_type'),
            'growth_habit' => $this->input->post('growth_habit'),
            'growth_rate' => $this->input->post('growth_rate'),
            'foliage_texture' => $this->input->post('foliage_texture'),
            'foliage_notes' => $this->input->post('foliage_notes'),
            'flower_showy' =>  $this->input->post('flower_showy'),
            'flower_time' => $this->input->post('flower_time'),
            'plant_width_at_10' => $this->input->post('plant_width_at_10'),
            'plant_height_at_10' => $this->input->post('plant_height_at_10'),
            'plant_width_max' => $this->input->post('plant_width_max'),
            'plant_height_max' => $this->input->post('plant_height_max'),
            'zone_low' => $this->input->post('zone_low'),
            'zone_high' => $this->input->post('zone_high'),
            'growing_notes' => $this->input->post('growing_notes'),
            'culture_notes' => $this->input->post('culture_notes'),
            'qualities' => $this->input->post('qualities'),
            'plant_combinations' => $this->input->post('plant_combinations'),
            'nominator' => $this->input->post('nominator'),
            'nominated_for_year' => $this->input->post('nominated_for_year'),
            'committee' => $this->input->post('committee'),
            'advisory_group' => $this->input->post('advisory_group'),
            'eval_trial' => $this->input->post('eval_trial'),
            'gpp_reference' => $this->input->post('gpp_reference'),
            'status' => $this->input->post('status'),
            'evaluation_available' => $this->input->post('evaluation_available'),
            'gpp_history' => $this->input->post('gpp_history'),
            'gpp_year' => $this->input->post('gpp_year'),
            'theme' => $this->input->post('theme'),
            'programmed_search' => $this->input->post('programmed_search'),
            'geek_notes' => $this->input->post('geek_notes'),
            'publish' => $this->input->post('publish'),
            'sort' => $this->input->post('sort'),
                    );
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

		$this->load->view('gallery', $data);
                
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
}
/* End of file crud.php */
/* Location: ./application/controllers/crud.php */