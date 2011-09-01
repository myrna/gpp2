<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <h4>Find Your Plant</h4>
    <div class="simplesearch">
    <?php
    echo form_open('plantlists', $attributes); ?>
   
    <input type="text" name="searchterms" id="searchterms" value="<?php echo $query; ?>">
     <input type="submit" value="Search">
    </div>
    <p><?php echo anchor('plantlists/','View All Plants','title="View All Plants"') ?></p>
    <p><?php echo anchor('plantlists/advanced/','Advanced Search','title="Advanced Search"') ?></p>
    <h4>Popular Searches</h4>
    <ul>
                  <li>2010 Great Plant Picks</li> <!-- link to URL of search result? -->

    </ul>
   
</div><!-- end content -->
