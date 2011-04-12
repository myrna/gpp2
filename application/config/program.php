<?php

/**
 * Program Name
 *
 * @package		Program Name
 * @author		Author name
 * @copyright		Copyright (c) 2009
 * @link			http://www.your-url.com
 * @since			Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Application Config
 *
 * Provide system with application specific configuration information.
 *
 * @package		Program Name
 * @subpackage	Config
 * @category		Config
 * @author		Author Name
 */


// Version of CodeIgniter running for this application.
$config['ci_version'] 		= '1.7.1';

// Version of application.
$config['program_version'] 	= '1.0';


/**
* Program status - whether the program is currently online or not.
* FALSE = offline
* TRUE = online
*/
$config['status'] = TRUE;


/**
* SSL - whether the program is currently checking for secure connections.
* FALSE = no
* TRUE = yes
*/
$config['ssl'] = FALSE;


/**
* Stats tracking - whether the program is currently outputing Google analytics tracking code or not.
* FALSE = is NOT outputting code
* TRUE = IS ouputting code
*/
$config['tracking'] = FALSE;


/**
* Advertising - whether the program should be displaying advertisements or not.
* FALSE = is NOT outputting code
* TRUE = IS ouputting code
*/
$config['display_adds'] = FALSE;


// ------------------------------------------------------------------------

/**
* File Upload Settings
*/
$config['file_upload_path'] = './files/';
$config['allowed_file_types'] = 'doc|rtf|xls|ppt|pdf|txt|gif|png|jpg';


// ------------------------------------------------------------------------


/**
* E-mail Settings
*/
$config['from_address'] = '';
$config['from_name'] = '';

$config['reply_address'] = '';
$config['reply_name'] = '';


/* End of file application.php */
/* Location: ./application/config/application.php */ 