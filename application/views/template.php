<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <title><?php echo $title ?></title>
        <base href="<?php echo base_url();?>">
        <link rel="stylesheet" href="<?php echo base_url();?>css/gppstyles.css" type="text/css" media="screen, projection" />
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(function() {
                    $( "#autocomplete" ).autocomplete({
                        source: function(request, response) {
                            $.ajax({ url: "<?php echo site_url('autocomplete/suggestions'); ?>",
                            data: { term: $("#autocomplete").val()},
                            dataType: "json",
                            type: "POST",
                            success: function(data){
                                response(data);
                            }
                        });
                            },
                           minLength: 2
                        });
                });
            });
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
     <a <?php if ($thispage=="Plant Lists")
      echo " id=\"currentpage\""; ?> href="/plantlists">Plant Lists</a>
     
    <a <?php if ($thispage=="Resources")
      echo " id=\"currentpage\""; ?> href="/resources/">Resources</a>
    <a <?php if ($thispage=="Press")
      echo " id=\"currentpage\""; ?> href="/press/">Press</a>
    <a <?php if ($thispage=="Contact")
      echo " id=\"currentpage\""; ?> href="/contact/">Contact</a>
</div><!-- end navigation -->
        <div id="contents"><?php echo $contents ?></div><!-- end contents -->
         
        <div id="footer"><p>Text and photos &#169;<?php echo date("Y"); ?> Great Plant Picks except where otherwise noted</p></div><!-- end footer -->
       </div><!-- end wrapper -->
    </body>


</html>