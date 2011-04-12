<?php

/**
 * crud_model.php
 *
 * Handle CRUD DB operations.
 *
 * @package		Great Plant Picks
 * @subpackage	Models
 * @category		Models
 * @author		mlo
 */

class Crud_model extends Model
{

	/**
	* Get and return all records from DB table.
	*
	*/
	function get_records(){
            $query = $this->db->get('plantdata');
            return $query;
        }


	/**
	* Add new record to DB table.
	*
	*/
	function add_record($data)
        {
            $result = 0;
            //check if $data is not empty
            if(!empty($data))
            {
                //insert $data with insert method
                $result = $this->db->insert('plantdata',$data);
            }
            return $result;
           
        }
        

	/**
	* Update existing record in DB table.
	*
	* @access public
	* @param int
	* @param array
	* @return bool
	*/
	


	/**
	* Delete specified records from the DB table.
	*
	* @access public
	* @param array
	* @return bool
	*/
	

}

/* End of file crud_model.php */
/* Location: ./application/models/crud_model.php */
