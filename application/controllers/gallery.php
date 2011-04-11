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

		if ($this->input->post('upload')) {
			$this->Gallery_model->do_upload();
		}

		$data['images'] = $this->Gallery_model->get_images();

		$this->load->view('gallery', $data);

	}

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */
