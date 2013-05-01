<!-- PUBLIC plantlists and search page -->

<div id="content" class="advsearch">
 <?php

    echo "<h2>Administrative Search and Queries</h2>";
    echo $this->session->flashdata('message');
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
        <input type="radio" name="zone_low_max" value="8">8
        <input type="radio" name="zone_low_max" value="9">9</p>
        </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Theme:','theme'); ?></p>
        <p class="radios">
        <input type="radio" name="theme" value="foliage">Foliage: 2010
        <input type="radio" name="theme" value="sun_drought">Sun &amp; Drought Tolerant: 2011</p>
        <p class="radios">
        <input type="radio" name="theme" value="shade">Made in the Shade: 2012
        <input type="radio" name="theme" value="small_urban">Small Gardens/Urban: 2013</p>
        <p class="radios">
        <input type="radio" name="theme" value="fragrance">Fragrance: 2014
        <input type="radio" name="theme" value="summer_interest">Summer Interest: 2015</p>
        <p class="radios">
        <input type="radio" name="theme" value="autumn_interest">Autumn Interest: 2016
        <input type="radio" name="theme" value="winter_interest">Winter Interest: 2017</p>
        <p class="radios">
        <input type="radio" name="theme" value="spring_interest">Spring Interest: 2018
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
        <input type="radio" name="flower_time" value="early_winter">Early Winter
        <input type="radio" name="flower_time" value="winter">Winter
        <input type="radio" name="flower_time" value="late_winter">Late Winter</p>
         <p class="radios">
        <input type="radio" name="flower_time" value="late_winter_early_spring">Late Winter to Early Spring
         <input type="radio" name="flower_time" value="early_spring">Early Spring
         <input type="radio" name="flower_time" value="spring">Spring</p>
         <p class="radios">
         <input type="radio" name="flower_time" value="late_spring">Late Spring
         <input type="radio" name="flower_time" value="late_spring_early_summer">Late Spring to Early Summer
         <input type="radio" name="flower_time" value="early_summer">Early Summer</p>
         <p class="radios">
         <input type="radio" name="flower_time" value="summer">Summer
         <input type="radio" name="flower_time" value="late_summer">Late Summer
         <input type="radio" name="flower_time" value="late_summer_early_fall">Late Summer to Early Fall</p>
         <p class="radios">
        <input type="radio" name="flower_time" value="early_fall">Early Fall
        <input type="radio" name="flower_time" value="fall">Fall
        <input type="radio" name="flower_time" value="late_fall">Late Fall
        <input type="radio" name="flower_time" value="late_fall_early_winter">Late Fall to Early Winter
        </p>
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
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    </select>
 		Maximum: <select id="plant_height_at_10" type="text" name="plant_height_at_10">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                    <option value="60">60</option>
                    <option value="200">or larger</option>
                </select>
    </fieldset>
        <fieldset>
        <p class="searchlabel"><?php echo form_label('Plant Width (in feet):'); ?></p>
 		Minimum: <select id="plant_width_min" type="text" name="plant_width_min">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                </select>
 		Maximum: <select id="plant_width_at_10" type="text" name="plant_width_at_10">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="200">or more</option>
                </select>
    </fieldset>
        
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Growth Habit:','growth_habit'); ?></p>
        <p class="radios">
        <input type="radio" name="growth_habit" value="clumping">Clumping
        <input type="radio" name="growth_habit" value="columnar">Columnar
        <input type="radio" name="growth_habit" value="compact">Compact
        <input type="radio" name="growth_habit" value="mounding">Mounding
        <input type="radio" name="growth_habit" value="narrow">Narrow
        </p><p class="radios">
        <input type="radio" name="growth_habit" value="pyramidal">Pyramidal
        <input type="radio" name="growth_habit" value="round">Round
        <input type="radio" name="growth_habit" value="spreading">Spreading
        <input type="radio" name="growth_habit" value="upright">Upright
        <input type="radio" name="growth_habit" value="vase-shaped">Vase Shaped
        </p><p class="radios">
        <input type="radio" name="growth_habit" value="vining">Vining
        <input type="radio" name="growth_habit" value="weeping">Weeping</p>
    </fieldset>
        <fieldset>
        <p class="searchlabel"><?php echo form_label('Sun Requirements:','sun'); ?></p>
        <p class="radios">
        <input type="radio" name="sun" value="full_sun"><span class="tooltip">Full Sun<span class="classic">6 or more hours of sun</span></span>
        <input type="radio" name="sun" value="light_shade"><span class="tooltip">Light Shade<span class="classic">4 to 6 hours of sun</span></span>
        <input type="radio" name="sun" value="dappled_shade"><span class="tooltip">Dappled Shade<span class="classic">2 to 4 hours of sun under a canopy of trees</span></span></p>
            <p class="radios">
        <input type="radio" name="sun" value="open_shade"><span class="tooltip">Open Shade<span class="classic">Bright light, but no direct sun, no overhanging trees</span></span>
        <input type="radio" name="sun" value="deep_shade"><span class="tooltip">Deep Shade<span class="classic">No direct sun under a canopy of trees</span></span></p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Soil Type:','soil'); ?></p>
        <p class="radios">
        <input type="radio" name="soil" value="clay">Clay
        <input type="radio" name="soil" value="wet">Wet
        <input type="radio" name="soil" value="Moist">Moist
        <input type="radio" name="soil" value="dry">Dry
        <input type="radio" name="soil" value="sandy">Sandy</p>
        <p class="radios">
        <input type="radio" name="soil" value="well-drained">Well-Drained</p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Water Requirements:','water'); ?></p>
        <p class="radios">
        <input type="radio" name="water" value="moist"><span class="tooltip">Frequent Watering<span class="classic">Water two-three times per week during dry weather</span></span>
        <input type="radio" name="water" value="regular"><span class="tooltip">Regular Watering<span class="classic">Water once per week during dry weather</span></span>
        </p><p class="radios">
        <input type="radio" name="water" value="occasional"><span class="tooltip">Occasional Watering<span class="classic">Water every 10-14 days during dry weather</span></span>
        <input type="radio" name="water" value="drought-tolerant"><span class="tooltip">Drought Tolerant Once Established<span class="classic">Once established, water once per month</span></span>
        </p>
        </fieldset>
       <fieldset>
        <p class="searchlabel"><?php echo form_label('Wildlife Assocations:','wildlife'); ?></p>
        <p class="radios">
        <input type="radio" name="wildlife" value="bees">Bees
        <input type="radio" name="wildlife" value="birds">Birds
        <input type="radio" name="wildlife" value="butterflies">Butterflies
        <input type="radio" name="wildlife" value="hummingbirds">Hummingbirds</p>
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