<div id="breadcrumbs">

      <a <?php if ($this->uri->segment(1)=="resources" && $this->uri->segment(2)=="")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>resources/">Resources</a>  &raquo;
        <a <?php if ($this->uri->segment(1)=="nurserylist")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>nurserylist/">Participating Nurseries</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="links")
             echo " id=\"current\""; ?> href="<?php echo base_url();?>resources/links/">Helpful Links &amp; Resources</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="glossary")
      echo " id=\"current\""; ?> href="<?php echo base_url();?>resources/glossary/">Glossary of Common Terms</a>
</div><!-- end breadcrumbs -->