<?php
class Car {
    private $conn;
    private $table = "cars";

    public $id;
    public $brand_id;
    public $model;
    public $body_type_id;
    public $year;
    public $color;
    public $license_plate;
    public $daily_rate;
    public $is_available;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT 
                    c.id, 
                    cb.name as brand, 
                    c.model, 
                    bt.name as body_type,
                    c.year,
                    c.color,
                    c.license_plate,
                    c.daily_rate,
                    c.is_available
                  FROM " . $this->table . " c
                  LEFT JOIN car_brands cb ON c.brand_id = cb.id
                  LEFT JOIN body_types bt ON c.body_type_id = bt.id
                  WHERE c.is_available = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}
?>