<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>

 <div class="d-flex justify-content-end">
  <form action="<?= URLROOT; ?>/allergieen/index" method="POST">
        <select name="allergie">
            <option>Selecteer allergie</option>
            <option>Soja</option>
            <option>Lactose</option>
            <option>Hazelnoten</option>
            <option>Schaaldieren</option>
            <option>Pindas</option>
            <option>Gluten</option>
           
        </select>
        <input type="submit" value="toon gezinnen" class="btn btn-secondary">
    </form>
    </div>

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
     <div class="form-group row">
     <div class="col-md-12 text-md-right">
        <a class="btn btn-primary" href="<?php URLROOT; ?>/allergieen/index">Home</a>
    </div>
</div>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>
