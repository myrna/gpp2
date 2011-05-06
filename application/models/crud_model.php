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
	function get_records($page = "0"){
            $this->db->limit(20, $page);
            $query = $this->db->get('plant_data');
            $query2 = $this->db->get('plant_data');
            $total_rows = $query2->num_rows();
            $data['query'] = $query;
            $data['total_rows'] = $total_rows;
            return $data;
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
                $result = $this->db->insert('plant_data',$data);
            }
            return $result;
           
        }
        
       // get individual record from database using list produced by get_records//

       function get_record($id)
	{
		if(!empty($id))
		{
			//use the where function to add a filter to our query, this time the id, with the $id value
			

                        $query = mysql_query("SELECT * FROM plant_data
                            JOIN plant_images ON plant_data.id = plant_images.id
                            WHERE plant_data.id = '$id'");
                        
			//and then execute the query
			$query = $this->db->get('plant_data, plant_images');
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

       
       function edit_record($data, $id)
	{
		$result = 0;
		if(!empty($data)){
			$this->db->where('id', $id);
			$result = $this->db->update('plant_data', $data);
		}

		return $result;
	}

       	//Delete specified records from the DB table.

        function delete_record($id)
        {
            $return = 0;
            if(!empty($id))
            {
                $this->db->where('id', $id);
                $result = $this->db->delete('plant_data');
            }
            return $result;
        }
	

}

/* End of file crud_model.php */
/* Location: ./application/models/crud_model.php */
