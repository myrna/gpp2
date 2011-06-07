<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <title><?php echo $title ?></title>
         <base href="<?php echo base_url();?>">
        <link rel="stylesheet" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />


</head>
    <body>
        <div id="wrapper">
        <div id="navigation">
      <a <?php if ($thispage=="Home")
      echo " id=\"currentpage\""; ?> href="/">Home</a> |
        <a <?php if ($thispage=="About GPP")
      echo " id=\"currentpage\""; ?> href="/about/">About GPP</a> |
     <a <?php if ($thispage=="Plant Lists")
      echo " id=\"currentpage\""; ?> href="/listplants/display/">Plant Lists</a> |
     <a <?php if ($thispage=="Nursery Directory")
      echo " id=\"currentpage\""; ?> href="/nursery_list/">Nurseries</a> |
     <a <?php if ($thispage=="Database Administration")
      echo " id=\"currentpage\""; ?> href="/admin/">Database Administration</a> 
</div>
        <div id="contents"><?php echo $contents ?></div>
        <div id="footer"></div>
        </div><!-- end wrapper -->
    </body>


</html>