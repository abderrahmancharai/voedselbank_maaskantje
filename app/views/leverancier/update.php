<?php require APPROOT . '/views/includes/head.php'; ?>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <h2 class="text-center" style="color: green;">Product wijzigen</h2>

               <form action="<?= URLROOT; ?>/Leverancier/update" method="post">

                  <input type="hidden" name="productId" value="<?= $data["productId"]; ?>">

                  <div class="form-group">
                     <label for="Houdbaarheidsdatum">Houdbaarheids datum</label>
                     <input value="<?= $data["Houdbaarheidsdatum"]; ?>" type="date" name="Houdbaarheidsdatum" id="Houdbaarheidsdatum" class="form-control">
                  </div>

                  <div class="form-group text-center">
                     <button class="btn btn-warning mr-1" type="submit">Opslaan</button>
                     <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Leverancier/index">Terug</a>
                     <a class="btn btn-success" href="<?= URLROOT; ?>/Leverancier/index/">Home</a>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>
