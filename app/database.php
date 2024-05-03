<?php require_once __DIR__.'/config.php';

function getDatabaseConnection()
{
    $host       = DATABASE['host'];  
    $dbname     = DATABASE['dbname']; 
    $username   = DATABASE['username'];
    $password   = DATABASE['password']; 
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    return null;
}


// Variavel ja pode ser usada!
$database = getDatabaseConnection();