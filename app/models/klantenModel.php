<?php
class klantenModel
{
  // Properties, fields
  private $db;
  public $helper;

  public function __construct()
  {
    $this->db = new Database();
  }

public function getklant()
    {
        $sql = "SELECT
    Persoon.Id AS Id,
    Persoon.GezinId AS GezinId,
    Gezin.Naam AS NaamGezin,
    CONCAT_WS(' ', Persoon.Voornaam, NULLIF(Persoon.Tussenvoegsel, ''), Persoon.Achternaam) AS Vertegenwoordiger,
    Contact.Email AS E_mailadres,
    Contact.Mobiel,
    CONCAT_WS(' ', Contact.Straat, Contact.Huisnummer) AS Adres,
    Contact.Woonplaats,
    Contact.Postcode
FROM
    Persoon
    LEFT JOIN Gezin ON Persoon.GezinId = Gezin.Id
    LEFT JOIN ContactPerGezin ON Persoon.GezinId = ContactPerGezin.GezinId
    LEFT JOIN Contact ON ContactPerGezin.ContactId = Contact.Id
WHERE
    Persoon.Isvertegenwoordiger = 1;



";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
}

public function getselecteer($POST)
    {
        $sql = "SELECT
    Persoon.Id AS Id,
    Gezin.Naam AS NaamGezin,
    CONCAT_WS(' ', Persoon.Voornaam, Persoon.Tussenvoegsel, Persoon.Achternaam) AS Vertegenwoordiger,
    Contact.Email AS E_mailadres,
    Contact.Mobiel,
    Contact.Straat AS Adres,
    Contact.Woonplaats,
    Contact.Postcode AS Postcode
FROM
    Persoon
    LEFT JOIN Gezin ON Persoon.GezinId = Gezin.Id
    LEFT JOIN ContactPerGezin ON Persoon.GezinId = ContactPerGezin.GezinId
    LEFT JOIN Contact ON ContactPerGezin.ContactId = Contact.Id
WHERE
    Contact.Postcode = :Postcode;

";
        $this->db->query($sql);
        $this->db->bind(':Postcode', $POST["Postcode"], PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
}

public function details($PersoonId)
{
    try {
        $sql = "
       SELECT
       p.Id,
        p.Voornaam,
        p.Tussenvoegsel,
        p.Achternaam,
        p.Geboortedatum,
        p.TypePersoon,
        CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
        c.Straat AS Straatnaam,
        c.Huisnummer,
        c.Toevoeging,
        c.Postcode,
        c.Woonplaats,
        c.Email,
        c.Mobiel
    FROM
        Persoon AS p
    INNER JOIN
        Contact AS c ON p.Id = c.Id
    WHERE
        p.id = :persoonid
        ";

        $this->db->query($sql);
        $this->db->bind(':persoonid', $PersoonId, PDO::PARAM_INT);

        $result = $this->db->resultSet();
        return $result;

    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

// Dit is detailsinfo
public function detailsinfo($PersoonId)
{
    try {
        $sql = "
       SELECT
         p.Id,
        p.Voornaam,
        p.Tussenvoegsel,
        p.Achternaam,
        p.Geboortedatum,
        p.TypePersoon,
        CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
        c.Straat AS Straatnaam,
        c.Huisnummer,
        c.Toevoeging,
        c.Postcode,
        c.Woonplaats,
        c.Email,
        c.Mobiel
    FROM
        Persoon AS p
    INNER JOIN
        Contact AS c ON p.Id = c.Id
    WHERE
        p.id = :persoonid
        ";

        $this->db->query($sql);
        $this->db->bind(':persoonid', $PersoonId, PDO::PARAM_INT);

        $result = $this->db->single();
        return $result;

    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

public function updateinfo($POST)
{
    try {
        $sql = "
            UPDATE Persoon AS p
            INNER JOIN Contact AS c ON p.Id = c.Id
            SET
                p.Voornaam = :voornaam,
                p.Tussenvoegsel = :tussenvoegsel,
                p.Achternaam = :achternaam,
                p.Geboortedatum = :geboortedatum,
                p.TypePersoon = :typePersoon,
                c.Straat = :straatnaam,
                c.Huisnummer = :huisnummer,
                c.Toevoeging = :toevoeging,
                c.Postcode = :postcode,
                c.Woonplaats = :woonplaats,
                c.Email = :email,
                c.Mobiel = :mobiel
            WHERE
                p.Id = :PersoonId
        ";

        $this->db->query($sql);
        $this->db->bind(':voornaam', $POST['voornaam'], PDO::PARAM_STR);
        $this->db->bind(':tussenvoegsel', $POST['tussenvoegsel'], PDO::PARAM_STR);
        $this->db->bind(':achternaam', $POST['achternaam'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $POST['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':typePersoon', $POST['typePersoon'], PDO::PARAM_STR);
        $this->db->bind(':straatnaam', $POST['straatnaam'], PDO::PARAM_STR);
        $this->db->bind(':huisnummer', $POST['huisnummer'], PDO::PARAM_INT);
        $this->db->bind(':toevoeging', $POST['toevoeging'], PDO::PARAM_STR);
        $this->db->bind(':postcode', $POST['postcode'], PDO::PARAM_STR);
        $this->db->bind(':woonplaats', $POST['woonplaats'], PDO::PARAM_STR);
        $this->db->bind(':email', $POST['email'], PDO::PARAM_STR);
        $this->db->bind(':mobiel', $POST['mobiel'], PDO::PARAM_STR);
        $this->db->bind(':PersoonId', $POST['PersoonId'], PDO::PARAM_INT);
        $this->db->execute();

        // Return the number of affected rows
        return $this->db->rowCount();
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

public function update($POST)
{
    try {
        $sql = "
             UPDATE Persoon AS p
            INNER JOIN Contact AS c ON p.Id = c.Id
            SET
                p.Voornaam = :voornaam,
                p.Tussenvoegsel = :tussenvoegsel,
                p.Achternaam = :achternaam,
                p.Geboortedatum = :geboortedatum,
                p.TypePersoon = :typePersoon,
                p.IsVertegenwoordiger = :vertegenwoordiger,
                c.Straat = :straatnaam,
                c.Huisnummer = :huisnummer,
                c.Toevoeging = :toevoeging,
                c.Postcode = :postcode,
                c.Woonplaats = :woonplaats,
                c.Email = :email,
                c.Mobiel = :mobiel
            WHERE
                p.Id = :persoonId
        ";

        $this->db->query($sql);
        $this->db->bind(':voornaam', $POST['voornaam'], PDO::PARAM_STR);
        $this->db->bind(':tussenvoegsel', $POST['tussenvoegsel'], PDO::PARAM_STR);
        $this->db->bind(':achternaam', $POST['achternaam'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $POST['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':typePersoon', $POST['typePersoon'], PDO::PARAM_STR);
        $this->db->bind(':vertegenwoordiger', $POST['vertegenwoordiger'], PDO::PARAM_INT);
        $this->db->bind(':straatnaam', $POST['straatnaam'], PDO::PARAM_STR);
        $this->db->bind(':huisnummer', $POST['huisnummer'], PDO::PARAM_INT);
        $this->db->bind(':toevoeging', $POST['toevoeging'], PDO::PARAM_STR);
        $this->db->bind(':postcode', $POST['postcode'], PDO::PARAM_STR);
        $this->db->bind(':woonplaats', $POST['woonplaats'], PDO::PARAM_STR);
        $this->db->bind(':email', $POST['email'], PDO::PARAM_STR);
        $this->db->bind(':mobiel', $POST['mobiel'], PDO::PARAM_STR);
        $this->db->bind(':persoonId', $POST['persoonId'], PDO::PARAM_INT);

        $this->db->execute();

        return $this->db->rowCount();
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}


}
// public function getKlantDetails($klantId)
// {
//     try {
//         $sql = "
//         SELECT
//             p.Voornaam,
//             p.Tussenvoegsel,
//             p.Achternaam,
//             p.Geboortedatum,
//             p.TypePersoon,
//             CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
//             c.Straat AS Straatnaam,
//             c.Huisnummer,
//             c.Toevoeging,
//             c.Postcode,
//             c.Woonplaats,
//             c.Email,
//             c.Mobiel
//         FROM
//             Persoon AS p
//         INNER JOIN
//             Contact AS c ON p.Id = c.Id
//         WHERE
//             p.Id = :klantId";

//         $this->db->query($sql);
//         $this->db->bind(':klantId', $klantId);
//         $result = $this->db->single();
//         return $result;
//     } catch(PDOException $error) {
//         echo $error->getMessage();
//         throw $error->getMessage();
//     }
// }
// }
// public function getklantoverzicht()
// {
    // $sql = "SELECT
    //     p.Voornaam,
    //     p.Tussenvoegsel,
    //     p.Achternaam,
    //     p.Geboortedatum,
    //     p.TypePersoon,
    //     CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
    //     c.Straat AS Straatnaam,
    //     c.Huisnummer,
    //     c.Toevoeging,
    //     c.Postcode,
    //     c.Woonplaats,
    //     c.Email,
    //     c.Mobiel
    // FROM
    //     Persoon AS p
    // INNER JOIN
    //     Contact AS c ON p.Id = c.Id";

//     $this->db->query($sql);
//     $result = $this->db->resultSet();
//     return $result;
// }

// public function getklantoverzichtbyid($contactId)
// {
//     $sql = "SELECT
//         p.Voornaam,
//         p.Tussenvoegsel,
//         p.Achternaam,
//         p.Geboortedatum,
//         p.TypePersoon,
//         CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
//         c.Straat AS Straatnaam,
//         c.Huisnummer,
//         c.Toevoeging,
//         c.Postcode,
//         c.Woonplaats,
//         c.Email,
//         c.Mobiel
//     FROM
//         Persoon AS p
//     INNER JOIN
//         Contact AS c ON p.Id = c.Id
//     WHERE
//         c.Id = :contactId";

//     $this->db->query($sql);
//     $this->db->bind(':contactId', $contactId);
//     $result = $this->db->resultSet();
//     return $result;
// }

// }

  // public function getklantbyid($persoonId)
  // {
  //   $sql = "select 
	// typepersoon.Id as  typepersoonId
  //   ,persoon.Id    as  persoonId 
  //   ,contact.Id    as  contactId 
  //       ,persoon.Voornaam
  //   ,persoon.Tussenvoegsel
  //   ,persoon.Achternaam
  //   ,persoon.IsVolwassen
  //   ,contact.mobiel
  //   ,contact.Email
  //   from typepersoon
    
  //   inner join  persoon on
  //   TypePersoonId = typepersoon.Id
    
  //   inner join contact on
  //   contact.PersoonId = persoon.Id where persoonId = :persoonid";
  //   $this->db->query($sql);
  //   $this->db->bind(':persoonid', $persoonId, PDO::PARAM_INT);
  //   $result = $this->db->single();
  //   return $result;
  // }











  // public function update($post)
  // {
  //   if (empty($post["Email"])) {
  //     return true;
  //   } else {
  //     $sql = "UPDATE typepersoon 
  //         inner join persoon on TypePersoonId = typepersoon.Id
  //         inner join contact on contact.PersoonId = persoon.Id
  //         SET persoon.Voornaam = :Voornaam,
  //         persoon.Tussenvoegsel = :Tussenvoegsel,
  //         persoon.achternaam = :Achternaam,
  //         persoon.IsVolwassen = :IsVolwassen,
  //         contact.Email= :Email,
  //         contact.Mobiel = :Mobiel
  //         WHERE persoon.Id = :persoonId;";
  //     $this->db->query($sql);
  //     $this->db->bind(':persoonId', $post["persoonId"], PDO::PARAM_INT);
  //     $this->db->bind(':Voornaam', $post["Voornaam"], PDO::PARAM_STR);
  //     $this->db->bind(':Tussenvoegsel', $post["Tussenvoegsel"], PDO::PARAM_STR);
  //     $this->db->bind(':Achternaam', $post["Achternaam"], PDO::PARAM_STR);
  //     $this->db->bind(':IsVolwassen', $post["IsVolwassen"], PDO::PARAM_INT);
  //     $this->db->bind(':Email', $post["Email"], PDO::PARAM_STR);
  //     $this->db->bind(':Mobiel', $post["Mobiel"], PDO::PARAM_INT);
  //     $this->db->execute();
  //     $result = $this->db->resultSet();
  //     return $result;

    
  //   }
  // }


  // public function search($post)
  // { 


  //   $sql = "select  	 persoon.id
  //   ,persoon.Voornaam
  //   ,persoon.Tussenvoegsel
  //   ,persoon.Achternaam
  //   ,contact.Mobiel
  //   ,contact.Email
  //   ,DATE(persoon.DatumAangemaakt) as Datum
  //   ,persoon.IsVolwassen
  //   from 		persoon
  //   inner join 	contact 
  //   on	contact.PersoonId = persoon.Id  
  //   where 		persoon.DatumAangemaakt <= :DatumAangemaakt 
  //   order by persoon.Achternaam ASC";
  //   $this->db->query($sql);
  //   $this->db->bind(':DatumAangemaakt', $post["datum"], PDO::PARAM_INT);
  //   $result = $this->db->resultSet();


  //   if (empty($result)) {
  //     return false;
  //   } else {
  //     return $result;
  //   }
  // }