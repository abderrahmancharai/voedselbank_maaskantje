<?php require APPROOT . '/views/includes/head.php'; ?>
<body>

<h1>details INFORMATIE</h1>
 <h3> bedrijfsnaam: <?= $data["BedrijfsNaam"];?></h3>
 <h3> ContactPersoon: <?= $data["ContactPersoon"];?></h3>
 <a href="<?=URLROOT;?>/Leverancier/index">terug</a>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">product</th>
      <th scope="col">Email</th>
      <th scope="col">Mobiel</th>
      <th scope="col">Straat</th>
      <th scope="col">Huisnummer</th>
      <th scope="col">Postcode</th>
      <th scope="col">DatumEerstVolgendeLevering</th>

    </tr>
  </thead>
  <tbody>
  <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>
