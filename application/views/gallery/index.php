<div id="gallery">

    <?php echo $this->session->flashdata('status'); ?>

    <?php foreach($images as $image) { ?>
    <div class="thumb">
        <img alt="<?php echo $image['filename']; ?>" src="<?php echo image_thumb($image); ?>" /></a>                                     				</a>
    </div>
	<?php } ?>
</div>