<?php
function display_full_botanical_name($record) {
    return sprintf("%s %s %s %s %s %s %s %s %s %s %s %s",
        $record['genus'] ? format_genus($record['genus'],$record['cross_genus']) : "",
        $record['cross_specific_epithet'] ? format_cross_specific_epithet($record['cross_specific_epithet']) : "",
        $record['specific_epithet'] ? format_species($record['specific_epithet'], $record['cross_species']) : "",
        $record['infraspecific_epithet'] ? format_subspecies($record['infraspecific_epithet_designator'], $record['infraspecific_epithet']) : "",
        $record['cultivar'] ? format_cultivar($record['cultivar']) : "",
        $record['trade_name'] ? format_trade_name($record['trade_name']) : "",
        $record['plant_breeders_rights'] ? format_breeders_rights() : "",
        $record['trademark_name'] ? format_trademark_name($record['trademark_name']) : "",
        $record['registered_name'] ? format_registered_name($record['registered_name']) : "",      
        $record['plant_patent_number'] ? format_patent_number($record['plant_patent_number']) : "",
        $record['plant_patent_number_applied_for'] ? "PPAF" : "",
        $record['plantname_group'] ? format_plantname_group($record['plantname_group']." Group") : ""
    );
}

function format_genus($genus, $genus_cross) {
    $genus_cross = $genus_cross ? "&#967; " : "";
    $genus = ucfirst($genus);
    return "<span class='crossgenus'>$genus_cross</span> <span class='genus'>$genus</span>";
}

function format_cross_specific_epithet() {
    return "&times;";
}

function format_species($species, $cross) {
    $cross = $cross ? "&times; $cross" : "";
    $species = strtolower($species);
    return "<span class='species'>$species</span> $cross";
}

function format_subspecies($designator, $spp) {
    $spp = strtolower($spp);
    $designator = strtolower($designator);
    return "<span class='subspecies'>$designator</span> <span class='designate'>$spp</span>";
}

function format_cultivar($cultivar) {
    $cultivar = "&#8216;" . $cultivar . "&#8217;";
    return "<span class='cultivar'>$cultivar</span>";
}

function format_trade_name($tradename) {    
    return "<span class='trade-name'>$tradename</span>";
}

function format_trademark_name($trademarkname) {
    $trademarkname = strtoupper($trademarkname);
    return "<span class='trademark-name'>$trademarkname &#8482;</span>";
}

function format_registered_name($registeredname) {
    $registeredname = strtoupper($registeredname);
    return "<span class='registered-name'>$registeredname</span><span class='super'>&#174;</span>";
}

function format_patent_number($number) {
    return "<span class='patent-number'>PP$number</span>";
}

function format_breeders_rights() {
    return "<span class='breeders-rights'>PBR</span>";
}

function format_plantname_group($name) {
    $name = ucwords($name);
    return "<span class='plantname-group'>$name</span>";
}

function convert_to_id($string) {
    $string = str_replace(" ", "_", $string);
    return $string;
}

function convert_to_label($field) {
    $field = str_replace("_", " ", $field);
    return ucwords($field);
}

function field_to_label($field) {
    switch ($field) {
        case 'family':
            return "Plant Family";
            break;
        case 'id':
            return "Plant ID";
            break;
        case 'cross_genus':
            return "&#935; Genus";
            break;
        case 'plant_patent_number_applied_for':
            return convert_to_label($field) . " (PPAF)";
            break;
        case 'plant_origin':
            return "Origin";
            break;
        case 'fruit_seedhead_attractive':
            return "Fruit/Seedhead Attractive";
            break;
        case 'division_pruning_group':
            return "Division or Pruning Group";
            break;
        case 'nominator':
            return "Nominated By";
            break;
        case 'eval_trial':
            return 'Plant Evaluation or Trial';
            break;
        case 'gpp_references':
            return "References/Name Validation";
            break;
        case 'native_to_gpp_region':
            return "Native to GPP Region";
            break;
        case 'gpp_history':
            return "GPP History";
            break;
        case 'gpp_year':
            return "GPP Year";
            break;
        default:
            return convert_to_label($field);
            break;
    }
}
    
