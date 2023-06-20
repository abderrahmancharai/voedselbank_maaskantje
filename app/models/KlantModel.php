<?php
class KlantModel {
    // Properties, fields
    private $db;
    public $helper;

    public function __construct() 
    {
      $this->db = new Database();
    }

    public function getKlant()
    {
        try
         { $sql = "SELECT  klant.id AS klantId
                     ,Klant.Naam
                     ,Contact.Plaats
                     ,Contact.Telefoonnummer
                     ,Contact.Email
                     ,Gezin.AantalVolwassen
                     ,Gezin.AantalKinderen
                     ,Gezin.AantalBaby
              FROM Gezin

              INNER JOIN Klant
              ON Gezin.Id = Klant.GezinId

              INNER JOIN Contact
              ON Klant.Id = Contact.KlantId;";

            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;

         } catch(PDOException $error)
        {
            echo $error->getMessage();

            throw $error->getMessage();
        }
    }

    public function KlantUpdatedetails($klantId)
{
    try
    {
        $sql = "SELECT Gezin.Id AS GezinId,
                Klant.Naam,
                Contact.Plaats,
                Contact.Telefoonnummer,
                Contact.Email,
                Gezin.AantalVolwassen,
                Gezin.AantalKinderen,
                Gezin.AantalBaby
                FROM Gezin
                INNER JOIN Klant ON Gezin.Id = Klant.GezinId
                INNER JOIN Contact ON Klant.Id = Contact.KlantId
                WHERE klant.Id = :klantId";

        $this->db->query($sql);
        $this->db->bind(':klantId', $klantId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

   public function KlantUpdate($POST)
    {
        try
         { $sql = "UPDATE Gezin

                    INNER JOIN Klant 
                    ON Gezin.Id = Klant.GezinId

                    INNER JOIN Contact 
                    ON Klant.Id = Contact.klantId

                    SET Klant.Naam = :Naam,
                        Contact.Plaats = :Plaats,
                        Contact.Telefoonnummer = :Telefoonnummer,
                        Contact.Email = :Email,
                        Gezin.AantalVolwassen = :AantalVolwassen,
                        Gezin.AantalKinderen = :AantalKinderen,
                        Gezin.AantalBaby = :AantalBaby

                    WHERE Gezin.Id = :GezinId;";
                    
            $this->db->query($sql);
            $this->db->bind(':Naam', $POST["naam"], PDO::PARAM_STR);
            $this->db->bind(':Plaats', $POST["Plaats"], PDO::PARAM_STR); 
            $this->db->bind(':Telefoonnummer', $POST["Telefoonnummer"], PDO::PARAM_STR); 
            $this->db->bind(':Email', $POST["Email"], PDO::PARAM_STR); 
            $this->db->bind(':AantalVolwassen', $POST["AantalVolwassen"], PDO::PARAM_INT); 
            $this->db->bind(':AantalKinderen', $POST["AantalKinderen"], PDO::PARAM_INT); 
            $this->db->bind(':AantalBaby', $POST["AantalBaby"], PDO::PARAM_INT);
            $this->db->bind(':GezinId', $POST["GezinId"], PDO::PARAM_INT);

            $result = $this->db->single();
            return $result;

         } catch(PDOException $error)
        {
            echo $error->getMessage();

            throw $error->getMessage();
        }
    }

    public function delete($klantId)
    {
      $sql="DELETE FROM Contact WHERE Contact.Id = :klantId";
        $this->db->query($sql);
        $this->db->bind(':klantId', $klantId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;

        $sql="DELETE FROM Gezin WHERE Gezin.Id = :klantId";
        $this->db->query($sql);
        $this->db->bind(':klantId', $klantId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;

        $sql="DELETE FROM Klant WHERE Klant.Id = :klantId";
        $this->db->query($sql);
        $this->db->bind(':klantId', $klantId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    }

    public function createKlant($post) {
    try {
    
   
        // Insert into Gezin table
        $this->db->query("INSERT INTO Gezin (AantalVolwassen, 
                                             AantalKinderen, 
                                             AantalBaby, 
                                             IsActive, 
                                             Opmerking, 
                                             DatumAangemaakt, 
                                             Datumgewijzigd)
            VALUES (:aantalVolwassen, :AantalKinderen, :AantalBaby, 1, NULL, SYSDATE(6), SYSDATE(6));
        ");
  $this->db->bind(':aantalVolwassen', $post['aantalVolwassen'], PDO::PARAM_INT);
  $this->db->bind(':AantalKinderen', $post['AantalKinderen'], PDO::PARAM_INT);
  $this->db->bind(':AantalBaby', $post['AantalBaby'], PDO::PARAM_INT);

        $this->db->execute();


        // Insert into Klant table
        $this->db->query("INSERT INTO Klant (GezinId, 
                               Naam, 
                               IsActive, 
                               DatumAangemaakt, 
                               Datumgewijzigd)
            VALUES (LAST_INSERT_ID(), :naam, 1, SYSDATE(6), SYSDATE(6))
        ");

        $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
        $this->db->execute();



        // Insert into Allergie table
        $this->db->query("INSERT INTO Contact (KlantId, 
                                                 Plaats,
                                                 Telefoonnummer,
                                                 Email, 
                                                 IsActive, 
                                                 DatumAangemaakt, 
                                                 Datumgewijzigd)
            VALUES (LAST_INSERT_ID(), :Plaats, :Telefoonnummer, :Email, 1, SYSDATE(6), SYSDATE(6))
        ");

        $this->db->bind(':Plaats', $post['Plaats'], PDO::PARAM_STR);
        $this->db->bind(':Telefoonnummer', $post['Telefoonnummer'], PDO::PARAM_STR);
        $this->db->bind(':Email', $post['Email'], PDO::PARAM_STR);
        $this->db->execute();



        return true;
    } catch (PDOException $e) {
        echo "Databasefout: " . $e->getMessage();
        return false;
    }
}
}