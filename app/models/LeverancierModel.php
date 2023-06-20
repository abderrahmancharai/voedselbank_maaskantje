<?php
class LeverancierModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getleverancier()
    {

        try {
            $sql="
        select
        leverancier.Id as leverancierId,
             leverancier.BedrijfsNaam,
		leverancier.ContactPersoon,
         product.naam,
        leverancier.aantal,
        productperleverancier.DatumLevering
       
        
        from leverancier
        
        inner join  productperleverancier on
        Leverancier.Id = productperleverancier.LeverancierId
        
         inner join  product on
        product.Id = productperleverancier.ProductId";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;

        }
         catch(PDOException $error) {
            echo $error->getMessage();
            throw $error->getMessage();
        }
    }
    public function update($POST)
    {

        try{   $sql="
        UPDATE 		leverancier

        inner join  productperleverancier on
                Leverancier.Id = productperleverancier.LeverancierId
                
                  inner join  leveranciercontact on
                Leverancier.Id = leveranciercontact.LeverancierId
                
                 inner join  product on
                product.Id = productperleverancier.ProductId
                
        SET		 	leverancier.BedrijfsNaam = :BedrijfsNaam,
                leverancier.ContactPersoon = :ContactPersoon,
                leveranciercontact.Email =:Email,
                  leveranciercontact.Mobiel = :Mobiel,
                          leveranciercontact.Straat = :Straat,
                            leveranciercontact.Huisnummer = :Huisnummer,
                       leveranciercontact.Postcode =:Postcode,
                        productperleverancier.DatumLevering =:DatumLevering,
                       productperleverancier.DatumEerstVolgendeLevering =:DatumEerstVolgendeLevering,
                       product.Naam = :product
        WHERE 		leverancier.Id = :leverancierId
       ";

        $this->db->query($sql);
        $this->db->bind(':BedrijfsNaam', $POST["BedrijfsNaam"], PDO::PARAM_STR);
        $this->db->bind(':leverancierId', $POST["leverancierId"], PDO::PARAM_STR);
        $this->db->bind(':ContactPersoon', $POST["ContactPersoon"], PDO::PARAM_STR);
        $this->db->bind(':Email', $POST["Email"], PDO::PARAM_STR);
        $this->db->bind(':Mobiel', $POST["Mobiel"], PDO::PARAM_STR);
        $this->db->bind(':Straat', $POST["Straat"], PDO::PARAM_STR);
        $this->db->bind(':Huisnummer', $POST["Huisnummer"], PDO::PARAM_STR);
        $this->db->bind(':Postcode', $POST["Postcode"], PDO::PARAM_STR);
        $this->db->bind(':DatumLevering', $POST["DatumLevering"], PDO::PARAM_STR);
        $this->db->bind(':DatumEerstVolgendeLevering', $POST["DatumEerstVolgendeLevering"], PDO::PARAM_STR);
        $this->db->bind(':product', $POST["product"], PDO::PARAM_STR);
        $result = $this->db->single();
        return $result;
    }catch(PDOException $error){
        echo $error->getMessage();
    }

    }
    public function updateleverancierbyid($LeverancierId)
    {

        try{ $sql="
        select 
        leverancier.id as leverancierId,
            leverancier.BedrijfsNaam,
            productperleverancier.DatumLevering,
		leverancier.ContactPersoon,
        leveranciercontact.Email,
          leveranciercontact.Mobiel,
          leveranciercontact.Huisnummer,
                  leveranciercontact.Straat,
               leveranciercontact.Postcode,
               productperleverancier.DatumEerstVolgendeLevering,
               product.Naam
       
        
        
         from leverancier
        
        inner join  productperleverancier on
        Leverancier.Id = productperleverancier.LeverancierId
        
          inner join  leveranciercontact on
        Leverancier.Id = leveranciercontact.LeverancierId
        
         inner join  product on
        product.Id = productperleverancier.ProductId
        
        where leverancier.Id =:leverancierId";
  
        $this->db->query($sql);
        $this->db->bind(':leverancierId', $LeverancierId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    }catch(PDOException $error){
        echo $error->getMessage();
    }

    }

    public function detailsname($LeverancierId)
    {

        try{ $sql="
        select leverancier.BedrijfsNaam,
		leverancier.ContactPersoon
         from leverancier
        where leverancier.Id =:leverancierId";
   
        $this->db->query($sql);
        $this->db->bind(':leverancierId', $LeverancierId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    }catch(PDOException $error){
        echo $error->getMessage();
    }
    }
    public function detailsleverancierbyid($LeverancierId)
    {

        try{$sql="
        select leverancier.BedrijfsNaam,
		leverancier.ContactPersoon,
        leveranciercontact.Email,
          leveranciercontact.Mobiel,
          leveranciercontact.Huisnummer,
                  leveranciercontact.Straat,
               leveranciercontact.Postcode,
               productperleverancier.DatumEerstVolgendeLevering,
               product.Naam
       
        
        
         from leverancier
        
        inner join  productperleverancier on
        Leverancier.Id = productperleverancier.LeverancierId
        
          inner join  leveranciercontact on
        Leverancier.Id = leveranciercontact.LeverancierId
        
         inner join  product on
        product.Id = productperleverancier.ProductId
        
        where leverancier.Id =:leverancierId";
   

        $this->db->query($sql);
        $this->db->bind(':leverancierId', $LeverancierId, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;
    }catch(PDOException $error){
        echo $error->getMessage();
    }

    }
    public function toevoegen($POST)
    {
        try{ $this->db->query(" INSERT INTO leverancier (BedrijfsNaam, ContactPersoon, IsActive, DatumAangemaakt, Datumgewijzigd) 
            VALUES (:BedrijfsNaam, :ContactPersoon, 1, SYSDATE(6), SYSDATE(6))");

        $this->db->bind(':BedrijfsNaam', $POST["BedrijfsNaam"], PDO::PARAM_STR);
        $this->db->bind(':ContactPersoon', $POST["ContactPersoon"], PDO::PARAM_STR);
        $this->db->execute();



        $this->db->query("INSERT INTO leveranciercontact (LeverancierId, Email, Mobiel,Straat,Huisnummer,Postcode, IsActive, DatumAangemaakt, Datumgewijzigd) 
             VALUES (LAST_INSERT_ID(),:Email, :Mobiel, :Straat, :Huisnummer, :Postcode,1, SYSDATE(6), SYSDATE(6))");

        $this->db->bind(':Email', $POST["Email"], PDO::PARAM_STR);
        $this->db->bind(':Mobiel', $POST["Mobiel"], PDO::PARAM_STR);
        $this->db->bind(':Straat', $POST["Straat"], PDO::PARAM_STR);
        $this->db->bind(':Mobiel', $POST["Mobiel"], PDO::PARAM_STR);
        $this->db->bind(':Huisnummer', $POST["Huisnummer"], PDO::PARAM_INT);
        $this->db->bind(':Postcode', $POST["Postcode"], PDO::PARAM_STR);
        $this->db->execute();


        $this->db->query("INSERT INTO product (Naam, Barcode, Categorie,  IsActive, DatumAangemaakt, Datumgewijzigd) 
            VALUES (:product, :Barcode, :Categorie,  1, SYSDATE(6), SYSDATE(6));");
        $this->db->bind(':Categorie', $POST["Categorie"], PDO::PARAM_STR);
        $this->db->bind(':Barcode', $POST["Barcode"], PDO::PARAM_STR);
        $this->db->bind(':product', $POST["product"], PDO::PARAM_STR);
        $this->db->execute();


        $this->db->query("INSERT INTO productperleverancier (LeverancierId, ProductId, DatumLevering, DatumEerstVolgendeLevering, DatumAangemaakt, Datumgewijzigd) 
            VALUES (LAST_INSERT_ID(), LAST_INSERT_ID(), :DatumLevering, :DatumEerstVolgendeLevering, SYSDATE(6), SYSDATE(6));");
        $this->db->bind(':DatumLevering', $POST["DatumLevering"], PDO::PARAM_STR);
        $this->db->bind(':DatumEerstVolgendeLevering', $POST["DatumEerstVolgendeLevering"], PDO::PARAM_STR);
        return $this->db->execute();
    }catch(PDOException $error){
        echo $error->getMessage();
    }
    }

    public function delete($LeverancierId)
    {
        $sql=" DELETE FROM productperleverancier WHERE `productperleverancier`.`Id` = :leverancierId";
        $this->db->query($sql);
        $this->db->bind(':leverancierId', $LeverancierId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
       
    }
    

   
}





    
