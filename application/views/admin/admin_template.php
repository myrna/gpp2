<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <title><?php echo $title ?></title>
        <base href="<?php echo base_url();?>">
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/adminprint.css" type="text/css" media="print" />
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" type="text/css" />
        <script type="text/javascript">
        
        $(function() {
        $("#searchterms").autocomplete({
	minLength: 2,
	source: function(req, add){
		$.ajax({
			url: '<?php echo base_url(); ?>autocomplete/admin_autocomplete', //Controller where search is performed
			dataType: 'json',
			type: 'POST',
			data: req,
			success: function(data){
				if(data.response =='true'){
				   add(data.message);
				}
			}
		});
	}
});
        })
        </script>
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
      echo " id=\"currentpage\""; ?> href="/">Home</a> 
       
     <a <?php if ($thispage=="Plant Lists")
      echo " id=\"currentpage\""; ?> href="plantlists/">Plant Lists</a>
     <a <?php if ($thispage=="Nursery Directory")
      echo " id=\"currentpage\""; ?> href="nursery_list/">Nurseries</a> 
     <a <?php if ($thispage=="Database Administration")
      echo " id=\"currentpage\""; ?> href="/admin">Database Administration</a>
          <?php if ($logged_in) :?>
           <a href="/auth/logout/">Logout</a>
            <?php else :  ?>
            <a href="/auth/login/">Login</a>
            <?php endif ?>
</div><!-- end navigation -->
          
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
         
        <div id="footer"><p>Text and photos &#169;<?php echo date("Y"); ?> Great Plant Picks except where otherwise noted</p></div>
       </div><!-- end wrapper -->
    </body>


</html>