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

class Gallery extends CI_Controller {

    function index() {
       // $this->output->enable_profiler(TRUE);
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

        $data['images'] = $this->db->get('images')->result_array();

        $this->template->set('thispage','Images');
        $this->template->set('title','Images - Database Administration | Great Plant Picks');
        $this->load->helper('image');
        $this->template->load('admin/admin_template','gallery/index', $data);
    }
    }
    function upload_image($id = ''){
	 //   $this->output->enable_profiler(TRUE);
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

        $this->load->model('Crud_model');
        $this->load->model('Gallery_model');
        $data['plant_id'] = $id;
		$plants = $this->db->get_where('plant_data', array('id' => $id))->result_array();
		$data['plant_data'] = $plants[0];
		$data['images'] = $this->Gallery_model->get_images($id);

		$categories = $this->Crud_model->link_table($id, 'category', 'image');
        $data['category_fields'] = $categories['list'];
        $data['description'] = $description;
        $data['copyright'] = $copyright;
        $data['photographer'] = $photographer;
        $data['seasons'] = array('unknown' => 'Unknown', 'spring' => 'Spring', 'summer' => 'Summer', 'fall' => 'Fall', 'winter' => 'Winter');
        $this->template->set('thispage','Upload Image');
        $this->template->set('title','Upload Image - Database Administration | Great Plant Picks');
        $this->load->helper('html');
        $this->load->helper('image');
	    $this->template->load('admin/admin_template','admin/gallery/add', $data);
    }
    }

    function thumbs($id = ''){
        $this->load->model('Crud_model');
        $this->load->model('Gallery_model');
        $this->load->helper('image');
        $this->load->helper('html');
        $data['plant_id'] = $id;
		$plants = $this->db->get_where('plant_data', array('id' => $id))->result_array();
		$data['plant_data'] = $plants[0];
		$data['images'] = $this->Gallery_model->get_images($id);
    }
    
    function add_image() {
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

        $this->load->model('gallery_model');
        $this->load->model('crud_model');
        $plant_id = $this->input->post('plant_id');
        $image_id = $this->gallery_model->do_upload();
        $link_tables = array('category');
        foreach ($link_tables as $linker) {
            $this->crud_model->update_link_table($image_id, "image", $linker, $this->input->post($linker));                
            unset($_POST[$linker]);
        }
        $this->gallery_model->link_image($image_id, $plant_id);
        $this->session->set_flashdata('status', 'Image upload successful');
        redirect('admin/gallery/upload_image/' . $plant_id);
    }
    }
    function delete() {
        //$this->output->enable_profiler(TRUE);
        $this->load->model('gallery_model');
        $image_id = $this->input->post('image_id');
        $plant_id = $this->input->post('plant_id');
        $this->gallery_model->delete_image($image_id);
        $this->session->set_flashdata('status', "Image deleted.");
        redirect('admin/gallery/upload_image/' . $plant_id);
    }

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */
