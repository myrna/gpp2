<?php

    function image_thumb_url($filename) {
        return base_url() . "images/thumbs/" . $filename;
    }
    
    function delete_image_url($id) {
        return anchor('gallery/delete/' . $id, "Delete");
    }
?>
