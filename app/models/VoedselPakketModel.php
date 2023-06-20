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
                             Klant.Id
                            ,Klant.Naam
                            ,Gezin.AantalVolwassen
                            ,Gezin.AantalKinderen
                            ,Gezin.AantalBaby
                            FROM Gezin
                            INNER JOIN Klant
                            ON Gezin.Id = Klant.GezinId";

        }catch(PDOException $error){
            echo $error->getMessage();
        }

        $this->db->query($sql);

        $result = $this->db->resultSet();
        return $result;
    }
}