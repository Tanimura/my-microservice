<?php
echo "Olá, mundo! <br>";
$servername = "localhost";
$username = "myuser";
$password = "mypassword";
$dbname = "mydatabase";
$port = 3306;

try {
    // Criar conexão PDO com a porta especificada
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    // Configurar o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com successo";
} catch(PDOException $e) {
    echo "Erro ao conectar no banco: " . $e->getMessage();
}
?>