<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $filterMana = $_POST['filterByMana'];
        echo "test: $filterMana";
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Hearthstone kártyák</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item nav-item-1">
                        <a class="nav-link active" aria-current="page" href="index.php">Kártyák</a>
                    </li>
                    <li class="nav-item nav-item-1">
                        <a class="nav-link" href="index.php?todo=new">Új kártya hozzáadása</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-item-2">
                        <img class="hs-logo" src="Hearthstone-Logo.png" alt="logo">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid seged2">
        <div id="cardsDisplay" class="row">
            <div id="filterOptions" class="col-md-4">
                <form method="POST" action="index.php">
                    <label for="filterByMana">Filterelés mana alapján:</label>
                    <select name="filterByMana" id="filterByMana">
                        <?php
                            for ($i = 0; $i <= 10; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>

                    <label for="filterByType">Filterelés típus alapján:</label>
                    <select name="filterByType" id="filterByType">
                        <option value="minion">minion</option>
                        <option value="spell">spell</option>
                        <option value="weapon">weapon</option>
                    </select>

                    <div class="seged">
                        <button type="submit" id="filterButton" class="submitButton">Filter</button>
                    </div>
                </form>

                <hr class="formHR">

                <form method="POST" action="index.php">
                    <label for="search">Keresés név alapján:</label>
                    <input type="text" name="search" id="search">

                    <div class="seged">
                        <button type="submit" id="searchButton" class="submitButton">Keresés</button>
                    </div>
                </form>
            </div>

            <div class="hatter2 col-md-8"></div>
        </div>
    </div>
    <div id="cardsDisplayMain" class="">

    </div>
</body>
</html>