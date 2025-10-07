<?php
require_once '../config/db.php';

$database = new Database();
$db = $database->getConnection();

if($db) {
    echo "Database connection successful!";
} else {
    echo "Connection failed";
}
?>