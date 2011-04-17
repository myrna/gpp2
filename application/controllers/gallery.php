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

		$this->load->model('Gallery_model');
                $this->db->get('images');

		if ($this->input->post('upload')) {
			$this->Gallery_model->do_upload();
		}

		$data['images'] = $this->Gallery_model->get_images();

 // trying to set up array to upload into images table at the same time we are loading the images into appropriate folders
 // and creating their URLs
      //          $image_data = array(
      //             'filename' => $this->input->post('filename'),
      //             'orientation' => $this->input->post('orientation'),
      //             'season' => $this->input->post('season'),
      //             'description' => $this->input->post('description'),
      //             'copyright' => $this->input->post('copyright'),
       //            'photographer' => $this->input->post('photographer'),
       //         );

		$this->load->view('gallery', $data);

	}

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */
