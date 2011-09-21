<?php //allows use of query strings
class MY_Input extends CI_Input {

    function __construct()
    {
        parent::__construct();
    }
    
    function save_query($query) {
        $CI =& get_instance();
		$serialized_query = serialize($query);
		$rows = $CI->db->get_where('saved_searches', array('parameters' => $serialized_query))->result();
		if (isset($rows[0])) {
			return $rows[0]->id;
		} else {
	        $CI->db->insert('saved_searches', array('parameters' => $serialized_query));
	        return $CI->db->insert_id();
		}
    }

    function load_query($query_id) {
        $CI =& get_instance();
        $rows = $CI->db->get_where('saved_searches', array('id' => $query_id))->result();
        if (isset($rows[0])) {
			return unserialize($rows[0]->parameters);
		}
   	}

}

?>
