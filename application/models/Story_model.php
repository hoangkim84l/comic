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
}