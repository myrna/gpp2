<!-- PUBLIC plantlists and search page -->

<div id="content" class="advsearch">
    <?php $this->load->view('includes/plantlists_breadcrumbs'); ?>
    <h2>Great Plant Picks Advanced Search</h2>
    <?php echo $this->session->flashdata('message'); ?>
   <!-- <div class="simplesearch adv">
      <?php $attributes = array('class' => 'searchform');
    echo form_open('plantlists', $attributes); ?>
    <p>Search by plant name:
     <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
    <input type="submit" value="Search"></p>
   
    <?php echo form_close(); ?>
 
    </div>--><!-- end simplesearch -->
       
    <h5>Search by plant attributes (select those that apply):</h5>
   
    
     <?php
    $attributes = array('class' => 'adv-search');
    echo form_open('plantlists/advanced_search', $attributes); ?>
    <div class="searchcenter">
          <input type="submit" value="Find My Plant">
    </div>
        <div class="col1">
    <fieldset>

        <p class="searchlabel"><?php echo form_label('I\'m looking for a:','plant_type'); ?></p>
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
        <p class="adsearch">USDA Zones 7 and 8 generally cover the maritime Pacific Northwest.</p>
 		<p class="radios">
        <input type="radio" name="zone_low_max" value="3"><a class="tooltip" href="#">zone 3<span class="classic">-40&#176;F to -30&#176;F</span></a>
        <input type="radio" name="zone_low_max" value="4"><a class="tooltip" href="#">zone 4<span class="classic">-30&#176;F to -20&#176;F</span></a>
        <input type="radio" name="zone_low_max" value="5"><a class="tooltip" href="#">zone 5<span class="classic">-20&#176;F to -10&#176;F</span></a>
        <input type="radio" name="zone_low_max" value="6"><a class="tooltip" href="#">zone 6<span class="classic">-10&#176;F to 0&#176;F</span></a>
        <input type="radio" name="zone_low_max" value="7"><a class="tooltip" href="#">zone 7<span class="classic">0&#176;F to 10&#176;F</span></a>
        <input type="radio" name="zone_low_max" value="8"><a class="tooltip" href="#">zone 8<span class="classic">10&#176;F to 20&#176;F</span></a></p>
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
        <input type="radio" name="growth_habit" value="vining">Vining
        <input type="radio" name="growth_habit" value="weeping">Weeping</p>
    </fieldset>
        <fieldset>
        <p class="searchlabel"><?php echo form_label('Sun Requirements:','sun'); ?></p>
        <p class="radios">
        <input type="radio" name="sun" value="full sun"><a class="tooltip" href="#">Full Sun<span class="classic">6 or more hours of sun</span></a>
        <input type="radio" name="sun" value="part shade"><a class="tooltip" href="#">Light Shade<span class="classic">4 to 6 hours of sun</span></a>
        <input type="radio" name="sun" value="dappled shade"><a class="tooltip" href="#">Dappled Shade<span class="classic">2 to 4 hours of sun
            under a canopy of trees</span></a></p>
            <p class="radios">
        <input type="radio" name="sun" value="open shade"><a class="tooltip" href="#">Open Shade<span class="classic">Bright light, but no direct sun</span></a>        
        <input type="radio" name="sun" value="heavy shade"><a class="tooltip" href="#">Heavy Shade<span class="classic">No direct sun
             under a canopy of trees</span></a></p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Soil Type:','soil'); ?></p>
        <p class="radios">
        <input type="radio" name="soil" value="heavy clay">Heavy Clay
        <input type="radio" name="soil" value="clay">Clay
        <input type="radio" name="soil" value="fertile">Fertile
        <input type="radio" name="soil" value="humus-rich">Humus-Rich
        <input type="radio" name="soil" value="sandy">Sandy</p>
        <p class="radios">
        <input type="radio" name="soil" value="well-drained">Well-Drained</p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Water Requirements:','water'); ?></p>
        <p class="radios">
        <input type="radio" name="water" value="moist"><a class="tooltip" href="#">Moist<span class="classic">Water two-three times per week during hot weather</span></a>
         <input type="radio" name="water" value="regular"><a class="tooltip" href="#">Regular<span class="classic">Water once per week during dry weather</span></a>
        <input type="radio" name="water" value="occasional"><a class="tooltip" href="#">Occasional<span class="classic">Water every 10-14 days during dry weather</span></a>
        <input type="radio" name="water" value="drought-tolerant"><a class="tooltip" href="#">Drought Tolerant<span class="classic">Once established, water once per month</span></a>
       </p>
        </fieldset>
       </div>
   
 
    
      
    <div class="searchcenter">
          <input type="submit" value="Find My Plant">
    </div>
    <?php echo form_close() ?>
   
</div>