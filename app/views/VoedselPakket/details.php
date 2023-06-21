<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>
<style>
    .detail {
        border-collapse: collapse;
        margin-bottom: 20px; 
    }

    .detail td {
        border: 1px solid black;
        padding: 10px;
    }
</style>
<div class="detail">
<table>
    <tr>
        <td style="width: 30%;">Naam:</td>
        <td style="width: 70%;"><?= $data["naam"]; ?></td>
    </tr>
    <tr>
        <td>Omschrijving:</td>
        <td><?= $data["omschrijving"]; ?></td>
    </tr>
    <tr>
        <td>Totaal personen:</td>
        <td><?= $data["Totaal_personen"]; ?></td>
    </tr>
</table>
</div>


 
    <table class="table p-10">
  <thead class="thead-dark">
    <tr>
      <th scope="col">PakkketNummer</th>
      <th scope="col">DatumSamenstelling</th>
      <th scope="col">DatumUitgifte</th>
      <th scope="col">Status</th>
      <th scope="col">Product</th>
      <th scope="col">wijzig status</th>
 
 
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
 </tbody>
</table>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>
