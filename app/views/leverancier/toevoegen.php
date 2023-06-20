<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>wijzigen van Leveranciergegevens</h2>
         <form action="<?= URLROOT; ?>/Leverancier/toevoegen" method="post">

             
         

            <div class="form-group row">
               <label class="col-sm-3 control-label">BedrijfsNaam</label>
               <input type="text"  name ="BedrijfsNaam"></input>
            </div>
            
            <div class="form-group row">
               <label class="col-sm-3 control-label">product</label>
               <input type="text"  name ="product"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Barcode</label>
               <input type="text"  name ="Barcode"  ></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Categorie</label>
               <input type="text"  name ="Categorie"  ></input>
            </div>

         

            <div class="form-group row">
               <label class="col-sm-3 control-label">ContactPersoon</label>
               <input type="text"  name ="ContactPersoon"  ></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Mobiel</label>
               <input type="text"  style="width:12rem" name ="Mobiel"></input>
            </div>
            <div class="form-group row">
               <label class="col-sm-3 control-label">Email</label>
               <input type="text"  style="width:12rem" name ="Email"></input>
            </div>
         
            <div class="form-group row">
               <label class="col-sm-3 control-label">Straat</label>
               <input type="text" name ="Straat" ></input>
            </div>


            <div class="form-group row">
               <label class="col-sm-3 control-label">Huisnummer</label>
               <input type="number" name ="Huisnummer" style="width:12rem"></input>
            </div>

      

            <div class="form-group row">
               <label class="col-sm-3 control-label">Postcode</label>
               <input type="text" name ="Postcode"  ></input>
            </div>
            
            <div class="form-group row">
               <label class="col-sm-3 control-label"> DatumLevering</label>
               <input type="date" name ="DatumLevering"  ></input>
            </div>
        
            <div class="form-group row">
               <label class="col-sm-3 control-label">DatumEerstVolgendeLevering</label>
               <input type="date" name ="DatumEerstVolgendeLevering"></input>
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

