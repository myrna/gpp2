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

class Gallery_model extends CI_Model {
    var $gallery_path;
    function Gallery_model() {
       
        $this->gallery_path = realpath(APPPATH . '../images');
    }
    
    function do_upload() {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 2000
        );

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload()) {
            // tell the user it didn't work
        }
        $image_data = $this->upload->data();

        // this directs image and thumbnail to appropriate folder, and sizes thumbnail
        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $this->gallery_path . '/thumbs',
            'maintain_ratio' => true,
            'width' => 100,
            'height' => 100
        );

        // thumbnail resize function
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $data = array(               
            'filename' => $image_data['file_name'],
            'season' => $this->input->post('season'),
            'description' => $this->input->post('description'),
            'copyright' => $this->input->post('copyright'),
            'photographer' => $this->input->post('photographer'),
        );
        
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }

    function link_image($image_id, $plant_id) {
        $data = array('plant_id' => $plant_id, 'image_id' => intval($image_id));
        $this->db->insert('plant_images',$data);
    }

    function get_categories($image_id) {
		$this->db->select('category.category');
		$this->db->where('image_category.image_id', $image_id);
		$this->db->join('category','image_category.category_id = category.id');
		$categories = array();
		$query = $this->db->get('image_category')->result_array();
		foreach ($query as $category) {
			$categories[] = $category['category'];
		}
		return $categories;
	}

   function get_images($plant_id) {
        $images = array();
        $this->db->select('images.*,plant_images.plant_id');
        $this->db->where('plant_id', $plant_id);
        $this->db->join('images', 'images.id = plant_images.image_id');
        $images = $this->db->get('plant_images')->result_array();
		foreach ($images as $index => $image) {
			$images[$index]['categories'] = $this->get_categories($image['id']);
		}
        return $images;
    }

    function get_image_data($image_id) {
         $this->db->get('images');
            $query = $this->db->select('orientation','season','description','copyright','photographer')
                    ->from('images')
                    ->where('id',$id)
                    ->get();
            $data['query'] = $query;
            return $data;
        }
       
    function delete_image($image_id) {
        $image = $this->db->get('images', array('id' => $image_id))->result();
        $this->db->delete('images', array('id' => $image_id));
        $this->db->delete('plant_images', array('image_id' => $image_id));
		$this->db->delete('image_category', array('image_id' => $image_id));
        # we're having permission problems with this, but we should add it later.
        #unlink($this->gallery_path . $image['filename']);
        #unlink($this->gallery_path . 'thumbs/' . $image['filename']);
    }

}

/* End of file gallery_model.php */
/* Location: ./application/models/gallery_model.php */
