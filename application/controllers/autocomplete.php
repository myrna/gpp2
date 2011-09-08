<?php
/**
* gallery.php
*
* upload images and create thumbnails
*
* @package		Great Plant Picks
* @subpackage	Controllers
* @category		Controllers
* @author		mlo
*/

class Autocomplete extends CI_Controller {

    function admin_autocomplete()
{
        $this->load->model('autocomplete_model');
        $keyword = $this->input->post('searchterms');

        $data['response'] = 'false'; //Set default response

        $query = $this->autocomplete_model->searchterms($keyword); //Model DB search

        if($query->num_rows() > 0){
           $data['response'] = 'true'; //Set response
           $data['message'] = array(); //Create array
           foreach($query->result() as $row){
                  $data['message'][] = array('label'=> $row->genus, 'value'=> $row->genus); //Add a row to array
           }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
}

}
/* end autocomplete controller */