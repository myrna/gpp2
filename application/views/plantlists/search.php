<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <h2>Find Your Great Plant Pick</h2>
    <p class="flash"><?php echo $this->session->flashdata('message'); ?></p>
    <div class="simplesearch">
    <?php
     	$attributes = array('class' => 'searchform');
      	echo form_open('plantlists', $attributes); 
	?>
   <p>Search by plant name: 
    <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
     <input type="submit" value="Search"></p>
   <?php echo form_close(); ?>
    </div><!-- end searchform -->
    <ul class="leaf">
  <li><em><?php echo anchor('plantlists/advanced/','Go To Advanced Search Options','title="Go To Advanced Search Options"') ?></em></li>
    </ul>
    <h4>Popular Searches</h4>
    <div class="col1-3">
  <p class="listhead">Drought-Tolerant Plants for Sun</p>
          <ul>
                 <li><?php echo anchor("plantlists/by_plant_type/perennial|bulb", "Perennials &#38; Bulbs"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/shrub|vine", "Shrubs &#38; Vines"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/tree|conifer", "Trees &#38; Conifers"); ?></li>
         </ul>
          <p class="listhead">Fantastic Foliage Plants</p>
         <ul>
                 <li><?php echo anchor("plantlists/by_texture/bold", "Bold Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/by_texture/shiny", "Shiny Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/by_texture/unique", "Unique Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/by_texture/fine", "Fine Foliage"); ?></li>
         </ul>
    </div><!-- end column 1 -->
    <div class="col1-3">
        <p class="listhead"><?php echo anchor("plantlists/by_publish/yes","View All Great Plant Picks"); ?></p>
        <p class="listhead">Great Plant Picks by Year</p>
       
            <ul class="col1">
                  <li><?php echo anchor("plantlists/by_year/2001","2001"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2002","2002"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2003","2003"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2004","2004"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2005","2005"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2006","2006"); ?></li>
            </ul>
      
            <ul class="col1">
                  <li><?php echo anchor("plantlists/by_year/2007","2007"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2008","2008"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2009","2009"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2010","2010"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2011","2011"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2012","2012"); ?></li>
            </ul>
           
    </div><!-- end column 2 -->
    <div class="col2-3">
         <p class="listhead">More pre-programmed searches here</p>
        
    </div><!-- end column 3 -->

    <div class="clear"></div>
</div><!-- end content -->
