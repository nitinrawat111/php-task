<?php
require_once 'models/ApiModel.php';

class HomeController {
    private $apiModel;

    public function __construct() {
        $this->apiModel = new ApiModel();
    }

    public function index() {
        require_once 'views/home.php';
    }

    public function fetchData() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $latitude = $_POST['latitude'] ?? '';
            $longitude = $_POST['longitude'] ?? '';
			$category_id = $_POST['category_id'] ?? '';
            
            $data = $this->apiModel->fetchApiData($latitude, $longitude, $category_id);
            
            if ($data) {
                $_SESSION['api_data'] = $data;
                header('Location: ?action=result');
                exit;
            } else {
                $error = "Failed to fetch data from API";
            }
        }
        require_once 'views/home.php';
    }

    public function showResult() {
        if (!isset($_SESSION['api_data'])) {
            header('Location: /');
            exit;
        }
        require_once 'views/result.php';
    }
}