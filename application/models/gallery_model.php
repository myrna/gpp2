<?php

/**
 * gallery_model.php
 *
 * Allows upload of image files to /images folder and automatically creates thumbnail images /images/thumbs with url
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Gallery_model extends Model {

	var $gallery_path;
	var $gallery_path_url;
        

	function Gallery_model() {
		parent::Model();

		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url().'images/';

	}

	function do_upload() {

		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);

		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();


// this directs image and thumbnail to appropriate folder, and sizes thumbnail
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'maintain_ratio' => true,
			'width' => 150,
			'height' => 150
		);


// thumbnail resize function
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

        $this->db->get('images'); // get image table

// this inserts the image URL into the images table and automatically creates the image_id
                                    
            $data = array(               
               'filename' => $image_data['file_name'],
               
               //'thumbname' => $image['thumb_url']
                );

            $this->db->insert('images', $data);
            return $this->db->insert_id();

	}

 // this would insert the plant_id and image_id into a table linking the images to the plants
        function link_image($data) {




            
            $data = array($plant_id, $image_id);

            $result = 0;
            //check if $data is not empty
            if(!empty($data))
            {
                //insert $data with insert method
                $result = $this->db->insert('plant_images',$data);
            }
            return $result;


        }

  // this displays the uploaded images in the gallery view; will probably remove this function as there will be too many images
	function get_images() {

		$files = scandir($this->gallery_path);  // return all folders
		$files = array_diff($files, array('.', '..', 'thumbs'));  //extract thumbs

		$images = array();

		foreach ($files as $file) { // pass url of image and thumb to view
			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
			);
		}

		return $images;
	}

}

/* End of file gallery_model.php */
/* Location: ./application/models/gallery_model.php */

