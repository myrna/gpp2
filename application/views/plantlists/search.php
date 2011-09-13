<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <h2>Find Your Great Plant Pick</h2>
    <p class="flash"><?php echo $this->session->flashdata('message'); ?></p>
    <div class="simplesearch">
    <?php
    $attributes = array('class' => 'searchform');
    echo form_open('plantlists', $attributes); ?>
   <p>Search by plant name: 
    <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
     <input type="submit" value="Search"></p>
   <?php echo form_close(); ?>
    </div><!-- end searchform -->
    <p class="listhead"><?php echo anchor('plantlists/advanced/','Go To Advanced Search Options','title="Go To Advanced Search Options"') ?></p>
   
    <h4>Popular Searches</h4>
    <div class="leftcol">
    <dl class="lists">
        
         <dt>Drought-Tolerant Plants for Sun</dt>
                 <dd>Perennials &#38; Bulbs</dd>
                 <dd>Shrubs &#38; Vines</dd>
                 <dd>Trees &#38; Conifers</dd>
         <dt>Fantastic Foliage Plants</dt>
                 <dd>Bold Foliage</dd>
                 <dd>Shiny Foliage</dd>
                 <dd>Unique Foliage</dd>
                 <dd>Fine Foliage</dd>
    </dl>
    </div><!-- end left column -->
    <div class="rightcol">
         <p class="listhead"><a href="/plantlists/">All Great Plant Picks</a></p>
        <p class="listhead">Great Plant Picks by Year</p>
        
        <div class="firstcol">
            <ul class="lists">
                  <li>2001</li> <!-- link to URL of search result? -->
                  <li>2002</li>
                  <li>2003</li>
                  <li>2004</li>
                  <li>2005</li>
                  <li>2006</li>
            </ul>
        </div><div class="secondcol">
            <ul>
                  <li>2007</li>
                  <li>2008</li>
                  <li>2009</li>
                  <li>2010</li>
                  <li>2011</li>
                  <li>2012</li>
            </ul>
        </div>
        
    </div><!-- end right column -->
    <div class="clear"></div>
</div><!-- end content -->
