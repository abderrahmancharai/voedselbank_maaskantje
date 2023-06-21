<?php

Class VoedselPakketModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }

   public function getPaketten()
    {
        try{
            $sql =  "SELECT 
            Klant.naam,
            pakket.Id as pakketId,
            Klant.Id as KlantId,
            Klant.Naam,
            Gezin.AantalVolwassen,
            Gezin.AantalKinderen,
            Gezin.AantalBaby
            FROM
            Gezin
            INNER JOIN Klant ON Gezin.Id = Klant.GezinId
            INNER JOIN Pakket ON KlantId = Klant.Id
            group by  klant.Id";

        
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;}

        catch(PDOException $error){

         echo $error->getMessage();
        }
    }

    public function getPakketById($id)
    {

        try{
        $sql =  "SELECT 
                         PAK.Id AS PakketId
                        ,KLANT.Id AS KlantId
                        ,KLANT.Naam AS KlantNaam 
                        ,PROD.Categorie
                        ,PAK.Aantal
                        ,PROD.Naam
                        ,PROD.id as productId
                    
                    FROM Pakket AS PAK
                    INNER JOIN Product AS PROD
                    ON PAK.ProductId = PROD.Id
                    
                    INNER JOIN Klant AS KLANT
                    ON KLANT.Id = PAK.KlantId
                    WHERE  KLANT.Id = :id";

                    $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;

        }
        catch(PDOException $error){
            echo $error->getMessage();
        }

        
    }

    public function update($POST)
    {
        try {
            $this->db->query("DELETE FROM Pakket WHERE Pakket.Id = :deletepakketId");
            $this->db->bind(':deletepakketId', $POST["pakketId"], PDO::PARAM_STR);
            $this->db->execute();
    
            $this->db->query("INSERT INTO Pakket (
                                Id,
                                KlantId,
                                ProductId,
                                Aantal,
                                IsActive,
                                Opmerking,
                                DatumAangemaakt,
                                DatumGewijzigd
                            )
                            VALUES (
                                :pakketId,
                                :KlantId,
                                :ProductId,
                                :Aantal,
                                1,
                                NULL,
                                SYSDATE(6),
                                SYSDATE(6)
                            )");
            $this->db->bind(':pakketId', $POST["pakketId"], PDO::PARAM_INT);
            $this->db->bind(':ProductId', $POST["productId"], PDO::PARAM_INT);
            $this->db->bind(':KlantId', $POST["klantId"], PDO::PARAM_INT);
            $this->db->bind(':Aantal', $POST["Aantal"], PDO::PARAM_INT);
            $this->db->execute();
    
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
    

public function getallproducts($klantId)
{
    try{
        $sql =  
                "SELECT 
                    PAK.Id AS PakketId,
                    KLANT.Id AS KlantId,
                    PROD.Id AS ProductId,
                    KLANT.Naam AS KlantNaam,
                    PROD.Categorie,
                    PAK.Aantal,
                    PROD.Naam

                FROM Product AS PROD
                inner JOIN Pakket AS PAK ON PAK.ProductId = PROD.Id
                inner JOIN Klant AS KLANT ON KLANT.Id = PAK.KlantId AND KLANT.Id = :id ;";

     
        $this->db->query($sql);
        $this->db->bind(':id', $klantId, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;

           }catch(PDOException $error){
            echo $error->getMessage();
        }
}

public function getvoedselpakketbyIds($ProductId)
{
    try{
      $sql ="  
                SELECT pakket.Id  as pakketId
                ,klant.Id  as klantId
                ,product.Id as productId
                ,pakket.Aantal
                from pakket
                inner JOIN product ON pakket.ProductId = product.Id
                inner JOIN Klant  ON KLANT.Id = pakket.KlantId
                where product.id = :ProductId
            ;";

        }catch(PDOException $error){
            echo $error->getMessage();
        }

        $this->db->query($sql);
        $this->db->bind(':ProductId', $ProductId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
}

public function delete($id) {
    try{$this->db->query("DELETE FROM Pakket WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);


      return $this->db->execute();
    }catch(PDOException $e){
    }
    
    }
    
}