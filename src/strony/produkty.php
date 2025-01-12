<?php
    require_once "../skrypty/conn.php";

    if (isset($_POST['all'])) {
        $_SESSION['category'] = "";
        $_SESSION['search'] = "";
    }
    else if (isset($_POST['electronics'])) {
        $_SESSION['category'] = "elektronika";
    }
    else if (isset($_POST['school_items'])) {
        $_SESSION['category'] = "przedmioty szkolne";
    }
    else if (isset($_POST['other'])) {
        $_SESSION['category'] = "inne";
    }

    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['searchQuery'];
    }
    else {
        $_SESSION['search'] = "";
    }

    if (isset($_POST['submit'])) {
        $_SESSION['minPrice'] = $_POST['minPrice'];
        $_SESSION['maxPrice'] = $_POST['maxPrice'];
    }
    else {
        $_SESSION['minPrice'] = 0;
        $_SESSION['maxPrice'] = 9999;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkty</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/produkty.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--zawarcie bibliotek jQuery w projekcie-->
    <script src="../skrypty/script.js"></script>
</head>
<body>
    <div id="header">
        <p><a href="index.php">O Nas</a></p>
        <p><a href="produkty.php">Produkty</a></p>
        <p><a href="kontakt.php">Kontakt</a></p>
        <p><a href="koszyk.php"><i class='bx bx-cart'></i> Koszyk</a></p>
    </div><br>
    <div id="banner">
        <h1 id="categoryHeader">
            <?=ucwords($_SESSION['category']);
            if ($_SESSION['category'] == "") {
            echo("Produkty");
            }?>
        </h1>
    </div>
    <div id="wrapper">
        <div id="menu">
            <ul>
                <li>
                    <button id="resizeMenuButton">
                        <i class='bx bx-menu'></i>
                        <p>Zwiń</p>
                    </button>
                </li><br><br>
                <li>
                    <form action="" method="post">
                        <button type="submit" id="all" name="all">
                            <i class='bx bx-border-all'></i>
                            <p class="active">Wszystkie</p>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <button type="submit" id="electronics" name="electronics">
                            <i class='bx bx-laptop'></i>
                            <p>Elektronika</p>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <button type="submit" id="school_items" name="school_items">
                            <i class='bx bx-pencil'></i>
                            <p>Przedmioty Szkolne</p>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <button type="submit" id="other" name="other">
                            <i class='bx bx-unite'></i>
                            <p>Inne</p>
                        </button>
                    </form>
                </li><br><br>
                <li>
                    <form action="" method="post">
                        <label for="minPrice"><b>Wyszukaj produkty według ceny</b></label><br><br>
                        <label for="minPrice">Minimalna cena (zł):</label>
                        <input type="number" name="minPrice" id="minPrice" placeholder="Min. Cena" min="0" max="9999" value="0">
                        <label for="maxPrice">Maksymalna cena (zł):</label>
                        <input type="number" name="maxPrice" id="maxPrice" placeholder="Max. Cena" min="0" max="9999" value="9999">
                        <button type="submit" id="submit" name="submit">
                            <i class='bx bx-search'></i>
                            <p>Wyszukaj</p>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div id="searchbar">
            <form action="" method="post">
                <input type="text" name="searchQuery" id="searchQuery" placeholder="Czego szukasz?">
                <button type="submit" id="search" name="search">
                    <i class='bx bx-search'></i>
                    <p>Wyszukaj</p>
                </button>
            </form>
        </div>
        <div id="main">
            <?php
                print("<table>");
                $category = $_SESSION['category'];
                $minPrice = $_SESSION['minPrice'];
                $maxPrice = $_SESSION['maxPrice'];

                if($_SESSION['search'] == "") {
                    $search = $_SESSION['search'];
                }
                else {
                    $search = '%'.$_SESSION['search'].'%';
                }

                if ($category == "" && $search == "") {
                    $query = "SELECT * FROM `produkty` WHERE `Price` > ? AND `Price` < ? ORDER BY `Id` ASC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ii", $minPrice, $maxPrice);
                } 
                else if ($category == "" && $search != "") {
                    $query = "SELECT * FROM `produkty` WHERE `ItemName` LIKE ? AND `Price` > ? AND `Price` < ? ORDER BY `Id` ASC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("sii", $search, $minPrice, $maxPrice);
                }
                else if ($category != "" && $search == "") {
                    $query = "SELECT * FROM `produkty` WHERE `Category` = ? AND `Price` > ? AND `Price` < ? ORDER BY `Id` ASC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("sii", $category, $minPrice, $maxPrice); // przypisanie parametru do zapytania jako string
                }
                else {
                    $query = "SELECT * FROM `produkty` WHERE `Category` = ? AND `ItemName` LIKE ? AND `Price` > ? AND `Price` < ? ORDER BY `Id` ASC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssii", $category, $search, $minPrice, $maxPrice);
                }
                
                $stmt->execute();
                $res = $stmt->get_result();
                $numRows = mysqli_num_rows($res);
                $stmt->close();
                $conn->close();
                print("<tr>");
                $i = 1;
                while ($rows = mysqli_fetch_assoc($res)) {?>
                    <td><div class="product"><img src="../../img/<?= $rows['ImageUrl'] ?>">
                    <p><?= $rows['ItemName'] ?></p>
                    <p class="price"><?= $rows['Price'] ?>zł</p><br>
                    <input type="number" name="quantity<?= $rows['ItemName']?>" id="quantity<?= $rows['ItemName']?>" class="quantity" value="1" min="1" max="99">
                    <button type="submit" onclick="add_to_cart('<?= $rows['ItemName']?>', '<?= $rows['Price']?>')">Dodaj do Koszyka</button></div></td>
                    <?php 
                        $i++;
                        if ($i == 4) {
                            print("</tr><tr>");
                            $i = 1;
                        }
                    ?>
                <?php }
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var numRows = <?= $numRows ?>;
                    var categoryHeader = document.getElementById("categoryHeader");
                    categoryHeader.innerHTML += " (" + numRows + " ofert)";
                });
            </script>
        </div>
    </div>
</body>
</html>