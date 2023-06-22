    <?php
    class allergieenModel {
        // Properties, fields
        private $db;
        public $helper;

        public function __construct() 
        {
        $this->db = new Database();
        }

        public function getallergieen()
        {
            try
            { $sql = "SELECT   Gezin.id AS GezinId,
                                Gezin.Naam AS Gezinsnaam,
                                Gezin.Omschrijving,
                                Gezin.AantalVolwassenen,
                                Gezin.AantalKinderen,
                                Gezin.AantalBabys,
                                CONCAT_WS(' ', Persoon.Voornaam, NULLIF(Persoon.Tussenvoegsel, ''), Persoon.Achternaam) AS VertegenwoordigerNaam 
                        FROM Gezin
                        INNER JOIN Persoon 
                        ON Gezin.Id = Persoon.GezinId
                        WHERE Persoon.IsVertegenwoordiger = 1;";

                $this->db->query($sql);
                $result = $this->db->resultSet();
                return $result;

            } catch(PDOException $error)
            {
                echo $error->getMessage();

                throw $error->getMessage();
            }
        }

        public function getselecteer($POST)
        {
            try
            { $sql = "SELECT   Gezin.id AS GezinId,
                                Gezin.Naam AS Gezinsnaam,
                                Allergie.Naam,
                                Gezin.Omschrijving,
                                Gezin.AantalVolwassenen,
                                Gezin.AantalKinderen,
                                Gezin.AantalBabys,
                                CONCAT_WS(' ', Persoon.Voornaam, NULLIF(Persoon.Tussenvoegsel, ''), Persoon.Achternaam) AS VertegenwoordigerNaam 
                        FROM Gezin
                        INNER JOIN Persoon 
                        ON Gezin.Id = Persoon.GezinId
                        inner join AllergiePerPersoon on
                        AllergiePerPersoon.PersoonId = Persoon.Id
                        
                     
                        inner join Allergie on
                        Allergie.Id = AllergiePerPersoon.AllergieId
                        WHERE   Allergie.Naam = :allergienaam ;";

                $this->db->query($sql);
                $this->db->bind(':allergienaam', $POST["allergie"], PDO::PARAM_STR);
                $result = $this->db->resultSet();
                return $result;

            } catch(PDOException $error)
            {
                echo $error->getMessage();

                throw $error->getMessage();
            }
        }

       public function getAllergeenById($GezinId)
       {
    try {
        $sql = "SELECT Gezin.id,
                       Gezin.Naam AS Gezinsnaam,
                       Gezin.Omschrijving AS omschrijving,
                       Gezin.TotaalAantalPersonen
                FROM Gezin
                WHERE Gezin.Id = :gezinid";

        $this->db->query($sql);
        $this->db->bind(':gezinid', $GezinId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
       }

        public function allergieendetails($GezinId)
    {
        try
        {
            $sql = "SELECT 
                Gezin.id as GezinId,
                Persoon.Id as PersoonId,
                Persoon.Voornaam, 
                Persoon.TypePersoon, 
                Allergie.Naam,
                Persoon.IsVertegenwoordiger
                
            FROM Gezin
            INNER JOIN Persoon ON Gezin.Id = Persoon.GezinId
            LEFT JOIN AllergiePerPersoon ON Persoon.Id = AllergiePerPersoon.PersoonId
            LEFT JOIN Allergie ON AllergiePerPersoon.AllergieId = Allergie.Id
            WHERE Gezin.Id = :gezinid";

            $this->db->query($sql);
            $this->db->bind(':gezinid', $GezinId, PDO::PARAM_INT);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $error) {
            echo $error->getMessage();
            throw $error;
        }
    }

    public function update($POST)
{
    try {
        $sql = "UPDATE AllergiePerPersoon
                INNER JOIN Persoon ON Persoon.Id = AllergiePerPersoon.PersoonId
                INNER JOIN Gezin ON Gezin.Id = Persoon.GezinId
                INNER JOIN Allergie ON Allergie.Id = AllergiePerPersoon.AllergieId
                SET Allergie.Naam = :allergienaam
                WHERE Persoon.Id = :PersoonId;";

        $this->db->query($sql);
        $this->db->bind(':allergienaam', $POST["allergienaam"], PDO::PARAM_STR);
        $this->db->bind(':PersoonId', $POST["PersoonId"], PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

    public function updatedetails($PersoonId, )
 {
    try {
        $sql = "SELECT Persoon.Id AS PersoonId,
                       Allergie.Naam
                FROM AllergiePerPersoon

                INNER JOIN Persoon 
                ON Persoon.Id = AllergiePerPersoon.PersoonId

                INNER JOIN Gezin 
                ON Gezin.Id = Persoon.GezinId

                INNER JOIN Allergie 
                ON Allergie.Id = AllergiePerPersoon.AllergieId

                WHERE Persoon.Id = :PersoonId;";

        $this->db->query($sql);
        $this->db->bind(':PersoonId', $PersoonId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result;
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}


     
    }