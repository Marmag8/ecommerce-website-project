<?php
    require_once "../skrypty/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep Internetowy</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="header">
        <p><a href="index.php">O Nas</a></p>
        <p><a href="produkty.php">Produkty</a></p>
        <p><a href="kontakt.php">Kontakt</p>
        <p><a href="koszyk.php"><i class='bx bx-cart'></i> Koszyk</a></p>
    </div><br>
    <div id="banner">
        <h1>Sklep Internetowy</h1>
    </div>
    <div id="main">
        <div id="left">
            <div class="text">
                <h2>O Nas</h2><br>
                <div class="pdiv">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vesti   bulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                        
                        Aliquam eget augue ut nisi efficitur euismod sit amet eget purus. Proin sit amet ultricies arcu. 
                        Donec molestie suscipit ante, nec efficitur nulla interdum vitae. Aenean nec libero ipsum. 
                        Duis semper enim ac quam pellentesque, eu dictum nunc euismod. Pellentesque vehicula, nisi vitae blandit euismod, 
                        orci dolor hendrerit lacus, in pellentesque ante odio sed felis. Vestibulum ante ipsum primis in faucibus orci luctus 
                        et ultrices posuere cubilia curae; Nunc sit amet cursus urna.
                    </p>
                </div>
            </div>
        </div>
        <div id="right">
            <div class="text">
                <h2>Nowości</h2><br>
                <div id="scroll">
                    <h3>2025/01/01 - Nowy Rok</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vestibulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.
                    </p><br>

                    <h3>2024/12/20 - Wyprzedaż Świąteczna</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vestibulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.
                    </p><br>

                    <h3>2024/11/29 - Czarny Piątek</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vestibulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.
                    </p><br>

                    <h3>2024/11/27 - Wyprzedaż Jesienna</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vestibulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.
                    </p><br>

                    <h3>2024/11/20 - Nowa Kolekcja Produktów</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vestibulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.
                    </p><br>

                    <h3>2024/11/11 - Otwarcie Sklepu</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper lorem vitae ullamcorper condimentum. 
                        Ut felis dui, facilisis vitae urna ut, pulvinar commodo justo. Sed ut mauris eget justo faucibus fringilla. 
                        Vestibulum ac eros mattis, ullamcorper nibh a, lacinia justo. Morbi pretium felis nec augue pellentesque tincidunt. 
                        Cras at dolor ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.
                    </p>
                </div>
            </div>
        </div>
        <h1>Wybrane Produkty z Oferty</h1><br><br>
        <?php
            print ("<table>");

            $query = "SELECT * FROM `produkty` ORDER BY `Id` ASC";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $res = $stmt->get_result();

            $data = []; // utworzenie tablicy na dane
            while ($row = $res->fetch_assoc()) {
                $data[] = array($row['ImageUrl'], $row['ItemName'], $row['Price']); // wypełnienie tablicy danymi
            }

            $stmt->close();
            $conn->close();

            shuffle($data); // losowe przetasowanie danych
            $data = array_slice($data, 0, 6); // wybranie pierwszych 6 elementów

            print("<tr>");
            $i = 1;
            foreach ($data as $e) {
                print("<td><div class='product'>");
                print("<img src='../../img/" . $e[0] . "'>");
                print("<p>" . $e[1] . "</p>");
                print("<p class='price'>" . $e[2] . "zł</p><br>");
                print("<p><a href='produkty.php'>Przejdź do strony z produktami</a></p></div></td>");
                $i++;
                if ($i == 4) {
                    print("</tr><tr>");
                    $i = 1;
                }
            }
            print("</tr>");
            print("</table>");
        ?>
    </div>
    <div id="footer">
        <p>&copy; 2025 Sklep Internetowy</p>
    </div>
</body>
</html>
