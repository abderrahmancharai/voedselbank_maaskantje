<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>wijzigen van Klant</h2>
         <form action="<?= URLROOT; ?>/allergieen/update" method="post">

           
         <input type="hidden" name="GezinId" value="<?= $data["GezinId"];?>"> 

            <div class="form-group row">
               <label class="col-sm-3 control-label">Naam:</label>
               <input type="text" name ="allergienaam" value="<?= $data["allergienaam"];?>"></input>
            </div>
                
            <div class="form-group row">
            
                <input class="btn btn-warning mr-1 " type="submit" value="sla op"> 
            </a>
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/allergieen/index/<?= $data["GezinId"];?>">terug</a>
       
               <a class="btn btn-success" href="<?php URLROOT; ?>/homepages/index/">Home</a>
            </div>
             
             
            </div>
         </form>
      </div>
   </div>
</div>