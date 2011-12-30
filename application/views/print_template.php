<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
	<meta charset="UTF-8">
        <base href="<?php echo base_url();?>">
        <link rel="stylesheet" href="<?php echo base_url();?>css/print.css" type="text/css" media="screen, projection, print" />
        <style type="text/css" media="print">
            .printview {display:none;}
        </style>
               </head>
    <body>
        <div id="wrapper">
           
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
            </div><!-- end wrapper -->
        
           </body>
</html>