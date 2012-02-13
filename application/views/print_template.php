<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
	<meta charset="UTF-8">
        <base href="<?php echo base_url();?>">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/apple-touch-icon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>css/print.css" type="text/css" media="screen, projection, print" />
        <style type="text/css" media="print">
            .printview {display:none;}
        </style>
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
        <div id="wrapper">
           
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
            </div><!-- end wrapper -->
        
           </body>
</html>