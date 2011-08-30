<!-- PUBLIC plantlists and search page -->

<div id="content" class="admin">
    <h4>Advanced Search</h4>
    
    <div class="simplesearch">
        <p>Search by plant name</p>
    <?php echo form_open('plantlists', $attributes); ?>
    <input type="submit" value="Search">
    <input type="text" name="searchterms" id="searchterms" value="<?php echo $query; ?>">
    <?php echo form_close(); ?>
    </div>
    <h4>Search by plant attributes (select those that apply):</h4>
     <?php
    $attributes = array('class' => 'data-entry');
    echo form_open('plantlists/advancedsearch', $attributes); ?>
    
    <fieldset>
      
        <p class="searchlabel"><?php echo form_label('Plant Type:','plant_type'); ?></p>
        <input type="radio" name="plant_type" value="bulb">Bulb
        <input type="radio" name="plant_type" value="conifer">Conifer
        <input type="radio" name="plant_type" value="perennial">Perennial
        <input type="radio" name="plant_type" value="shrub">Shrub
        <input type="radio" name="plant_type" value="tree">Tree
        <input type="radio" name="plant_type" value="vine">Vine
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Foliage Type:','foliage_type'); ?></p>
        <input type="radio" name="foliage_type" value="deciduous">Deciduous
        <input type="radio" name="foliage_type" value="evergreen">Evergreen
        <input type="radio" name="foliage_type" value="semi-evergreen">Semi-Evergreen
    </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Mature Plant Height:','plant_height_max'); ?></p>
        <?php echo form_dropdown('height_comparison',
				array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<') ,
				set_value('height_comparison'), 'id="height_comparison"'); ?>
	<?php echo form_input('plant_height_max', set_value('plant_height_max'), 'id="plant_height_max"'); ?>
        <!-- this does not really work, it needs to be a range, ie less than 5 ft., 5-10 ft., etc., not sure the best
        way to go about that?... -->
    </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Growth Habit:','growth_habit'); ?></p>
        <input type="radio" name="growth_habit" value="columnar">Columnar
        <input type="radio" name="growth_habit" value="compact">Compact
        <input type="radio" name="growth_habit" value="mounding">Mounding
        <input type="radio" name="growth_habit" value="narrow">Narrow
        <input type="radio" name="growth_habit" value="pyramidal">Pyramidal
        <input type="radio" name="growth_habit" value="round">Round
        <input type="radio" name="growth_habit" value="spreading">Spreading
        <input type="radio" name="growth_habit" value="upright">Upright
        <input type="radio" name="growth_habit" value="weeping">Weeping
    </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Flower Time:','flower_time'); ?></p>
        <input type="radio" name="flower_time" value="winter">Winter
        <input type="radio" name="flower_time" value="winter-spring">Winter-Spring
        <input type="radio" name="flower_time" value="spring">Spring
        <input type="radio" name="flower_time" value="spring-summer">Spring-Summer
        <input type="radio" name="flower_time" value="summer">Summer
        <input type="radio" name="flower_time" value="summer-fall">Summer-Fall
        <input type="radio" name="flower_time" value="fall">Fall
    </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('Flower Color:','flower_color'); ?></p>
        <p class="radios"><input type="radio" name="flower_color" value="black">Black
        <input type="radio" name="flower_color" value="blue">Blue
        <input type="radio" name="flower_color" value="brown">Brown
        <input type="radio" name="flower_color" value="cream">Cream
        <input type="radio" name="flower_color" value="green">Green
        <input type="radio" name="flower_color" value="lavender">Lavender
        <input type="radio" name="flower_color" value="orange">Orange
        <input type="radio" name="flower_color" value="pink">Pink
        <input type="radio" name="flower_color" value="purple">Purple
        <input type="radio" name="flower_color" value="red">Red
        <input type="radio" name="flower_color" value="rose">Rose
        <input type="radio" name="flower_color" value="violet">Violet</p>
        <p class="radios"><input type="radio" name="flower_color" value="white">White
        <input type="radio" name="flower_color" value="yellow">Yellow</p>
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Foliage Color:','foliage_color'); ?></p>
        <p class="radios"><input type="radio" name="foliage_color" value="black">Black
        <input type="radio" name="foliage_color" value="blue">Blue
        <input type="radio" name="foliage_color" value="bronze">Bronze
        <input type="radio" name="foliage_color" value="burgundy">Burgundy
        <input type="radio" name="foliage_color" value="chartreuse">Chartreuse
        <input type="radio" name="foliage_color" value="dark green">Dark Green
        <input type="radio" name="foliage_color" value="gold">Gold
        <input type="radio" name="foliage_color" value="green">Green
        <input type="radio" name="foliage_color" value="purple">Purple
        <input type="radio" name="foliage_color" value="red">Red</p>
        <p class="radios"><input type="radio" name="foliage_color" value="silver">Silver
        <input type="radio" name="foliage_color" value="variegated">Variegated
        <input type="radio" name="foliage_color" value="white">White</p>
        </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Sun Requirements:','sun'); ?></p>
        <input type="radio" name="sun" value="full sun"><a class="tooltip" href="#">Full Sun<span class="classic">Full sun from morning to evening</span></a>
        <input type="radio" name="sun" value="part shade">Part Shade
        <input type="radio" name="sun" value="dappled shade">Dappled Shade
        <input type="radio" name="sun" value="open shade">Open Shade
        <input type="radio" name="sun" value="heavy shade">Heavy Shade
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Soil Requirements:','soil'); ?></p>
        <input type="radio" name="soil" value="heavy clay">Heavy Clay
        <input type="radio" name="soil" value="clay">Clay
        <input type="radio" name="soil" value="fertile">Fertile
        <input type="radio" name="soil" value="humus-rich">Humus-Rich
        <input type="radio" name="soil" value="sandy">Sandy
        <input type="radio" name="soil" value="well-drained">Well-Drained
        <input type="radio" name="soil" value="any-soil">Any
    </fieldset>
    <fieldset>
        <p class="searchlabel"><?php echo form_label('Water Requirements:','water'); ?></p>
        <input type="radio" name="water" value="bog">Bog
        <input type="radio" name="water" value="moist">Moist
        <input type="radio" name="water" value="winter-wet/summer-dry">Winter-Wet/Summer-Dry
        <input type="radio" name="water" value="drought-tolerant">Drought Tolerant
        <input type="radio" name="water" value="average">Average
        <input type="radio" name="water" value="any-water">Any
        </fieldset>
     <fieldset>
        <p class="searchlabel"><?php echo form_label('GPP Year:','gpp_year'); ?></p>
        <input type="radio" name="gpp_year" value="2001">2001
        </fieldset>
    <div>
        <input type="submit" class="find" value="Find My Plant">
    </div>

    <?php echo form_close() ?>
    <div class="clear"></div>
</div>