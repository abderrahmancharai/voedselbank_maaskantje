<?php require APPROOT . '/views/includes/head.php'; ?>

<body>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Klant naam</th>
      <th scope="col">Aantal kaas</th>
      <th scope="col">Aantal melk</th>
      <th scope="col">Aantal appels</th>

    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>