function build_form_control($key, $value) {
    // The options arrays should map to the SETs defined in the plant_data table.
    // These can be dynamically generated, but it's a hassle...
    $attributes = array(
        'id' => $key,
        'name' => $key,
        'value' => $value ? $value : "",
    );
    switch ($key) {
         case 'plant_breeders_rights':
            $current = $value ? $value : '';
            $options = array('' => "", 'Yes' => "Yes");
            return form_dropdown('plant_breeders_rights', $options, $current, "id='$key'");
            break;
        case 'cross_specific_epithet':
            $current = $value ? $value : '';
            $options = array('' => "", 'Yes' => "x");
            return form_dropdown('cross_specific_epithet', $options, $current, "id='$key'");
            break;
         case 'foliage_type':
            $current = $value ? $value : '';
            $options = array('' => "", 'deciduous' => "deciduous", 'semi-evergreen' => "semi-evergreen", 'evergreen' => "evergreen");
            return form_dropdown($key, $options, $current, "id='$key'");
            break;
        case 'plant_type':
            $current = $value ? $value : '';
            $options = array('' => "", 'bulb' => "bulb", 'conifer' => "conifer", 'perennial' => "perennial",
                'shrub' => "shrub", 'tree' => "tree", 'vine' => "vine", 'annual' => "annual");
            return form_dropdown('plant_type', $options, $current, "id='$key'");
            break;
         case 'flower_time':
            $current = $value ? $value : '';
            $options = array('' => "", 'winter' => "winter", 'winter-spring' => "winter-spring", 'spring' => "spring",
                'spring-summer' => "spring-summer", 'summer' => "summer", 'summer-fall' => "summer-fall", 'fall' => "fall",
                'winter' => "winter");
            return form_dropdown('flower_time', $options, $current, "id='$key'");
            break;
        case 'growth_habit':
            $current = $value ? $value : '';
            $options = array('' => "", 'columnar' => "columnar", 'compact' => "compact", 'mounding' => "mounding",
                'narrow' => "narrow", 'pyramidal' => "pyramidal", 'round' => "round", 'spreading' => "spreading",
                'upright' => "upright", 'weeping' => "weeping");
            return form_dropdown('growth_habit', $options, $current, "id='$key'");
            break;
        case 'committee':
            $current = $value ? $value : '';
            $options = array('' => "", 'Perennials - Bulbs' => "Perennials - Bulbs",
                'Shrubs - Vines' => "Shrubs - Vines", 'Trees - Conifers' => "Trees - Conifers");
            return form_dropdown('committee', $options, $current, "id='$key'");
            break;
        case 'fruit_seedhead_attractive':
            $current = $value ? $value : '';
            $options = array('' => "", 'Yes' => "Yes");
            return form_dropdown('fruit_seedhead_attractive', $options, $current, "id='$key'");
            break;
        case 'bark_interest':
            $current = $value ? $value : '';
            $options = array('' => "", 'Yes' => "Yes");
            return form_dropdown('bark_interest', $options, $current, "id='$key'");
            break;
        case 'flower_showy':
            $current = $value ? $value : '';
            $options = array('' => "", 'Yes' => "Yes");
            return form_dropdown('flower_showy', $options, $current, "id='$key'");
            break;
        case 'publish':
            $current = $value ? $value : 'No';
            $options = array('No' => "No", 'Yes' => "Yes");
            return form_dropdown('publish', $options, $current, "id='key'");
            break;
         case 'growing_notes':
             return form_textarea($attributes);
             break;        
         case 'culture_notes':
             return form_textarea($attributes);
             break;
        case 'qualities' :
            return form_textarea($attributes);
            break;        
        case 'plant_combinations' :
            return form_textarea($attributes);
            break;
        case 'gpp_references' :
            return form_textarea($attributes);
            break;
        case 'gpp_history' :
            return form_textarea($attributes);
            break;
        default:
            return form_input($attributes);
            break;
    }

}

/* End of file plant_helper.php */
/* Location: ./application/helpers/plant_helper.php */