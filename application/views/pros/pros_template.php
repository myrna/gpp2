<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <base href="<?php echo base_url();?>">
        <link rel="stylesheet" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/adminprint.css" type="text/css" media="print" />
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
                echo "<div id='logo-sub'><a href='/'><div id='logo-link'></div></a></div>" ;
                }
                ?>
            </div><!-- end banner -->
        <div id="navigation">
      <a <?php if ($thispage=="Home")
      echo " id=\"currentpage\""; ?> href="/">Home</a> 
      <a <?php if ($thispage=="About GPP")
      echo " id=\"currentpage\""; ?> href="/about/">About GPP</a> 
      <a <?php if ($thispage=="Find Your Plant")
      echo " id=\"currentpage\""; ?> href="/plantlists/search/">Plant Lists</a>     
      <a <?php if ($thispage=="Resources")
      echo " id=\"currentpage\""; ?> href="/resources/">Resources</a>
      <a <?php if ($thispage=="Contact")
      echo " id=\"currentpage\""; ?> href="/contact/">Contact</a>
             <?php if ($logged_in) :?>
           <a href="/auth/logout/">Logout</a>
            <?php else :  ?>
            <a href="/auth/login/">Login</a>
            <?php endif ?>
            
</div><!-- end navigation -->
        <div id="contents">
         <?php echo $contents ?></div><!-- end contents -->
         
         <?php $this->load->view('includes/footer'); ?>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/jquery.tablesorter.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>/scripts/scripts.js'></script>
  </body>
</html>