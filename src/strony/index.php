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
                        Witamy w naszym sklepie internetowym! Jesteśmy firmą specjalizującą się w sprzedaży produktów wysokiej jakości w atrakcyjnych cenach. 
                        Nasza oferta obejmuje szeroki wybór artykułów, od elektroniki po odzież, z dbałością o satysfakcję każdego klienta. 
                        Oferujemy również profesjonalną obsługę, aby zakupy u nas były szybkie, wygodne i bezproblemowe. 
                        Naszym celem jest zapewnienie Ci najlepszych produktów, które spełnią Twoje oczekiwania i potrzeby.
                        
                        Zespół naszego sklepu stawia na jakość, innowacyjność oraz doskonałą obsługę klienta. Nasze produkty pochodzą od renomowanych dostawców, 
                        a każdy z nich jest starannie wybierany, aby sprostać najwyższym standardom. Dziękujemy, że wybrałeś naszą ofertę!
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
                        W Nowym Roku życzymy naszym klientom wielu udanych zakupów! Przypominamy, że nasza oferta jest nieustannie poszerzana, a 
                        wyjątkowe promocje czekają na Ciebie. Zrób zakupy w naszym sklepie i odkryj najnowsze produkty, które właśnie trafiły do naszej oferty.
                    </p><br>

                    <h3>2024/12/20 - Wyprzedaż Świąteczna</h3>
                    <p>
                        Z okazji Świąt przygotowaliśmy dla Ciebie niesamowite promocje! Wybierz prezenty dla najbliższych w atrakcyjnych cenach 
                        i ciesz się wyjątkowymi ofertami. Nie przegap naszej wyprzedaży, która trwa do końca grudnia!
                    </p><br>

                    <h3>2024/11/29 - Czarny Piątek</h3>
                    <p>
                        Wielka wyprzedaż z okazji Czarnego Piątku już trwa! Zniżki sięgające nawet 70% na wybrane produkty. 
                        To doskonała okazja, by kupić wymarzone artykuły w wyjątkowo niskich cenach. Zajrzyj do naszego sklepu i skorzystaj z okazji!
                    </p><br>

                    <h3>2024/11/27 - Wyprzedaż Jesienna</h3>
                    <p>
                        Złota polska jesień to idealny czas na zakupy w naszym sklepie! Przeceny na odzież, elektronikę i wiele innych produktów. 
                        Jesienna wyprzedaż to świetna okazja, by zdobyć produkty, które od dawna miałeś na swojej liście zakupowej.
                    </p><br>

                    <h3>2024/11/20 - Nowa Kolekcja Produktów</h3>
                    <p>
                        Jesteśmy dumni z naszej nowej kolekcji, która właśnie trafiła do sklepu. Nowoczesne technologie, elegancki design i funkcjonalność - 
                        to cechy, które charakteryzują naszą ofertę. Sprawdź, co nowego przygotowaliśmy!
                    </p><br>

                    <h3>2024/11/11 - Otwarcie Sklepu</h3>
                    <p>
                        Z radością ogłaszamy otwarcie naszego sklepu internetowego! Zapraszamy do zapoznania się z naszą bogatą ofertą i skorzystania z 
                        wyjątkowych promocji dostępnych tylko w pierwszym tygodniu działalności.
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
