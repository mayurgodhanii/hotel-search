<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class HotelsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function index() {
        $request = $_GET;
        $this->set("is_hotel", 0);
        if (!empty($request)) {
            $this->set("is_hotel", 1);
            $hotels = $this->__getHotels();
            $search_results = $this->__searchresults($hotels, $request);
            $this->set("hotels", $search_results);
        }
    }

    public function __searchresults($hotels, $request) {
        $search_results = array();
        foreach ($hotels as $hotel) {
            if (($hotel['price'] >= $request['min_price']) && ($hotel['price'] <= $request['max_price'])) {
                $search_results[] = $hotel;
            }
        }

        $search_results = $this->__searchHotelInColumn($search_results, "from_date", $request['from_date']);
        $search_results = $this->__searchHotelInColumn($search_results, "to_date", $request['to_date']);       
        $search_results = $this->__searchHotelInColumn($search_results, "hotel_name", $request['hotel_name']);
        $search_results = $this->__searchHotelInColumn($search_results, "city", $request['city']);


        $f_search_results = array();
        $i = 0;
        foreach ($search_results as $search_result) {
            $hotel_name = $search_result['name'] . "_" . $search_result['city'];
            $f_search_results[$hotel_name]['name'] = $search_result['name'];
            $f_search_results[$hotel_name]['price'] = $search_result['price'];
            $f_search_results[$hotel_name]['city'] = $search_result['city'];
            $f_search_results[$hotel_name]['availibility'][$i]['from'] = $search_result['from'];
            $f_search_results[$hotel_name]['availibility'][$i]['to'] = $search_result['to'];
            $f_search_results[$hotel_name]['availibility'] = array_values($f_search_results[$hotel_name]['availibility']);
            $i++;
        }
        $f_search_results = array_values($f_search_results);
        return $f_search_results;
    }

    public function __searchHotelInColumn($hotels, $column_name, $search_value) {
        $search_results = array();
        if (!empty($search_value)) {
            if ($column_name == "from_date") {
                foreach ($hotels as $hotel) {
                    $from_date = strtotime($hotel['from']);
                    $search_result = strtotime($search_value);
                    if ($from_date >= $search_result) {
                        $search_results[] = $hotel;
                    }
                }
            } else if ($column_name == "to_date") {
                foreach ($hotels as $hotel) {
                    $to_date = strtotime($hotel['to']);                    
                    $search_result = strtotime($search_value);                    
                    if ($to_date >= $search_result) {
                        $search_results[] = $hotel;
                    }
                }
            } else if ($column_name == "hotel_name") {
                foreach ($hotels as $hotel) {
                    $pos = stripos($hotel['name'], $search_value);
                    if ($pos !== false) {
                        $search_results[] = $hotel;
                    }
                }
            } else if ($column_name == "city") {
                foreach ($hotels as $hotel) {
                    $pos = stripos($hotel['city'], $search_value);
                    if ($pos !== false) {
                        $search_results[] = $hotel;
                    }
                }
            }
        } else {
            $search_results = $hotels;
        }
        return $search_results;
    }

    public function __getHotels() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.myjson.com/bins/tl0bp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response_data = json_decode($response, 1);
        $hotels = $response_data['hotels'];
        $hotel_listing = array();
        foreach ($hotels as $hotel) {
            foreach ($hotel['availability'] as $availability) {
                $hotel_obj = array();
                $hotel_obj['name'] = $hotel['name'];
                $hotel_obj['price'] = $hotel['price'];
                $hotel_obj['city'] = $hotel['city'];
                $hotel_obj['from'] = $availability['from'];
                $hotel_obj['to'] = $availability['to'];
                $hotel_listing[] = $hotel_obj;
            }
        }
        return $hotel_listing;
    }

}
