<?php
    require_once "conn.php";

    $quantity = $_POST['quantity'];
    $productName = $_POST['name'];
    $price = $_POST['price'];
    $file = fopen('../logs.txt', 'a'); // otwarcie pliku w trybie append
    
    $query = "SELECT * FROM `koszyk` WHERE `ItemName` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $stmt->close();
    if ($row) {
        try {
            $newQuantity = $row['Quantity'] + $quantity;
            $query1 = "UPDATE `koszyk` SET `Quantity` = ? WHERE `ItemName` = ?";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param("is", $newQuantity, $productName);
            $stmt1->execute();
            fwrite($file, "Dodano do koszyka " . $productName . " w ilości " . $quantity . "\n");
        }
        catch (Exception $e) {
            fwrite($file, "BŁĄD: " . $e->getMessage() . "\n");
            echo "Wystąpił błąd przy zapisaniu zamówienia: " . $e->getMessage();
        }
    }
    if (!$row) {
        try {
            $query1 = "INSERT INTO `koszyk` (`ItemName`, `Price`, `Quantity`) VALUES (?, ?, ?)";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param("sdi", $productName, $price, $quantity);
            $stmt1->execute();
            fwrite($file, "Dodano do koszyka " . $productName . " w ilości " . $quantity . "\n");
        }
        catch (Exception $e) {
            fwrite($file, "BŁĄD: " . $e->getMessage() . "\n");
            echo "Wystąpił błąd przy zapisaniu zamówienia: " . $e->getMessage();
        }
    }
    fclose($file);
    $conn->close();
?>