<div id="breadcrumbs">

      <a <?php if ($this->uri->segment(2)=="search")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>plantlists/search/">Plant Lists/Search by Name</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="advanced")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>plantlists/advanced/">Advanced Search</a> &raquo; 
      <a <?php if ($this->uri->segment(2)=="plant_not_listed")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>plantlists/plant_not_listed/">Why Can&#8217;t I Find My Plant?</a>

</div><!-- end breadcrumbs -->