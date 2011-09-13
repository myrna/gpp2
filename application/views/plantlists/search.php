<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <h4>Find Your Plant</h4>
    <p class="flash"><?php echo $this->session->flashdata('message'); ?></p>
    <div class="simplesearch">
    <?php
    $attributes = array('class' => 'searchform');
    echo form_open('plantlists', $attributes); ?>
   <p>Search by plant name: 
    <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
     <input type="submit" value="Search"></p>
    </div><!-- end searchform -->
    <p><?php echo anchor('plantlists/','View All Plants','title="View All Plants"') ?></p>
    <p><?php echo anchor('plantlists/advanced/','Advanced Search','title="Advanced Search"') ?></p>
    <h4>Popular Searches</h4>
    <ul>
                  <li>2010 Great Plant Picks</li> <!-- link to URL of search result? -->

    </ul>
   
</div><!-- end content -->
