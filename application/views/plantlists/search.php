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
    <div class="leftcol">
    <dl class="lists">
        
         <dt>Drought-Tolerant Plants for Sun</dt>
                 <dd><?php echo anchor("plantlists/by_plant_type/perennial|bulb", "Perennials &#38; Bulbs"); ?></dd>
                 <dd><?php echo anchor("plantlists/by_plant_type/shrub|vine", "Shrubs &#38; Vines"); ?></dd>
                 <dd><?php echo anchor("plantlists/by_plant_type/tree|conifer", "Trees &#38; Conifers"); ?></dd>
         <dt>Fantastic Foliage Plants</dt>
                 <dd><?php echo anchor("plantlists/by_texture/bold", "Bold Foliage"); ?></dd>
                 <dd><?php echo anchor("plantlists/by_texture/shiny", "Shiny Foliage"); ?></dd>
                 <dd><?php echo anchor("plantlists/by_texture/unique", "Unique Foliage"); ?></dd>
                 <dd><?php echo anchor("plantlists/by_texture/fine", "Fine Foliage"); ?></dd>
    </dl>
    </div><!-- end left column -->
    <div class="rightcol">
         <p class="listhead"><a href="/plantlists/">All Great Plant Picks</a></p>
        <p class="listhead">Great Plant Picks by Year</p>
        
        <div class="firstcol">
            <ul class="lists">
                  <li><?php echo anchor("plantlists/by_year/2001","2001"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2002","2002"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2003","2003"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2004","2004"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2005","2005"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2006","2006"); ?></li>
            </ul>
        </div><div class="secondcol">
            <ul>
                  <li><?php echo anchor("plantlists/by_year/2007","2007"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2008","2008"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2009","2009"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2010","2010"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2011","2011"); ?></li>
                  <li><?php echo anchor("plantlists/by_year/2012","2012"); ?></li>
            </ul>
        </div>
        
    </div><!-- end right column -->
    <div class="clear"></div>
</div><!-- end content -->
