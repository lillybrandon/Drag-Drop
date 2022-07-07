<?php

define("DB_HOST", "127.0.0.1:8889");
define("DB_USER", "brandon");
define("DB_PASS", "123456");
define("DB_NAME", "nft_gen");

// Create Connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Check Connection
if($conn -> connect_error) {
    die("Connection Failed. " . $conn->connect_error);
}