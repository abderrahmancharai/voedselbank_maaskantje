<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>wijzigen Allergie</h2>
         <form action="<?= URLROOT; ?>/allergieen/update" method="post">

           
         <input type="hidden" name="PersoonId" value="<?= $data["PersoonId"];?>"> 

            <select name="allergienaam" class="form-control">
            <option>Selecteer allergie</option>
            <option>Soja</option>
            <option>Lactose</option>
            <option>Schaaldieren</option>
            <option>Hazelnoten</option>
            <option>Pindas</option>
            <option>Gluten</option>
            </select>
                
            <div class="form-group row">
            
                <input class="btn btn-secondary mr-1 " type="submit" value="wijzige allergie"> 
            </a>
            <div class="col-md-12 text-md-right">
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/allergieen/index/<?= $data["PersoonId"];?>">terug</a>
       
               <a class="btn btn-primary" href="<?php URLROOT; ?>/homepages/index/">Home</a>
               </div>
            </div>
             
             
            </div>
         </form>
      </div>
   </div>
</div>