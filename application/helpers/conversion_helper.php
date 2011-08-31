<?php
   function feet_to_meters($feet)
{
        $meters = (int)$feet*0.3048;
	return number_format($meters,1);  // limit to one decimal place
}
?>
