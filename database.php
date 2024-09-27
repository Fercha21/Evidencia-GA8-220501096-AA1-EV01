<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "miproyecto1";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    error_log("Conexión fallida: " . $conn->connect_error);
    exit('Error de conexión a la base de datos.');
}