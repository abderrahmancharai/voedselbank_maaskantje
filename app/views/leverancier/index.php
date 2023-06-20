<?php require APPROOT . '/views/includes/head.php'; ?>
<body>

<h1>leverancier INFORMATIE</h1>
<a style="text-decoration: underline;"  href="<?=URLROOT;?>/Leverancier/toevoegen">levrancier toevoegen </a> | 
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">BedrijfsNaam</th>
      <th scope="col">ContactPersoon</th>
      <th scope="col">product</th>
      <th scope="col">Aantal</th>
      <th scope="col">DatumLevering</th>
      <th scope="col">leverancier details</th>
      <th scope="col">update</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  <?= $data['rows']; ?>
        </tbody>
</table>
</body>
</html>
