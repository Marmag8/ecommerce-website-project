<?php
    require_once "../skrypty/conn.php";

    $file = fopen('../../../logs.txt', 'a'); // otwarcie pliku w trybie append

    try{
    $query = "DELETE FROM `koszyk`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    fwrite($file, "Wyczyszono koszyk" . "\n");
    }

    catch (Exception $e) {
        fwrite($file, "BŁĄD: " . $e->getMessage() . "\n");
        echo "Wystąpił błąd przy usuwaniu: " . $e->getMessage();
    }

    fclose($file);
?>