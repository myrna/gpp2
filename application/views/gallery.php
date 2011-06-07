<!-- upload images, gallery view -->
    <div id="gallery">
		<?php if (isset($images) && count($images)):
			foreach($images as $image):	?>
			<div class="thumb">
				<a href="<?php echo $image['url']; ?>">
					<img alt="<?php echo $image; ?>" src="<?php echo $image['thumb_url']; ?>" /></a>                                     				</a>
			</div>
		<?php endforeach; else: ?>
			<div id="blank_gallery">Please Upload an Image</div>
		<?php endif; ?>
	</div>

	<div id="upload">
		<?php

		echo form_open_multipart('gallery');
		echo form_upload('userfile');
        if (isset($id)) {
            echo form_hidden('id', $id);
        }
                echo form_submit('upload', 'Upload');
		echo form_close();
		?>
	</div>

