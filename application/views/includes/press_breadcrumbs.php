<div id="breadcrumbs">

      <a <?php if ($this->uri->segment(2)=="")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>press/">Press</a>  &raquo;
        <a <?php if ($this->uri->segment(2)=="news")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>press/news/">In The News</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="media")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>press/media/">Media Contacts</a>  &raquo;
    <a <?php if ($this->uri->segment(2)=="terms")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>press/terms/">Image &amp; Logo Use Guidelines</a>

</div><!-- end breadcrumbs -->