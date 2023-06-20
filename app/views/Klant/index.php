<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>
  <a href="<?=URLROOT;?>/Klant/create" class="btn btn-primary">Klant toevoegen</a>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">naam</th>
      <th scope="col">Plaats</th>
      <th scope="col">Telefoonnummer</th>
      <th scope="col">Email</th>
      <th scope="col">AantalVolwassen</th>
      <th scope="col">AantalKinderen</th>
      <th scope="col">AantalBaby</th>
      <th scope="col">Wijzigen</th>
      <th scope="col">Verwijderen</th>
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>
