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
}