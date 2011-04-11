<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="/css/gppstyles.css">
	<title>Gallery</title>
</head>
<body>
    <a href="/">Home</a> | <a href="/dbadmin/">Database Administration</a> | <a href="/listplants/display/">Advanced Search</a> |
    <div id="gallery">
		<?php if (isset($images) && count($images)):
			foreach($images as $image):	?>
			<div class="thumb">
				<a href="<?php echo $image['url']; ?>">
					<img src="<?php echo $image['thumb_url']; ?>" /></a>                                     				</a>
			</div>
		<?php endforeach; else: ?>
			<div id="blank_gallery">Please Upload an Image</div>
		<?php endif; ?>
	</div>

	<div id="upload">
		<?php
		echo form_open_multipart('gallery');
		echo form_upload('userfile');
		echo form_submit('upload', 'Upload');
		echo form_close();
		?>
	</div>

<?php $this->load->view('includes/footer'); ?>
