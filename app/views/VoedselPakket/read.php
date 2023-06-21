<?php require APPROOT . '/views/includes/head.php'; ?>
<body>
<p><h3><?= $data["title"]; ?></h3></p>
<form action="<?= URLROOT; ?>/VoedselPakket/read" method="post">
          
            
<div class="form-group row">
    <select name="selecteer eetwens" class="form-control">
          <option>selecteer Eetwensen</option>
        <option value="omnivoor" <?= ($_POST['selecteer_eetwens'] === 'omnivoor') ? 'selected' : ''; ?>>omnivoor</option>
        <option value="vegatarisch" <?= ($_POST['selecteer_eetwens'] === 'vegatarisch') ? 'selected' : ''; ?>>vegetarisch</option>
        <option value="Veganistisch" <?= ($_POST['selecteer_eetwens'] === 'Veganistisch') ? 'selected' : ''; ?>>Veganistisch</option>
        <option value="Geenvarken" <?= ($_POST['selecteer_eetwens'] === 'Geenvarken') ? 'selected' : ''; ?>>Geenvarken</option>
    </select>
</div>

            <div class="form-actions">
               <input class="btn btn-warning mr-1" type="submit" value="toon gezinnen">

               </form>


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
      <?php if (!empty($data["nietgevonden"])) { ?>
                <div class="alert alert-warning" role="alert">
                <?= $data["nietgevonden"]; ?>
                </div>
            <?php } ?>
 
    </tr>
  </thead>
  <tbody>
            <?= $data['rows']; ?>
         
        </tbody>
        
</table>
<a href="<?= URLROOT; ?>/VoedselPakket/read" class="btn btn-primary">Home  </a>

</body>
</html>

<style>
    .form-control{
        width: 20%;
       
    }
</style>


<?php require APPROOT . '/views/includes/footer.php'; ?>
