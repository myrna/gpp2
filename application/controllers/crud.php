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

	
	function index()
	{
            $this->load->library('table');
            $this->load->model('crud_model');
            $records = $this->crud_model->get_records();

            if ($records->num_rows() > 0)
            {
                $table = array();
                $table[] = array('PlantId','Family','Genus','CrossGenus','Species','Subspecies',
                    'CrossSpecies','Variety','Cultivar','TradeName','RegisteredName','View','Edit','Delete');

             foreach ($records->result() as $row)
                {
                 $table[] = array($row->PlantId,$row->Family,$row->Genus,$row->CrossGenus,$row->Species,
                     $row->Subspecies,$row->CrossSpecies,$row->Variety,$row->Cultivar,$row->TradeName,
                     $row->RegisteredName, anchor('crud/view_record/'.$row->PlantId, 'View'),
                     anchor('crud/edit_record/'.$row->PlantId, 'Edit'), anchor('crud/delete_record/'.$row->PlantId, 'Delete',
                             array('onclick' => 'return confirm(\'Are you sure you want to delete the record?\');')));
                }
                $data['records'] = $table;
            }
                $data['heading'] = "GPP Database Administration";

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
                    'PlantId' => $_POST['PlantId'],
                    'Family' => $_POST['Family'],
                    'Genus' => $_POST['Genus'],
                    'CrossGenus' => $_POST['CrossGenus'],
                    'Species' => $_POST['Species'],
                    'Subspecies' => $_POST['Subspecies'],
                    'CrossSpecies' => $_POST['CrossSpecies'],
                    'Variety' => $_POST['Variety'],
                    'Cultivar' => $_POST['Cultivar'],
                    'TradeName' => $_POST['TradeName'],
                    'RegisteredName' => $_POST['RegisteredName'],
                    'PlantGroup' => $_POST['PlantGroup'],
                    'Synonym' => $_POST['Synonym'],
                    'Origin' => $_POST['Origin'],
                    'PlantType' => $_POST['PlantType'],
                    'FoliageType' => $_POST['FoliageType'],
                    'GrowthHabit' => $_POST['GrowthHabit'],
                    'FoliageColor' => $_POST['FoliageColor'],
                    'FlowerColor' => $_POST['FlowerColor'],
                    'FlowerTime' => $_POST['FlowerTime'],
                    'Sun' => $_POST['Sun'],
                    'Soil' => $_POST['Soil'],
                    'Water' => $_POST['Water'],
                    'PlantWidth' => $_POST['PlantWidth'],
                    'PlantHeight' => $_POST['PlantHeight'],
                    'ZoneLow' => $_POST['ZoneLow'],
                    'ZoneHigh' => $_POST['ZoneHigh'],
                    'Culture' => $_POST['Culture'],
                    'Qualities' => $_POST['Qualities'],
                    'DesignUse' => $_POST['DesignUse'],
                    'Wildlife' => $_POST['Wildlife'],
                    'NominatedBy' => $_POST['NominatedBy'],
                    'NominatedForYear' => $_POST['NominatedForYear'],
                    'Status' => $_POST['Status'],
                    'Year' => $_POST['Year'],
                    'Theme' => $_POST['Theme'],
                    'Publish' => $_POST['Publish'],
                    'Tag' => $_POST['Tag'],
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
        function view_record($PlantId = ''){
		$this->load->model('crud_model');

		//we call our model's get_site function, we will create that function in a moment
		$record = $this->crud_model->get_record($PlantId);

		$data['title'] = "View Record: ";
		//Returned data will be put into the $row variable that will be send to the view.
		$data['row'] = $record;

		$this->load->view('admin/view', $data);

	}

        function edit_record($PlantId = ''){
		$this->load->model('crud_model');

		//we call our model's get_site function, we will create that function in a moment
		$record = $this->crud_model->get_record($PlantId);

		$data['title'] = "Edit Record: ";
		//Returned data will be put into the $row variable that will be send to the view.
		$data['row'] = $record;

		$this->load->view('admin/edit', $data);
        }
         function edit()
        {
            $this->load->model('crud_model');
            $data = array (
                    'Family' => $_POST['Family'],
                    'Genus' => $_POST['Genus'],
                    'CrossGenus' => $_POST['CrossGenus'],
                    'Species' => $_POST['Species'],
                    'Subspecies' => $_POST['Subspecies'],
                    'CrossSpecies' => $_POST['CrossSpecies'],
                    'Variety' => $_POST['Variety'],
                    'Cultivar' => $_POST['Cultivar'],
                    'TradeName' => $_POST['TradeName'],
                    'RegisteredName' => $_POST['RegisteredName'],
                    'PlantGroup' => $_POST['PlantGroup'],
                    'Synonym' => $_POST['Synonym'],
                    'Origin' => $_POST['Origin'],
                    'PlantType' => $_POST['PlantType'],
                    'FoliageType' => $_POST['FoliageType'],
                    'GrowthHabit' => $_POST['GrowthHabit'],
                    'FoliageColor' => $_POST['FoliageColor'],
                    'FlowerColor' => $_POST['FlowerColor'],
                    'FlowerTime' => $_POST['FlowerTime'],
                    'Sun' => $_POST['Sun'],
                    'Soil' => $_POST['Soil'],
                    'Water' => $_POST['Water'],
                    'PlantWidth' => $_POST['PlantWidth'],
                    'PlantHeight' => $_POST['PlantHeight'],
                    'ZoneLow' => $_POST['ZoneLow'],
                    'ZoneHigh' => $_POST['ZoneHigh'],
                    'Culture' => $_POST['Culture'],
                    'Qualities' => $_POST['Qualities'],
                    'DesignUse' => $_POST['DesignUse'],
                    'Wildlife' => $_POST['Wildlife'],
                    'NominatedBy' => $_POST['NominatedBy'],
                    'NominatedForYear' => $_POST['NominatedForYear'],
                    'Status' => $_POST['Status'],
                    'Year' => $_POST['Year'],
                    'Theme' => $_POST['Theme'],
                    'Publish' => $_POST['Publish'],
                    'Tag' => $_POST['Tag'],
                    );
            $records = $this->crud_model->edit_record($data, $_POST['PlantId']);
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

        function delete_record($PlantId = '')
        {
            $this->load->model('crud_model');
            $records = $this->crud_model->delete_record($PlantId);
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