<?php

/**
* for PUBLIC plant list views outputs meters from decimal feet and feet-inches from decimal feet
*
*/

   function feet_to_meters($feet)
{
        $meters = $feet*0.3048; // remove (int)$feet as we were truncating to 0 anything under 1 
	return number_format($meters,1);  // limit to one decimal place for plant list results page
}

    function feet_to_meters2($feet)
{
        $meters = $feet*0.3048; 
	return number_format($meters,2);  // limit to two decimal places for fact sheet
}
    function feet_to_feet_inches($feet,$precision = 0) 
{ 
        $inches = $feet * 12; 
        $feet_in_inches = floor($inches/12); 
        $feet_round = floor($feet);
        $inches = round($inches - (12*$feet_in_inches),$precision); 
        return $feet_round . " ft. " . $inches .' in.'; 
} 
?>