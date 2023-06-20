<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>wijzigen van Leveranciergegevens</h2>
         <form action="<?= URLROOT; ?>/VoedselPakket/update" method="post">

             
         <input type="hidden" name="pakketId" value="<?= $data["pakketId"];?>">
         <input type="hidden" name="klantId" value="<?= $data["klantId"];?>">
         <input type="hidden" name="productId" value="<?= $data["productId"];?>">

           
            <div class="form-group row">
               <label class="col-sm-3 control-label">Aantal</label>
               <input type="number" name ="Aantal" value="<?= $data["Aantal"];?>"></input>
            </div>
    

     
       
                
            <div class="form-group row">
            
                <input class="btn btn-warning mr-1 " type="submit" value="sla op"> 
            </a>
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Leverancier/index">terug</a>
       
               <a class="btn btn-success" href="<?php URLROOT; ?>/Leverancier/index/">Home</a>
            </div>
             
             
            </div>
         </form>
      </div>
   </div>
</div>

