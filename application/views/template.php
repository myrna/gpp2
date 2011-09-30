<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <base href="<?php echo base_url();?>">
        <link rel="stylesheet" id="gppstyles" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" id="gppstyles1" href="<?php echo base_url();?>css/gppstyles1.css" type="text/css" media="print" />
        </head>
    <body>
        <div id="topbar"></div>
        <div id="wrapper">
            <div id="banner">
                <?php
                    if ($thispage=="Home" or $thispage=="Contact")
                echo "<div id='logo'></div>";
                    else {
                echo "<div id='logo-sub'><a href='<?php echo base_url();?>'><div id='logo-link'></div></a></div>" ;
                }
                ?>
<?php if ($this->uri->segment(1)!=="plantlists") echo
               "<a href='/plantlists/search/'><div id='plant-link'>
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
</div><!-- end navigation -->
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
         
        <?php $this->load->view('includes/footer'); ?>

        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/jquery.tablesorter.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/jquery.style-switcher.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/scripts.js'></script>
    </body>


</html>