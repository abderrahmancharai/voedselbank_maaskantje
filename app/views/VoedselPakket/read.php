<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Omschrijving</th>
      <th scope="col">AantalVolwassen</th>
      <th scope="col">AantalKinderen</th>
      <th scope="col">AantalBaby</th>
      <th scope="col">vertegwoordiger</th>
      <th scope="col">voedselpakket Details</th>
 
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>
