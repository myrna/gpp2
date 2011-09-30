<div id="breadcrumbs">

      <a <?php if ($this->uri->segment(2)=="")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>about/">About GPP</a>  &raquo;
        <a <?php if ($this->uri->segment(2)=="criteria")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>about/criteria/">Selection Criteria</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="selection")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>about/committee/">Selection Committees</a>  &raquo;
    <a <?php if ($this->uri->segment(2)=="advisory")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>about/advisory/">Advisory Groups</a>  &raquo;
    <a <?php if ($this->uri->segment(2)=="staff")
        echo " id=\"current\""; ?> href="<?php echo base_url();?>about/staff/">GPP Staff</a>

</div><!-- end breadcrumbs -->