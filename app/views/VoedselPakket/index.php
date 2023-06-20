<?php require APPROOT . '/views/includes/head.php'; ?>

<body>
<h1>overzicht klanten</h1>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Volwassen</th>
      <th scope="col">Kinderen</th>
      <th scope="col">Baby</th>
      <th scope="col">Pakket</th>
      <th scope="col">Wijzigen</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>