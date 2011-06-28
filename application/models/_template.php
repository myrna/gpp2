<?php

/**
 * Program Name
 *
 * @package		Program Name
 * @author		Author Name
 * @copyright		Copyright (c) 2009
 * @link			web address
 * @since			Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Some Model
 *
 * Handle some object DB operations.
 *
 * @package		Program Name
 * @subpackage	Models
 * @category		Models
 * @author		Author Name
 */

class Some_model extends CI_Model
{

	private $_table = 'table name';


	public function __construct()
	{
		parent::Model();
	}


	/**
	* Get and return all records from DB table.
	*
	* @access public
	* @param string
	* @return object
	*/
	public function getAll($order_by)
	{
		if($order_by)
		{
			$this->db->order_by($order_by);
		}
		$result = $this->db->get($this->_table);

		if($result->num_rows() > 0)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}


	/**
	* Get and return specified record from DB table.
	*
	* @access public
	* @param array
	* @return object
	*/
	public function getWhere($params, $order_by = NULL)
	{
		if($order_by)
		{
			$this->db->order_by($order_by);
		}
		$result = $this->db->get_where($this->_table, $params);

		return $result;
	}


	/**
	* Get and return specified record from DB table by id.
	*
	* @access public
	* @param int
	* @return object
	*/
	public function get($id)
	{
		$result = $this->db->get_where($this->_table, array('id' => $id));

		if($result->num_rows() > 0)
		{
			return $result->row();
		}
		else
		{
			return FALSE;
		}
	}


	/**
	* Add new record to DB table.
	*
	* @access public
	* @param array
	* @return bool
	*/
	public function add($params)
	{
		$this->db->insert($this->_table, $params);
		return $this->db->insert_id();
	}


	/**
	* Update existing record in DB table.
	*
	* @access public
	* @param int
	* @param array
	* @return bool
	*/
	public function update($id, $params)
	{
		$this->db->update($this->_table, $params, array('id' => $id));
		return $this->db->affected_rows();
	}


	/**
	* Delete specified records from the DB table.
	*
	* @access public
	* @param array
	* @return bool
	*/
	public function delete($params)
	{
		$this->db->delete($this->_table, $params);
		return $this->db->affected_rows();
	}

}

/* End of file some_model.php */
/* Location: ./application/models/some_model.php */ 
