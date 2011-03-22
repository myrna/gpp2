<?php

class Db_model extends Model {

    function get_records() // get all records in plantdata table
    {
        $query = $this->db->get('plantdata');
        return $query->result();
    }
    function add_record($plants)
    {
        $this->db->insert('plantdata', $plants);
        return;
    }
    function update_record($data)
    {
        $this->db->where('PlantId', $plantid);
        $this->db->update('plantdata', $plants);
    }
    function delete_row()
    {
        $this->db->where('PlantId', $plantid);
        $this->db->delete('plantdata');
    }
}

?>
