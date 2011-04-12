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
                $table[] = array('Family','Genus','CrossGenus','Species','Subspecies',
                    'CrossSpecies','Variety','Cultivar','TradeName','RegisteredName',
                    'PlantGroup','Synonym','Origin','PlantType','FoliageType','GrowthHabit',
                    'FoliageColor','FlowerColor','FlowerTime','Sun','Soil','Water','PlantWidth','PlantHeight',
                    'ZoneLow','ZoneHigh','Culture','Qualities','DesignUse','Wildlife',
                    'NominatedBy','NominatedForYear','Status','Year','Theme','Publish','Tag');

             foreach ($records->result() as $row)
                {
                 $table[] = array($row->PlantId,$row->Family,$row->Genus,$row->CrossGenus,$row->Species,
                     $row->Subspecies,$row->CrossSpecies,$row->Variety,$row->Cultivar,$row->TradeName,
                     $row->RegisteredName,$row->PlantGroup,$row->Synonym,$row->Origin,$row->PlantType,
                     $row->FoliageType,$row->GrowthHabit,$row->FoliageColor,$row->FlowerColor,
                     $row->FlowerTime,$row->Sun,$row->Soil,$row->Water,$row->PlantWidth,$row->PlantHeight,
                     $row->ZoneLow,$row->ZoneHigh,$row->Culture,$row->Qualities,$row->DesignUse,$row->Wildlife,
                     $row->NominatedBy,$row->NominatedForYear,$row->Status,$row->Year,$row->Theme,$row->Publish,
                     $row->Tag);

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
}
/* End of file crud.php */
/* Location: ./application/controllers/crud.php */