<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>

    <h4> Gezinsnaam: <?= $data['Gezinsnaam']; ?></h4>
    <h4> Omschrijving: <?= $data['omschrijving']; ?></h4>
    <h4> Totaal aantal Personen: <?= $data['totaal']; ?></h4>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">TypePersoon</th>
      <th scope="col">Gezinsrol</th>
      <th scope="col">Allergie</th>
      <th scope="col">Wijzig Allergie</th>
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
<div class="form-group row">
            <div class="col-md-12 text-md-right">
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/allergieen/index/">terug</a>
       
               <a class="btn btn-primary" href="<?php URLROOT; ?>/homepages/index/">Home</a>
               </div>
            </div>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>
