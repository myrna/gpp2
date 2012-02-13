<!DOCTYPE html>
<html>
    <head>
        <title>Page Not Found | Great Plant Picks</title>
        <meta name="description" content="Great Plant Picks is an educational program of the Elisabeth C. Miller Botanical Garden,
            recommending outstanding plants for gardeners living west of the Cascade Mountains from Eugene, Oregon, USA to Vancouver, British Columbia, Canada." />

	<meta charset="UTF-8">
        <base href="<?php echo base_url();?>">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>images/apple-touch-icon.png">
        <link rel="stylesheet" id="gppstyles" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        </head>
    <body>
        <div id="topbar"></div>
        <div id="wrapper">
            <div id="banner">
                <div id='logo-sub'><a href='<?php echo base_url();?>'><div id='logo-link'></div></a></div>
<?php
    echo
               "<a href='/plantlists/search/'><div id='plant-link-home'>
                    <p>FIND YOUR PLANT</p>
                </div></a>";
                ?>
            </div><!-- end banner -->
        <div id="navigation">
      <a href="<?php echo base_url();?>">Home</a>
        <a href="<?php echo base_url();?>about/">About GPP</a>
     <a href="<?php echo base_url();?>plantlists/search/">Plant Lists</a>

    <a href="<?php echo base_url();?>resources/">Resources</a>
    <a href="<?php echo base_url();?>press/">Press</a>
    <a href="<?php echo base_url();?>contact/">Contact</a>
</div><!-- end navigation -->
<div id="content" class="view">

<h2>Sorry, the page cannot be found</h2>

<p class="intro">The page you are looking for could not be found. The Great Plant Picks website has recently been revised, and the page you are looking for may have been renamed, so please check our <a href="<?php echo base_url();?>sitemap/">Site Map</a> for a complete
    listing of pages, or check out our <a href="<?php echo base_url();?>plantlists/search/">Plant Lists/Search by Name</a> page, where you can find helpful lists of plants by type or for various garden situations, as well as our plant search function and a link to our
    <a href="<?php echo base_url();?>plantlists/advanced/">Advanced Search</a> page.</p>
</div><!-- end content -->
 <?php $this->load->view('includes/footer'); ?>
           </body>
</html>