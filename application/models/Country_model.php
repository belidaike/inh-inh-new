<?php
class Country_model extends CI_Model {
    public function get_countries() {
        return $this->db->get('countries')->result();
    }
}
