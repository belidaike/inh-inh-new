<?php
class Location extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Country_model');
        $this->load->model('City_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['countries'] = $this->Country_model->get_countries();
        $data['cities'] = [];

        if ($this->input->post('country')) {
            $country_id = $this->input->post('country');
            $data['cities'] = $this->City_model->get_cities_by_country($country_id);
        }

        $this->load->view('location_view', $data);
    }
    public function get_cities() {
        $country_id = $this->input->post('country_id');
        $cities = $this->City_model->get_cities_by_country($country_id);
    
        header('Content-Type: application/json');
        echo json_encode(['cities' => $cities]);
    }
}
