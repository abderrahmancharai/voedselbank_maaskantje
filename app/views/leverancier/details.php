<?php require APPROOT . '/views/includes/head.php'; ?>
<body>

<h1>details INFORMATIE</h1>
 <!-- <h3> Naam: <?= $data["Naam"];?></h3>
 <h3> Leverancier nummer: <?= $data["LeverancierNummer"];?></h3>
 <h3> Leverancier type: <?= $data["LeverancierType"];?></h3> -->


 <a href="<?=URLROOT;?>/Leverancier/index">terug</a>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Soort allergie</th>
      <th scope="col">Barcode</th>
      <th scope="col">Houdbaarheids datum</th>
      <th scope="col">Wijzig product</th>


    </tr>
  </thead>
  <tbody>
  <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>
