<?php
echo "Olá, mundo!";
$servername = "mysql";
$username = "myuser";
$password = "mypassword";
$dbname = "mydatabase";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>