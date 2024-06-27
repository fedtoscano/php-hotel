<?php
    require_once __DIR__ . "/partials/hotels.php";

    $isThereParking = $_GET["parking"];
    $filteredHotels = array_filter($hotels, function($hotel) use($isThereParking){
        return $isThereParking == $hotel['parking'];
    });
    $hotels = $filteredHotels;
    var_dump($filteredHotels);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <h1 class="text-center">HOTELS</h1>
        </div>
    </div>

    <!-- FORM -->
    <div class="row">
        <div class="col-6">
            <form action="./index.php" method="GET">
                <label for="parking">Parcheggio:</label>
                <select name="parking" id="parking">
                    <option value="true">Sì</option>
                    <option value="false">No</option>
                </select>
                <button>Avvia ricerca</button>
            </form>
        </div>
    </div>

    <!-- TABELLA -->
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance To Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels as $key => $hotel) { ?>
                        <tr>    
                        <th scope="row"><?php echo $hotel['name'] ?></th>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
