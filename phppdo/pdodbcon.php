<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'phppdodatabase';

try{
    $dsn = 'mysql:host='.$host .'; dbname='.$dbname;
    $pdodbcon = new PDO($dsn,$user,$password);

    $pdodbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    //echo 'database connected';

}catch(PDOException $error){

    $error->getMessage();
    echo 'database failed to connect';
}

?>