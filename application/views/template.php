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
        <a <?php if ($thispage=="About GPP")
      echo " id=\"currentpage\""; ?> href="/about/">About GPP</a> 
     <a <?php if ($thispage=="Plant Lists")
      echo " id=\"currentpage\""; ?> href="/listplants/display/">Plant Lists</a> 
     <a <?php if ($thispage=="Nursery Directory")
      echo " id=\"currentpage\""; ?> href="/nursery_list/">Nurseries</a> 
     <a <?php if ($thispage=="Database Administration")
      echo " id=\"currentpage\""; ?> href="/admin/">Database Administration</a> 
</div>
        <div id="contents"><?php echo $contents ?></div>
         
        <div id="footer"><p>Text and photos &#169;<?php echo date("Y"); ?> Great Plant Picks except where otherwise noted</p></div>
       </div><!-- end wrapper -->
    </body>


</html>