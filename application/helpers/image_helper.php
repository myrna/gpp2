<?php

    function image_thumb_url($filename) {
        return base_url() . "images/thumbs/$filename";
    }

   function image_url($filename) {
        if(!$filename)
        {
        return base_url() . "assets/image-not-available.gif";
        }
        else
        {
        return base_url() . "images/$filename";
        }
    
    }
/* this assigns a class to primary image and hides it in factsheet print view if there is no image available */
    
    function image_class($filename) {
        if(!$filename)
        {
        return "hide";
        }
        else
        {
        return "show";
        }
    }

    function image_thumb_link($filename) {
        // this just opens the larger image, but you could send them to a page
        // that displays the image nicely by returning a controller in the anchor
        // instead of the image path.
        $thumb = "<img src='" . image_thumb_url($filename) . "'/>";
        return anchor("images/$filename", $thumb);
    }

    function image_view_link($filename) {        
      $thumb = "<img src='" . image_thumb_url($filename) . "'/>";
      return $thumb;
    }

?>
