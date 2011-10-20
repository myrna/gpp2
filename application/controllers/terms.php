<?php
/**
* autocomplete.php
*
* jquery autocomplete
*
* @package		Great Plant Picks
* @subpackage	Controllers
* @category		Controllers
* @author		mlo
*/

class Terms extends CI_Controller {

   public function terms_autocomplete()
{

    $keyword = $this->input->post('searchterms');

    $data['response'] = 'false';
    $this->db->select('*');
    $this->db->from('plant_data');
    $this->db->like('genus', $keyword);
    $this->db->group_by('genus');
    $genus = $this->db->get()->result();

    if (count($genus) > 0) {
        $data['message'] = array();

        foreach ($genus as $one_genus) {
            $data['message'][] = array('label' => $one_genus->genus,
                'item'  => $one_genus->genus,
                'value' => $one_genus->genus );
        }

        $data['response'] = 'true';
    }
    echo json_encode($data);
}
}
/* end autocomplete controller */