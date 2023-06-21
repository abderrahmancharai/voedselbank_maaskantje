<?php require APPROOT . '/views/includes/head.php'; ?>

<style>
   .container-mvckdemo {
      max-width: 600px;
      margin: 0 auto;
   }

   .wrapper-mvckdemo {
      padding: 20px;
      background-color: #f7f7f7;
      border: 1px solid #ddd;
   }

   .form-group {
      margin-bottom: 20px;
   }

   h2 {
      margin-bottom: 20px;
   }

   label {
      font-weight: bold;
   }

   .form-control {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
   }

   .btn {
      display: inline-block;
      padding: 12px 24px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      border-radius: 4px;
      color: #fff;
   }

   .btn-primary {
      background-color: blue;
   }

   .btn-primary:hover {
      background-color: #0056b3;
   }

   .btn-success {
      background-color: blue;
   }

   .btn-success:hover {
      background-color: blue;
   }

   .btn-warning {
      background-color: gray;
      border: none;
   }

   .btn-warning:hover {
      background-color: gray;
   }

   .form-actions {
      margin-top: 20px;
      text-align: right;
   }

   .form-actions .btn {
      margin-left: 10px;
   }
</style>

<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>wijzigen van voedselpakket status</h2>
        
         
   
         <form action="<?= URLROOT; ?>/VoedselPakket/update" method="post">
            <input type="hidden" name="voedselpakketId" value="<?= $data["voedselpakketId"]; ?>">
            
            <div class="form-group row">
               <label class="col-sm-3 control-label">Status</label>
               <select name="Status" class="form-control">
                  <option disvalue="Uitgereikt">Uitgereikt</option>
                  <option value="NietUitgereikt">NietUitgereikt</option>
               </select>
            </div>
            <?php if (!empty($data["successMessage"])) { ?>
                <div class="alert alert-success" role="alert">
                <?= $data["successMessage"]; ?>
                </div>
            <?php } ?>
            <?php if (!empty($data["foutmelding"])) { ?>
                <div class="alert alert-danger" role="alert">
                <?= $data["foutmelding"]; ?>
                </div>
            <?php } ?>

            <div class="form-actions">
               <input class="btn btn-warning mr-1" type="submit" value="wijzig status voedselpakket">
               <a class="btn btn-primary" href="<?php URLROOT; ?>/VoedselPakket/read">Terug</a>
               <a class="btn btn-success" href="<?php URLROOT; ?>/VoedselPakket/index/">Home</a>
            </div>
         </form>
      </div>
   </div>
</div>
