<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta name="description" content="Great Plant Picks is an educational program of the Elisabeth C. Miller Botanical Garden,
            recommending outstanding plants for gardeners living west of the Cascade Mountains from Eugene, Oregon, USA to Vancouver, British Columbia, Canada." />
 <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<meta charset="UTF-8">
        <base href="<?php echo base_url();?>">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/apple-touch-icon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/gppprint.css" type="text/css" media="print" />
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
                <?php
                    if ($thispage=="Home")
                echo "<div id='logo'></div>";
                    else {
                        ?>
                <div id='logo-sub'><a href='<?php echo base_url();?>'><div id='logo-link'></div></a></div>
               <?php }
                ?>
<?php if ($thispage=="Home")
    echo
               "<a href='/plantlists/search/'><div id='plant-link-home'>
                    <p>FIND YOUR PLANT</p>
                </div></a>";
                elseif
    ($this->uri->segment(1)!=="plantlists") echo
               "<a href='/plantlists/search/'><div id='plant-link-all'>
                    <p>FIND YOUR PLANT</p>
                </div></a>" ?>
            </div><!-- end banner -->
        <div id="navigation">
      <a <?php if ($thispage=="Home")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>">Home</a>
        <a <?php if ($thispage=="About GPP")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>about/">About GPP</a>
     <a <?php if ($thispage=="Find Your Plant")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>plantlists/search/">Plant Lists</a>
     
    <a <?php if ($thispage=="Resources")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>resources/">Resources</a>
    <a <?php if ($thispage=="Press")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>press/">Press</a>
    <a <?php if ($thispage=="Contact")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>contact/">Contact</a>
    <a class="last" <?php if ($thispage=="Donate")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>donate/">Donate</a>        
</div><!-- end navigation -->
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
         
        <?php $this->load->view('includes/footer'); ?>

 
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/jquery.tablesorter.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/scripts.js'></script>        
           </body>
</html>