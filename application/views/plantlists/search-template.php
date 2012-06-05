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
  <li><em><?php echo anchor('plantlists/advanced/','Go To Advanced Search Options','title="Go To Advanced Search Options"') ?></em></li>
  <li>this is a giant hassle without GET support...
      <form action="plantlists/advanced_search" method="post">
      <input type="hidden" name="common_name" value="black bamboo"/>
      <input type="submit" value="Black Bamboo" class="text-button" />
      </form>
    </li>
    <li>
        <form action="plantlists/advanced_search" method="post">
            <input type="hidden" name="plant_type" value="shrub" />
            <input type="hidden" name="sun" value="full sun" />
            <input type="hidden" name="foliage_color" value="blue"/>
            <input type="submit" value="full sun shrubs" class="text-button"/>
        </form>
    </li>
    <li>
        <form action="plantlists/advanced_search" method="post">
            <input type="hidden" name="common_name" value="purple-leaf grape vine" />
            <input type="submit" value="grape vine" class="text-button"/>
        </form>
    </li>
      <li>
        <form action="plantlists/advanced_search" method="post">
            <input type="hidden" name="common_name" value="evergreen azalea" />
            <input type="submit" value="evergreen azalea" class="text-button"/>
        </form>
    </li>
    
      
    </ul>
    <h4>Browse the GPP Plant Lists</h4>
    <div class="col1-3">
  <p class="listhead"><?php echo anchor("plantlists/by_publish/yes","All Great Plant Picks &#8211; Alphabetized"); ?></p>
          <ul>
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
         <ul>
                <li><?php echo anchor("plantlists/by_genus/clematis", "Clematis"); ?></li>
                <li><?php echo anchor("plantlists/by_design_use/containers", "Containers"); ?></li>
                <li><?php echo anchor("plantlists/by_pest_resistance/deer", "Deer Resistant"); ?></li>
                <li><?php echo anchor("plantlists/evergreen_azalea", "Evergreen Azalea"); ?></li>
                <li><?php echo anchor("plantlists/by_genus/rhododendron", "Rhododendrons"); ?></li>
                <li><?php echo anchor("plantlists/by_genus/rosa", "Roses"); ?></li>
                <li><?php echo anchor("plantlists/small_tree", "Small Trees (under 20')"); ?></li>
          </ul>
         
    </div><!-- end column 1 -->
    <div class="col1-3">
     <p class="listhead">Made in the Shade&#8212;Plants for Shade</p>
         <ul>
                 <li><?php echo anchor("plantlists/by_theme/shade", "View All"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/bulb", "Bulbs"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/conifer", "Conifers"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/grass", "Grasses"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/perennial", "Perennials"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/shrub", "Shrubs"); ?></li>
                 <li><?php echo anchor("plantlists/made_in_the_shade/tree", "Trees"); ?></li>
                 <li><?php echo anchor("plantlists/light_shade", "Light Shade"); ?></li>
                  <li><?php echo anchor("plantlists/open_shade", "Open Shade"); ?></li>
                 <li><?php echo anchor("plantlists/dappled_shade", "Dappled Shade"); ?></li>
                 <li><?php echo anchor("plantlists/deep_shade", "Deep Shade"); ?></li>
                 <li><?php echo anchor("plantlists/dry_shade", "Dry Shade"); ?></li>
         </ul>
     <p class="listhead">Fantastic Foliage Plants</p>
         <ul>
                 <li><?php echo anchor("plantlists/by_texture/bold", "Bold Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/by_texture/shiny", "Shiny Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/by_texture/unique", "Unique Foliage"); ?></li>
                 <li><?php echo anchor("plantlists/by_texture/fine", "Fine Foliage"); ?></li>
         </ul>
     
       
           
    </div><!-- end column 2 -->
    <div class="col2-3">
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
        
    </div><!-- end column 3 -->

    <div class="clear"></div>
</div><!-- end content -->
