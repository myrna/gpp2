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

class Gallery extends Controller {

    function index() {
        $this->output->enable_profiler(TRUE);
        $data['images'] = $this->db->get('images')->result_array();

        $this->template->set('thispage','Images');
        $this->template->set('title','Images - Database Administration | Great Plant Picks');
        $this->load->helper('image');
        $this->template->load('template','gallery/index', $data);
    }

    function upload_image($id = ''){
        $this->load->model('crud_model');
        $this->load->model('Gallery_model');
        $data['plant_id'] = $id;
        $data['images'] = $this->Gallery_model->get_images($id);

        $data['seasons'] = array('unknown' => 'Unknown', 'spring' => 'Spring', 'summer' => 'Summer', 'fall' => 'Fall', 'winter' => 'Winter');
        $this->template->set('thispage','Upload Image');
        $this->template->set('title','Upload Image - Database Administration | Great Plant Picks');
        $this->load->helper('html');
        $this->load->helper('image');
        $this->template->load('template','gallery/add', $data);
    }
    
    function add_image() {
        //$this->output->enable_profiler(TRUE);
        
        $this->load->model('Gallery_model');
        $plant_id = $this->input->post('plant_id');
        $image_id = $this->Gallery_model->do_upload();
        $this->Gallery_model->link_image($image_id, $plant_id);
        $this->session->set_flashdata('status', 'Image Added, Upload Another?');
        redirect('gallery/upload_image/' . $plant_id);
    }
    
    function delete() {
        //$this->output->enable_profiler(TRUE);
        $this->load->model('Gallery_model');
        $image_id = $this->input->post('image_id');
        $plant_id = $this->input->post('plant_id');
        $this->Gallery_model->delete_image($image_id);
        $this->session->set_flashdata('status', "Image deleted.");
        redirect('gallery/upload_image/' . $plant_id);
    }
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */
