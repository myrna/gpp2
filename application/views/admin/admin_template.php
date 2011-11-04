<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <base href="<?php echo base_url();?>">
         <link rel="stylesheet" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/adminprint.css" type="text/css" media="print" />
        
</head>
    <body>
        <div id="topbar"></div>
        <div id="wrapper">
            <div id="banner">
                <?php
                    if ($thispage=="Home")
                echo "<div id='logo'></div>";
                    elseif ($thispage=="Database Administration")
                echo "<a href='/'><div id='logo'></div></a>";
                    else {
                echo "<a href='/'><div id='logo-sub'></div></a>" ;
                }
                ?>
            </div>
        <div id="navigation">
      <a <?php if ($thispage=="Home")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>">Home</a>
       
     <a <?php if ($thispage=="Find Your Plant")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>plantlists/search/">Plant Lists</a>
     <a <?php if ($thispage=="Nursery Directory")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>resources/">Resources</a>
     <a <?php if ($thispage=="Database Administration")
      echo " id=\"currentpage\""; ?> href="<?php echo base_url();?>admin/">Database Administration</a>
          <?php if ($logged_in) :?>
           <a href="<?php echo base_url();?>auth/logout/">Logout</a>
            <?php else :  ?>
            <a href="<?php echo base_url();?>auth/login/">Login</a>
            <?php endif ?>
</div><!-- end navigation -->
          
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
         
       <?php $this->load->view('includes/footer'); ?>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/jquery.tablesorter.min.js'></script>
           <script type='text/javascript' src='<?php echo base_url();?>/scripts/scripts-admin.js'></script>
               </body>
</html>