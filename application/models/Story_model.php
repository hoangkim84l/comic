<?php
Class Story_model extends MY_Model
{
    var $table = 'stories';
    /**
     * Autocomplete
     * function name fetch_data_autocomplete
     * Author Di
    */
    function fetch_data_autocomplete($term){
        $this->db->distinct();
        $this->db->select("name, image_link");
        $this->db->from('stories');
        $this->db->like('stories.name', $term);
        $query = $this->db->get();
        return $query->result_array();
    }
    /**
     * Get data with multi fields
     * function name get_custom_items
     * Author Di
    */
    public function get_custom_items($table, $where)
    {
        $this->db->select('*');
        $this->db->where_in('id', $where); // Must be id
        return $this->db->get($table);
    }
}