<?php

$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],

];

$filterRating = $_GET['ratingToSearch'] ?? '';
$filterFreeParking = $_GET['freeParking'] ?? '';
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <title>Document</title>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">

        <h1 class="my-3">Hotel:</h1>

        <h3>Filtri</h3>
        <form action="index.php" method="get">
          <div class="w-100 d-flex align-items-center gap-4 mb-3 border p-3 rounded-3">
            <select class="form-select" style="width: auto;" aria-label="Default select example" name="ratingToSearch">
              <option value="0" selected>Qualsiasi</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="freeParking" name="freeParking">
              <label class="form-check-label" for="flexCheckDefault">
                Solo hotel con parcheggi liberi
              </label>
            </div>

            <button type="submit" class="ms-auto btn btn-primary" style="width: 100px;">Cerca</button>
          </div>
        </form>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Descrizione</th>
              <th scope="col">Voto</th>
              <th scope="col">Parcheggi</th>
              <th scope="col">Distanza dal centro</th>
            </tr>
          </thead>
          <tbody>

            <?php
            for ($i = 0; $i < count($hotels); $i++) {;
              if ((($filterRating == 0 || $hotels[$i]['vote'] == $filterRating) && (!$filterFreeParking || $hotels[$i]['parking'])) || ($filterRating == '' && $filterFreeParking == '')) {
            ?>
                <tr>
                  <th scope="row"><?php echo $hotels[$i]['name'] ?></th>
                  <td><?php echo $hotels[$i]['description'] ?></td>
                  <td><?php echo $hotels[$i]['vote'] ?></td>
                  <td>
                    <?php if ($hotels[$i]['parking']) {
                      echo "Libero";
                    } else {
                      echo "Pieno";
                    } ?>
                  </td>
                  <td><?php echo $hotels[$i]['distance_to_center'] . " km" ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>


</body>

</html>