<?php
function display_full_botanical_name($record) {
    return sprintf("%s %s %s %s %s %s %s %s %s %s %s",
        $record['genus'] ? format_genus($record['genus'],$record['cross_genus']) : "",
        $record['specific_epithet'] ? format_species($record['specific_epithet'], $record['cross_species']) : "",
        $record['infraspecific_epithet'] ? format_subspecies($record['infraspecific_epithet_designator'], $record['infraspecific_epithet']) : "",
        $record['cultivar'] ? format_cultivar($record['cultivar']) : "",
        $record['trade_name'] ? format_trade_name($record['trade_name']) : "",
        $record['registered'] ? format_registered_name($record['registered']) : "",
        $record['trademark'] ? format_trademark_name($record['trademark']) : "",
        $record['plant_patent_number'] ? format_patent_number($record['plant_patent_number']) : "",
        $record['plant_patent_number_applied_for'] ? "PPAF" : "",
        $record['plant_breeders_rights'] ? format_breeders_rights() : "",
        $record['plantname_group'] ? format_plantname_group($record['plantname_group']) : ""
    );
}

function format_genus($genus, $genus_cross) {
    $genus_cross = $genus_cross ? "&#967;" : "";
    $genus = ucfirst($genus);
    return "<span class='genus'>$genus_cross$genus</span>";
}

function format_species($species, $cross) {
    $cross = $cross ? "&times; $cross" : "";
    $species = strtolower($species);
    return "<span class='species'>$species $cross</span>";
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
    $tradename = strtoupper($tradename);
    return "<span class='trade-name'>$tradename</span>";
}

function format_registered_name($name) {
    return "<span class='registered-name'>$name &#174;</span>";
}

function format_trademark_name($name) {
    return "<span class='trademark_name'>$name &#8482;</span>";
}

function format_patent_number($number) {
    return "<span class='patent-number'>PP $number</span>";
}

function format_breeders_rights() {
    return "<span class='breeders-rights'>PBR</span>";
}

function format_plantname_group($name) {
    $name = ucwords($name);
    return "<span class='plantname-group'>$name</span>";
}

function convert_label($field) {
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
            return convert_label($field) . " (PPAF)";
            break;
        case 'plant_origin':
            return "Origin";
            break;
        case 'fruit_seedhead_attractive':
            return "Fruit/Seedhead Attractive";
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
            return convert_label($field);
            break;
    }
}
    
function build_form_control($key, $value) {
    switch ($key) {
        case 'foliage_type':
            $current = $value ? $value : 'none';
            $options = array('none' => "", 'Deciduous' => "Deciduous", 'Semi-Evergreen' => "Semi-Evergreen", 'Evergreen' => "Evergreen");
            return form_dropdown('foliage_type', $options, $current);
            break;
         case 'growing_notes':
             return form_textarea($key, $value);
             break;        
         case 'culture_notes':
             return form_textarea($key, $value);
             break;
        case 'qualities' :
            return form_textarea($key, $value);
            break;        
        case 'plant_combinations' :
            return form_textarea($key, $value);
            break;
        default:
            return form_input($key, $value);
            break;
    }

}

/* End of file plant_helper.php */
/* Location: ./application/helpers/plant_helper.php */