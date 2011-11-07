<!-- PUBLIC plantlists and search page -->

<div id="content" class="advsearch">
 <?php

    echo "<h2>Administrative Search and Queries</h2>";
    echo "<p class='flash'>" . $this->session->flashdata('status') . "</p>";
    echo "<p class='nav'>".anchor('admin/admin_search', 'Refresh search')."</p>";
  ?>
    
   <h5>Custom query (select applicable attributes):</h5>
   
    
     <?php
    $attributes = array('class' => 'adv-search');
    echo form_open('admin/admin_search/admin_query', $attributes); ?>
        <div class="col1">
    <fieldset>

        <p class="searchlabel"><?php echo form_label('Plant Type:','plant_type'); ?></p>
        <p class="radios">
        <input type="radio" name="plant_type" value="bamboo">Bamboo
        <input type="radio" name="plant_type" value="bulb">Bulb
        <input type="radio" name="plant_type" value="conifer">Conifer
        <input type="radio" name="plant_type" value="fern">Fern
        <input type="radio" name="plant_type" value="grass">Grass</p>
        <p class="radios">
        <input type="radio" name="plant_type" value="perennial">Perennial
        <input type="radio" name="plant_type" value="shrub">Shrub
        <input type="radio" name="plant_type" value="tree">Tree
        <input type="radio" name="plant_type" value="vine">Vine</p>
    </fieldset>
            <fieldset>
        <p class="searchlabel"><?php echo form_label('Hardy to (USDA zone minimum):','zone_low'); ?></p>
 		<p class="radios">
        <input type="radio" name="zone_low_max" value="3">3
        <input type="radio" name="zone_low_max" value="4">4
        <input type="radio" name="zone_low_max" value="5">5
        <input type="radio" name="zone_low_max" value="6">6
        <input type="radio" name="zone_low_max" value="7">7
        <input type="radio" name="zone_low_max" value="8">8</p>
        </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Theme:','theme'); ?></p>
        <p class="radios">
        <input type="radio" name="theme" value="foliage">Foliage: 2010
        <input type="radio" name="theme" value="sun drought">Sun &amp; Drought Tolerant: 2011</p>
        <p class="radios">
        <input type="radio" name="theme" value="shade">Made in the Shade: 2012
        <input type="radio" name="theme" value="small urban">Small Gardens/Urban: 2013</p>
        <p class="radios">
        <input type="radio" name="theme" value="fragrance">Fragrance: 2014
        <input type="radio" name="theme" value="summer interest">Summer Interest: 2015</p>
        <p class="radios">
        <input type="radio" name="theme" value="autumn interest">Autumn Interest: 2016
        <input type="radio" name="theme" value="winter interest">Winter Interest: 2017</p>
        <p class="radios">
        <input type="radio" name="theme" value="spring interest">Spring Interest: 2018
        </p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Foliage Type:','foliage_type'); ?></p>
        <p class="radios">
        <input type="radio" name="foliage_type" value="deciduous">Deciduous
        <input type="radio" name="foliage_type" value="evergreen">Evergreen
        <input type="radio" name="foliage_type" value="semi-evergreen">Semi-Evergreen</p>
    </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Foliage Color:','foliage_color'); ?></p>
        <p class="radios"><input type="radio" name="foliage_color" value="black">Black
        <input type="radio" name="foliage_color" value="blue">Blue
        <input type="radio" name="foliage_color" value="bronze">Bronze
        <input type="radio" name="foliage_color" value="burgundy">Burgundy
        <input type="radio" name="foliage_color" value="chartreuse">Chartreuse
        </p><p class="radios">
        <input type="radio" name="foliage_color" value="dark green">Dark Green
        <input type="radio" name="foliage_color" value="gold">Gold
        <input type="radio" name="foliage_color" value="green">Green
        <input type="radio" name="foliage_color" value="purple">Purple
        <input type="radio" name="foliage_color" value="red">Red
        <input type="radio" name="foliage_color" value="silver">Silver
        </p><p class="radios">
        <input type="radio" name="foliage_color" value="variegated">Variegated
        <input type="radio" name="foliage_color" value="white">White</p>
        </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Flower Time:','flower_time'); ?></p>
        <p class="radios">
        <input type="radio" name="flower_time" value="winter">Winter
        <input type="radio" name="flower_time" value="winter-spring">Winter-Spring
        <input type="radio" name="flower_time" value="spring">Spring</p>
         <p class="radios">
        <input type="radio" name="flower_time" value="spring-summer">Spring-Summer
        <input type="radio" name="flower_time" value="summer">Summer
        <input type="radio" name="flower_time" value="summer-fall">Summer-Fall
        <input type="radio" name="flower_time" value="fall">Fall</p>
    </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Flower Color:','flower_color'); ?></p>
        <p class="radios"><input type="radio" name="flower_color" value="black">Black
        <input type="radio" name="flower_color" value="blue">Blue
        <input type="radio" name="flower_color" value="brown">Brown
        <input type="radio" name="flower_color" value="cream">Cream
        <input type="radio" name="flower_color" value="green">Green
        <input type="radio" name="flower_color" value="lavender">Lavender
        </p>
        <p class="radios">
        <input type="radio" name="flower_color" value="orange">Orange        
        <input type="radio" name="flower_color" value="pink">Pink
        <input type="radio" name="flower_color" value="purple">Purple
        <input type="radio" name="flower_color" value="red">Red
        <input type="radio" name="flower_color" value="rose">Rose
        <input type="radio" name="flower_color" value="violet">Violet
        <input type="radio" name="flower_color" value="white">White
        </p>
        <p class="radios">
        <input type="radio" name="flower_color" value="yellow">Yellow</p>
    </fieldset>
    </div> 
    <div class="col2">
        <fieldset>
        <p class="searchlabel"><?php echo form_label('Plant Height (in feet):'); ?></p>
 		Minimum: <select id="plant_height_min" type="text" name="plant_height_min">
                     <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    </select>
 		Maximum: <select id="plant_height_at_10" type="text" name="plant_height_at_10">
                    <option value=""></option>
                     <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="25">100</option>
                </select>
    </fieldset>
        <fieldset>
        <p class="searchlabel"><?php echo form_label('Plant Width (in feet):'); ?></p>
 		Minimum: <select id="plant_width_min" type="text" name="plant_width_min">
                     <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
 		Maximum: <select id="plant_width_at_10" type="text" name="plant_width_at_10">
                    <option value=""></option>
                     <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
    </fieldset>
        
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Growth Habit:','growth_habit'); ?></p>
        <p class="radios">
        <input type="radio" name="growth_habit" value="columnar">Columnar
        <input type="radio" name="growth_habit" value="compact">Compact
        <input type="radio" name="growth_habit" value="mounding">Mounding
        <input type="radio" name="growth_habit" value="narrow">Narrow
        <input type="radio" name="growth_habit" value="pyramidal">Pyramidal</p>
        <p class="radios">
        <input type="radio" name="growth_habit" value="round">Round
        <input type="radio" name="growth_habit" value="spreading">Spreading
        <input type="radio" name="growth_habit" value="upright">Upright
        <input type="radio" name="growth_habit" value="weeping">Weeping</p>
    </fieldset>
        <fieldset>
        <p class="searchlabel"><?php echo form_label('Sun Requirements:','sun'); ?></p>
        <p class="radios">
        <input type="radio" name="sun" value="full sun"><a class="tooltip" href="#">Full Sun
            <span class="classic">Full sun from morning to evening</span></a>
        <input type="radio" name="sun" value="part shade">Part Shade
        <input type="radio" name="sun" value="dappled shade">Dappled Shade
        <input type="radio" name="sun" value="open shade">Open Shade</p>
        <p class="radios">
        <input type="radio" name="sun" value="heavy shade">Heavy Shade</p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Soil Requirements:','soil'); ?></p>
        <p class="radios">
        <input type="radio" name="soil" value="heavy clay">Heavy Clay
        <input type="radio" name="soil" value="clay">Clay
        <input type="radio" name="soil" value="fertile">Fertile
        <input type="radio" name="soil" value="humus-rich">Humus-Rich
        <input type="radio" name="soil" value="sandy">Sandy</p>
        <p class="radios">
        <input type="radio" name="soil" value="well-drained">Well-Drained
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Water Requirements:','water'); ?></p>
        <p class="radios">
        <input type="radio" name="water" value="bog">Bog
        <input type="radio" name="water" value="moist">Moist
        <input type="radio" name="water" value="winter-wet/summer-dry">Winter-Wet/Summer-Dry</p>
        <p class="radios">
        <input type="radio" name="water" value="drought-tolerant">Drought Tolerant
        <input type="radio" name="water" value="average">Average</p>
        </fieldset>
      <fieldset>
        <p class="searchlabel"><?php echo form_label('Committee:','committee'); ?></p>
        <p class="radios">
        <input type="radio" name="committee" value="perennials - bulbs">Perennials &amp; Bulbs
        <input type="radio" name="committee" value="shrubs - vines">Shrubs &amp; Vines
        <input type="radio" name="committee" value="trees - conifers">Trees &amp; Conifers</p>

        </fieldset>
       </div>
   
 
    
      
    <div class="searchcenter">
          <input type="submit" value="Submit Query">
    </div>
    <?php echo form_close() ?>
   
</div>