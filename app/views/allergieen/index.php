<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>
  <a href="<?=URLROOT;?>/Klant/create" class="btn btn-primary">toon Gezinnen</a>

  <form action="<?= URLROOT; ?>/allergieen/selectedAllergie" method="POST">
        <select name="allergie">
            <option value="">Selecteer allergie</option>
            <option value="">Soja</option>
            <option value="">Lactose</option>
            <option value="">Hazelnoten</option>
            <option value="">Schaaldieren</option>
            <option value="">Pindas</option>
            <option value="">Gluten</option>
            <?= $data['dropdown']; ?>
        </select>
        <input type="submit" value="Filter" class="btn btn-primary">
    </form>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Omschrijving</th>
      <th scope="col">Volwassen</th>
      <th scope="col">Kinderen</th>
      <th scope="col">Babys</th>
      <th scope="col">IsVertegenwoordiger</th>
      <th scope="col">Allergie Details</th>
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>
