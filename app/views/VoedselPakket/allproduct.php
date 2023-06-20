<?php require APPROOT . '/views/includes/head.php'; ?>

<body>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Klant naam</th>
      <th scope="col">Categorie</th>
      <th scope="col">Aantal</th>
      <th scope="col">Product</th>
      <th scope="col">Wijzigen</th>

    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>