<?php
    require_once "../skrypty/conn.php";
    
    $productName = $_POST['name'];
    $file = fopen('../../../logs.txt', 'a'); // otwarcie pliku w trybie append
    
    $query = "SELECT * FROM `koszyk` WHERE `ItemName` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $stmt->close();
    if ($row) {
        try {
            $query1 = "DELETE FROM `koszyk` WHERE `ItemName` = ?";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param("s", $productName);
            $stmt1->execute();
            fwrite($file, "Usunięto z koszyka " . $productName . "\n");
        }
        catch (Exception $e) {
            fwrite($file, "BŁĄD: " . $e->getMessage() . "\n");
            echo "Wystąpił błąd przy usuwaniu: " . $e->getMessage();
        }
    }
    fclose($file);
    $conn->close();
?>