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
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15069871-38']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
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

<h2>Sorry, the page or plant cannot be found</h2>

<div class="simplesearch">
    <?php
     	$attributes = array('class' => 'searchform');
      	echo form_open('plantlists', $attributes); 
	?>
   <p>Search by plant name:
    <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
   <input type="submit" value="Search"></p>
   <?php echo form_close(); ?>
    </div><!-- end searchform -->

<p class="intro"><em>The Great Plant Picks website has recently been revised, and the page or plant you are looking for may have been renamed</em>.  Try searching for your plant in the search box above, or check one of the following:</p>
<ul class="leaf">
    <li>The Great Plant Picks <a href="<?php echo base_url();?>sitemap/">Site Map</a> for a complete
    listing of pages.</li>
    <li>Our <a href="<?php echo base_url();?>plantlists/search/">Plant Lists/Search by Name</a> page, where you can find helpful lists of plants by type or for various garden situations.</li>
    <li>The Great Plant Picks <a href="<?php echo base_url();?>plantlists/advanced/">Advanced Search</a> page.</li>
</ul>
</div><!-- end content -->
 <?php $this->load->view('includes/footer'); ?>
 <script type='text/javascript' src='<?php echo base_url();?>/scripts/jquery.tablesorter.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/scripts.js'></script>        
           </body>
</html>