<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>wijzigen van Klant</h2>
         <form action="<?= URLROOT; ?>/Klant/update" method="post">

           
         <input type="hidden" name="GezinId" value="<?= $data["GezinId"];?>"> 

            <div class="form-group row">
               <label class="col-sm-3 control-label">Naam:</label>
               <input type="text"  name ="naam" value="<?= $data["Naam"];?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Plaats:</label>
               <input type="text"  name ="Plaats"  value="<?= $data["Plaats"];?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Telefoonnummer:</label>
               <input type="number"  name ="Telefoonnummer"  value="<?= $data["Telefoonnummer"];?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Email:</label>
               <input type="text"  name ="Email"  value="<?= $data["Email"];?>"></input>
            </div>
            <!-- minlength="11" maxlength="11" -->

            <div class="form-group row">
               <label class="col-sm-3 control-label">AantalVolwassen:</label>
               <input type="number" name ="AantalVolwassen"  value="<?= $data["AantalVolwassen"];?>"></input>
            </div>


            <div class="form-group row">
               <label class="col-sm-3 control-label">AantalKinderen:</label>
               <input type="number" name ="AantalKinderen"  value="<?= $data["AantalKinderen"];?>"></input>
            </div>

      

            <div class="form-group row">
               <label class="col-sm-3 control-label">AantalBaby:</label>
               <input type="number" name ="AantalBaby"  value="<?= $data["AantalBaby"];?>"></input>
            </div>
       
                
            <div class="form-group row">
            
                <input class="btn btn-warning mr-1 " type="submit" value="sla op"> 
            </a>
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Klant/index/<?= $data["GezinId"];?>">terug</a>
       
               <a class="btn btn-success" href="<?php URLROOT; ?>/homepages/index/">Home</a>
            </div>
             
             
            </div>
         </form>
      </div>
   </div>
</div>
