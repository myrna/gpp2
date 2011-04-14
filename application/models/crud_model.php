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
        
       // get individual record from database using list produced by get_records//

       function get_record($PlantId)
	{
		if(!empty($PlantId))
		{
			//use the where function to add a filter to our query, this time the id, with the $id value
			$this->db->where('PlantId', $PlantId);

			//and then execute the query
			$query = $this->db->get('plantdata');
                }
                if ($query->num_rows() > 0) {
                        return $row = $query->row();
		}
                else
                {
                    $row = FALSE;
                }
		
		return $row;
	}


	// Update existing record in DB table.

       
       function edit_record($data, $PlantId)
	{
		$result = 0;
		if(!empty($data)){
			$this->db->where('PlantId', $PlantId);
			$result = $this->db->update('plantdata', $data);
		}

		return $result;
	}

	//Delete specified records from the DB table.

        function delete_record($PlantId)
        {
            $return = 0;
            if(!empty($PlantId))
            {
                $this->db->where('PlantId', $PlantId);
                $result = $this->db->delete('plantdata');
            }
            return $result;
        }
	

}

/* End of file crud_model.php */
/* Location: ./application/models/crud_model.php */
