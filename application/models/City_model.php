<?php
class City_model extends CI_Model {
    public function get_cities_by_country($country_id) {
        $this->db->where('country_id', $country_id);
        return $this->db->get('cities')->result();
    }
}

