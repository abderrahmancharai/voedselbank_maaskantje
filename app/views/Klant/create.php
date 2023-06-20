<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>Klant toevoegen</h2>
         <form action="<?= URLROOT; ?>/Klant/create" method="post">

             
         

           <div class="form-group row">
               <label class="col-sm-3 control-label">Naam:</label>
               <input type="text"  name ="naam"></input>
            </div>


            <div class="form-group row">
               <label class="col-sm-3 control-label">Plaats:</label>
               <input type="text" required name ="Plaats"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Telefoonnummer:</label>
               <input type="number" required name ="Telefoonnummer"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Email:</label>
               <input type="text" required name ="Email"></input>
            </div>
            <!-- minlength="11" maxlength="11" -->

            <div class="form-group row">
               <label class="col-sm-3 control-label">AantalVolwassen:</label>
               <input type="number" required name ="aantalVolwassen"></input>
            </div>


            <div class="form-group row">
               <label class="col-sm-3 control-label">AantalKinderen:</label>
               <input type="number" required name ="AantalKinderen"></input>
            </div>
      

            <div class="form-group row">
               <label class="col-sm-3 control-label">AantalBaby:</label>
               <input type="number" required name ="AantalBaby"></input>
            </div>
                
            <div class="form-group row">
            
                <input class="btn btn-warning mr-1 " type="submit" value="sla op"> 
            </a>
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Klant/index/">terug</a>
       
               <a class="btn btn-success" href="<?php URLROOT; ?>/homepages/index/">Home</a>
            </div>
            </div>
         </form>
      </div>
   </div>
</div>