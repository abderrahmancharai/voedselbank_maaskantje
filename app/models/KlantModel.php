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
}