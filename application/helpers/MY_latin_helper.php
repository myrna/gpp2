<?php

/**
 * Botanical Name format helper Helper
 *
 * Provide helper functions for Botanical Latin text formatting.
 *
 * @package		Great Plant Picks
 * @subpackage	Helpers
 * @category		Helpers
 * @author		Author name
 */


/**
* Display formatted botanical names.
*
* @access public
* @param string
* @return string
*/
function format_name()
{
$name = array('family','genus','cross_genus','species','subspecies','variety','cultivar','trade_name','registered_name',
        'plant_patent_number','plant_breeders_rights','plantname_group','synonym');

// Check if it is family, genus
if (in_array($family) == true) {

    foreach ('family' as $family) {
        echo "<span class='family'>$family</span>";
        }
    }
}


/** End of file MY_latin_helper.php */
/* Location: ./application/helpers/MY_latin_helper.php */
