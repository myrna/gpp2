<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <?php $this->load->view('includes/plantlists_breadcrumbs'); ?>
    <h2>Find Your Great Plant Pick</h2>
        <?php echo $this->session->flashdata('message'); ?>
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
  <li><em><?php echo anchor('plantlists/advanced/','To Refine Your Search, Go To Advanced Search Options','title="To Refine Your Search, Go To Advanced Search Options"') ?></em></li>
    </ul>
    <h4>Browse the GPP Plant Lists</h4>
    <div class="col1-3">
  <p class="listhead">Great Plant Picks by Type</p>
          <ul>
                 <li><?php echo anchor("plantlists/by_publish/yes","View All Great Plant Picks"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/bamboo", "All Bamboos"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/bulb", "All Bulbs"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/conifer", "All Conifers"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/fern", "All Ferns"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/grass", "All Grasses"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/perennial", "All Perennials"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/shrub", "All Shrubs"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/tree", "All Trees"); ?></li>
                 <li><?php echo anchor("plantlists/by_plant_type/vine", "All Vines"); ?></li>
         </ul>
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
        
         
    </div><!-- end column 1 -->
    <div class="col1-3">
     <p class="listnote">Made in the Shade&#8212;Plants for Shade</p>
     <p class="listsub"><?php echo anchor("resources/glossary", "Shade Guidelines and Definitions"); ?></p>
         <ul>
                <li><?php echo anchor("plantlists/by_theme/shade", "All Made in the Shade Selections"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/bulb", "Bulbs for Shade"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/conifer", "Conifers for Shade"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/grass", "Grasses for Shade"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/perennial", "Perennials for Shade"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/shrub", "Shrubs for Shade"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/tree", "Trees for Shade"); ?></li>
                 <li><?php echo anchor("plantlists/shade_type/light_shade", "Plants for Light Shade"); ?></li>
                  <li><?php echo anchor("plantlists/shade_type/open_shade", "Plants for Open Shade"); ?></li>
                 <li><?php echo anchor("plantlists/shade_type/dappled_shade", "Plants for Dappled Shade"); ?></li>
                 <li><?php echo anchor("plantlists/shade_type/deep_shade", "Plants for Deep Shade"); ?></li>
                 <li><?php echo anchor("plantlists/dry_shade", "Plants for Dry Shade"); ?></li>
         </ul>
     <p class="listhead">Fantastic Foliage&#8212;Plants with Striking Foliage</p>
         <ul>
                <li><?php echo anchor("plantlists/by_theme/foliage", "All Fantastic Foliage Selections"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage/bold", "Bold Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage/shiny", "Shiny Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage/unique", "Unique Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage/fine", "Fine Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage_color/burgundy", "Burgundy Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage_color/gold", "Gold Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage_color/purple", "Purple Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage_color/silver", "Silver Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/fantastic_foliage_color/white", "White Foliage"); ?></li>
         </ul>
     
       
           
    </div><!-- end column 2 -->
    <div class="col2-3">
   <p class="listnote">Fun in the Sun&#8212;Drought Tolerant Plants for Sun</p>
    <p class="listsub"><?php echo anchor("resources/glossary", "Watering Guidelines and Definitions"); ?></p>
        <ul>
                 <li><?php echo anchor("plantlists/by_theme/sun_drought", "All Fun in the Sun Selections"); ?></li>
                 <li><?php echo anchor("plantlists/fun_in_the_sun/bulb", "Bulbs for Sun"); ?></li>
                 <li><?php echo anchor("plantlists/fun_in_the_sun/conifer", "Conifers for Sun"); ?></li>
                 <li><?php echo anchor("plantlists/fun_in_the_sun/grass", "Grasses for Sun"); ?></li>
                 <li><?php echo anchor("plantlists/fun_in_the_sun/perennial", "Perennials for Sun"); ?></li>
                 <li><?php echo anchor("plantlists/fun_in_the_sun/shrub", "Shrubs for Sun"); ?></li>
                 <li><?php echo anchor("plantlists/fun_in_the_sun/tree", "Trees for Sun"); ?></li>
                  <li><?php echo anchor("plantlists/fun_in_the_sun/vine", "Vines for Sun"); ?></li>
        </ul>
   <p class="listhead">Miscellaneous Lists</p>
   <ul>
                <li><?php echo anchor("plantlists/by_genus/clematis", "Clematis"); ?></li>
                <li><?php echo anchor("plantlists/by_design_use/containers", "Plants for Containers"); ?></li>
                <!--<li><?php echo anchor("plantlists/by_pest_resistance/deer", "Deer Resistant Plants"); ?></li>-->
                <li><?php echo anchor("plantlists/evergreen_azalea", "Evergreen Azaleas"); ?></li>
                <li><?php echo anchor("plantlists/by_genus/rhododendron", "Rhododendrons"); ?></li>
                <li><?php echo anchor("plantlists/by_genus/rosa", "Roses"); ?></li>
                <li><?php echo anchor("plantlists/small_tree", "Small Trees (under 20')"); ?></li>
                <li><?php echo anchor("plantlists/nw_native/yes", "GPP Northwest Native Plants"); ?></li>
          </ul>
    </div><!-- end column 3 -->

    <div class="clear"></div>
</div><!-- end content -->
