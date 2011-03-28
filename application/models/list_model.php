<?php
class List_model extends Model {

    function search($query_array, $limit, $offset, $sort_by, $sort_order) {
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc'; // if desc selected then desc, else asc order
        $sort_columns = array('PlantId','family','genus','species','cultivar', 'PlantType', 'PlantHeight');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by  : 'family';
        //results query
        $q = $this->db->select('PlantID, family, genus, species, cultivar, PlantType, PlantHeight')
                ->from('plantdata')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        if (strlen($query_array['genus'])) {
            $q->like('genus', $query_array['genus']);
        }
         if (strlen($query_array['genus'])) {
            $q->like('family', $query_array['family']);
        }

        $ret['rows'] = $q->get()->result();
        //count query
        $q = $this->db->select('COUNT(*) as count', FALSE) // whenever function is used as field enter FALSE
                ->from('plantdata');
        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;
        return $ret;
    }

    function planttype_options() {
        $rows = $this->db->select('PlantType')
                ->from('plantdata')
                ->get()->result();

        $planttype_options = array('' => '');
        foreach ($rows as $row) {
            $planttype_options[$row->PlantType] = $row->PlantType;
        }

        return $planttype_options;       
    }
}
?>
