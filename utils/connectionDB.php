<?php 
    // create the connection
    function connDB() {
        $host = 'localhost';
        $dbName = 'dauphineexam';
        $user = 'root';
        $password = '';

        return new PDO('mysql:host='.$host.';port=3307;dbname='.$dbName.';charset=utf8', $user, $password);
    }

    // config the connection
    function configPDO(PDO $pdo) {
         // fetch the PDO error (SQL side)
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE, // choose the attribute
            PDO::ERRMODE_EXCEPTION //change the attribute
        );
        // remove index from fetch
        $pdo->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE, // choose the attribute
            PDO::FETCH_ASSOC //change the attribute
        );
    }

    try { //try to execute the connection, give an error if it fails
        $db = connDB();
        configPDO($db);
     } catch (Exception $e) {
        echo("Error during the connection to DataBase: ".$e->getMessage());
        exit;
     }
    
?>