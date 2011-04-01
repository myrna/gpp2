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
    function update_record($plants)
    {
        $this->db->where('PlantId', $plantid);
        $this->db->update('plantdata', $plants);
    }
    function delete_row()
    {
        $this->db->where('PlantId', $plantid);
        $this->db->delete('plantdata');
    }
     function update($PlantID, $family, $genus, $species, $PlantType)
    {
        $plants = array(
            'family' => $family,
            'genus' => $genus,
            'species' => $species,
            'PlantType' => $PlantType,
        );
        $this->db_model->where('PlantId',$PlantID);
        $this->db_model->update('plantdata',$plants );

    }
}

?>
