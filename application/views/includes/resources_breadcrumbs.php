<div id="breadcrumbs">

      <a <?php if ($this->uri->segment(1)=="resources" && $this->uri->segment(2)=="")
      echo " id=\"current\""; ?> href="/resources/">Resources</a>  &raquo;
        <a <?php if ($this->uri->segment(1)=="nurserylist")
      echo " id=\"current\""; ?> href="/nurserylist/">Participating Nurseries</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="links")
      echo " id=\"current\""; ?> href="/resources/links/">Helpful Links</a>  &raquo;
     <a <?php if ($this->uri->segment(2)=="glossary")
      echo " id=\"current\""; ?> href="/resources/glossary/">Glossary</a>
</div><!-- end breadcrumbs -->