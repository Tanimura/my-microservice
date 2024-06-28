<?php
echo "Olá, mundo!";
$servername = "mysql";
$username = "myuser";
$password = "mypassword";
$dbname = "mydatabase";
$port = 3307;

try {
    // Criar conexão PDO com a porta especificada
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    // Configurar o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>