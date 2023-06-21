<?php

class VoedselPakketModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getgezin()
    {

        try {
            $sql="         
            SELECT
            gezin.Id as gezinId,
        gezin.Naam,
        gezin.Omschrijving,
        gezin.AantalVolwassen,
        gezin.AantalKinderen,
        gezin.AantalBaby,
        CONCAT(persoon.Voornaam, ' ', COALESCE(persoon.Tussenvoegsel, ' '), persoon.Achternaam ) AS vertegwoordiger
        FROM
        gezin
        INNER JOIN
        persoon ON gezin.Id = persoon.GezinId
        WHERE
        persoon.IsVertegenwoordiger = 1
        GROUP BY
        gezin.Naam";
   
            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;

        } catch(PDOException $error) {
            echo $error->getMessage();
            throw $error->getMessage();
        }
    }

    public function details($GezinId)
    {

        try {
            $sql="   

            select 
            voedselpakket.Id as voedselpakketId,
            voedselpakket.PakkketNummer,
            voedselpakket.DatumSamenstelling,
            voedselpakket.DatumUitgifte,
             voedselpakket.Status,
             productpervoedselpakket.Product
             
            from gezin
    
            inner join voedselpakket on
            voedselpakket.GezinId = Gezin.Id
    
             inner join productpervoedselpakket on
                productpervoedselpakket.VoedselpakketId =voedselpakket.Id
                where gezin.Id =:GezinId
    
                group by voedselpakket.PakkketNummer";
   
            $this->db->query($sql);
            $this->db->bind(':GezinId', $GezinId, PDO::PARAM_INT);
            $result = $this->db->resultSet();
            return $result;

        } catch(PDOException $error) {
            echo $error->getMessage();
            throw $error->getMessage();
        }
    }

    public function gezinbyid($GezinId)
    {

        try {
            $sql="         
            select  gezin.naam,
            gezin.Omschrijving,
            gezin.AantalVolwassen + gezin.AantalKinderen +gezin.AantalBaby  as Totaal_personen
            from gezin
            where gezin.Id =:GezinId";
   
            $this->db->query($sql);
            $this->db->bind(':GezinId', $GezinId, PDO::PARAM_INT);
            $result = $this->db->single();
            return $result;

        } catch(PDOException $error) {
            echo $error->getMessage();
            throw $error->getMessage();
        }
    }

    public function getupdateinfo($voedselpakketId )
{

    try {
        $sql="
        SELECT
        
    voedselpakket.PakkketNummer,
 voedselpakket.Id as voedselpakketId,
 voedselpakket.IsActive,

    voedselpakket.Status
  
FROM
    voedselpakket

WHERE
    voedselpakket.Id = :voedselpakketId";

        $this->db->query($sql);
        $this->db->bind(':voedselpakketId', $voedselpakketId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;

    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error->getMessage();
    }
}

   
public function update($POST)
{
    try {
        $sql = "
        UPDATE voedselpakket
        SET voedselpakket.Status = :Status,
            voedselpakket.DatumUitgifte = SYSDATE(6)
            
        WHERE voedselpakket.Id = :voedselpakketId
       ";

        $this->db->query($sql);
        $this->db->bind(':voedselpakketId', $POST["voedselpakketId"], PDO::PARAM_INT);
        $this->db->bind(':Status', $POST["Status"], PDO::PARAM_STR);
      
        $result = $this->db->single();
        return $result;
    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error->getMessage();
    }
}
public function SEARCH($POST)
{
    try {
        $sql = "
        SELECT
        gezin.Id as gezinId,
        gezin.Naam,
        gezin.Omschrijving,
        gezin.AantalVolwassen,
        gezin.AantalKinderen,
        gezin.AantalBaby,
        eetwens.Naam,
        CONCAT(persoon.Voornaam, ' ', COALESCE(persoon.Tussenvoegsel, ' '), persoon.Achternaam ) AS vertegwoordiger
        FROM
        gezin
        INNER JOIN
        persoon ON gezin.Id = persoon.GezinId
        inner join eetwenspergezin on
        eetwenspergezin.GezinId =Gezin.Id
        
        inner join eetwens on
        eetwens.Id =eetwenspergezin.EetwensId
        
        WHERE
        persoon.IsVertegenwoordiger = 1  AND  eetwens.Naam=:selecteer_eetwens
        GROUP BY
        gezin.Naam
       
       ";

        $this->db->query($sql);
        $this->db->bind(':selecteer_eetwens', $POST["selecteer_eetwens"], PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error->getMessage();
    }
}


    
}