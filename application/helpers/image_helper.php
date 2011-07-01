<?php

    function image_thumb_url($filename) {
        return base_url() . "images/thumbs/$filename";
    }

    function image_thumb_link($filename) {
        // this just opens the larger image, but you could send them to a page
        // that displays the image nicely by returning a controller in the anchor
        // instead of the image path.
        $thumb = "<img src='" . image_thumb_url($filename) . "'/>";
        return anchor("images/$filename", $thumb);
    }


?>
