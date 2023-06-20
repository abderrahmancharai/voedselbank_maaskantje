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
}