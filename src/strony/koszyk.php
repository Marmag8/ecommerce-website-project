<?php
    require_once "../skrypty/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/koszyk.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--zawarcie bibliotek jQuery w projekcie-->
    <script src="../skrypty/script.js"></script>
</head>
<body>
    <div id="header">
        <p><a href="index.php">O Nas</a></p>
        <p><a href="produkty.php">Produkty</a></p>
        <p><a href="kontakt.html">Kontakt</p>
        <p><a href="koszyk.php"><i class='bx bx-cart'></i> Koszyk</a></p>
    </div><br>
    <div id="banner">
        <h1>Koszyk</h1>
    </div>
    <div id="main">
        <?php
            $query = "SELECT * FROM `koszyk` ORDER BY `Id` ASC";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $res = $stmt->get_result();
            $stmt->close();
            $conn->close();
            if (mysqli_num_rows($res) > 0) {
            print("<table>");
            print("<tr>");
            print("<th>Lp.</th>");
            print("<th>Produkt</th>");
            print("<th>Ilość</th>");
            print("<th>Cena</th>");
            while ($rows = mysqli_fetch_assoc($res)) {?>
            <tr>
                <td><?= $rows['Id']?></td>
                <td><?= $rows['ItemName']?></td>
                <td><?= $rows['Quantity']?></td>
                <td><?= $rows['Price']*$rows['Quantity'] ?>zł</td>
                <td class="buttonTD">
                    <button type="submit" onclick="remove_from_cart('<?= $rows['ItemName']?>')">Usuń z Koszyka</button>
                </td>
            </tr> 
            <?php }
            
            print('</table>
                <div id="btns">
                <button class="btn" onclick="clear_cart()">Wyczyść Koszyk</button>
                <button class="btn">Przejdź do zamówienia</button>
                </div>');
            }
            
            else {
                print ("<h1>Brak elementów w koszyku.<br><a href='produkty.php'>Przejdź do strony z produktami</a></h1>");
            }
        ?>
    </div><br>
</body>
</html>