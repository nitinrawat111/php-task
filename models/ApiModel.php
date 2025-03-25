<?php
class ApiModel {
    public function fetchApiData($latitude, $longitude, $category_id = 2) {
        $url = API_URL . "?latitude=" . urlencode($latitude) . 
               "&longitude=" . urlencode($longitude) . 
               "&category_id=" . $category_id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json'
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close($ch);

        if ($httpCode == 200 && $response) {
            $data = json_decode($response, true);
            return $data;
        }
        return false;
    }
}