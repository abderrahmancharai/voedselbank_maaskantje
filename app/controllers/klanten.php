<?php

class klanten extends Controller
{
    // Properties, field
    private $klantenModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->klantenModel = $this->model('klantenModel'); // Model initialisatie
    }
    // Index-methode om de bestellingen weer te geven
    public function index()
    {
        $this->view('klanten/index'); // Bestellingen ophalen via model
    }


public function klantenoverzicht()
{
    //  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
    //             $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //             $klantenselect = $this->klantenModel->getselecteer($POST);
                
                     

    //               $rows = '';


    //             foreach ($klantenselect as $value){
                
              
    //                 $rows .= "<tr>
    //     <td>$value->NaamGezin</td>
    //     <td>$value->Vertegenwoordiger</td>
    //     <td>$value->E_mailadres</td>
    //     <td>$value->Mobiel</td>
    //     <td>$value->Adres</td>
    //     <td>$value->Woonplaats</td>
    //     <td><a href='" . URLROOT . "/klanten/details/$value->GezinId'><img src='/public/img/bx-edit.svg' alt='Edit' class='icon'></a></td>

    //     </tr>";

    //             } 
    $klanten = $this->klantenModel->getklant();
    $rows = '';

    foreach ($klanten as $value) {
    $rows .= "<tr>
        <td>$value->NaamGezin</td>
        <td>$value->Vertegenwoordiger</td>
        <td>$value->E_mailadres</td>
        <td>$value->Mobiel</td>
        <td>$value->Adres</td>
        <td>$value->Woonplaats</td>
        <td><a href='" . URLROOT . "/klanten/details/$value->GezinId'><img src='/public/img/bx-edit.svg' alt='Edit' class='icon'></a></td>

        </tr>";
    }

    $data = [
        'title' => 'klanten in dienst',
        'rows' => $rows
    ];
    $this->view('klanten/klantenoverzicht', $data);
}


public function details($PersoonId)
{
    try {
        $details = $this->klantenModel->details($PersoonId);

        $rows = '';

        foreach ($details as $value) {
            $rows .= "<tr>
                <td>$value->Voornaam</td>
                <td>$value->Tussenvoegsel</td>  
                <td>$value->Achternaam</td>
                <td>$value->Geboortedatum</td>
                <td>$value->TypePersoon</td>
                <td>$value->Vertegenwoordiger</td>
                <td>$value->Straatnaam</td>
                <td>$value->Huisnummer</td>
                <td>$value->Toevoeging</td>
                <td>$value->Postcode</td>
                <td>$value->Woonplaats</td>
                <td>$value->Email</td>
                <td>$value->Mobiel</td>
                 <td><a href='" . URLROOT . "/klanten/update/$PersoonId'><img src='/public/img/bx-edit.svg' alt='Edit' class='icon'></a></td>

        </tr>
            </tr>";
        }

        $data = [
            'title' => 'Overzicht voedselpakket',
            'rows' => $rows,
            
        ];

        $this->view('klanten/details', $data);

    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

public function update($PersoonId = null)
{
    $successMessage = 'sa';
    $foutmelding = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("Refresh: 2; URL=" . URLROOT . "/klanten/klantenoverzicht");
            echo "<div style='background-color: #7bff00; color: #155724; padding: 10px;'>De klantgegevens zijn gewijzigd</div>";
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update = $this->klantenModel->updateinfo($POST);

    } else {
        $updatedetails = $this->klantenModel->detailsinfo($PersoonId);

    $data = [
        'title' => 'Wijzigen van persoon',
        'details' => $updatedetails,
        'successMessage' => $successMessage,
        'foutmelding' => $foutmelding,
        'PersoonId' => $updatedetails->Id,
        'Voornaam' => $updatedetails->Voornaam,
        'Tussenvoegsel' => $updatedetails->Tussenvoegsel,
        'Achternaam' => $updatedetails->Achternaam,
        'Geboortedatum' => $updatedetails->Geboortedatum,
        'TypePersoon' => $updatedetails->TypePersoon,
        'Vertegenwoordiger' => $updatedetails->Vertegenwoordiger,
        'Straatnaam' => $updatedetails->Straatnaam,
        'Huisnummer' => $updatedetails->Huisnummer,
        'Toevoeging' => $updatedetails->Toevoeging,
        'Postcode' => $updatedetails->Postcode,
        'Woonplaats' => $updatedetails->Woonplaats,
        'Email' => $updatedetails->Email,
        'Mobiel' => $updatedetails->Mobiel,
    ];

        $this->view('klanten/update', $data);
    }
}


}
// public function klantenoverzichtupdate($contactId)
// {
//     $klanten = $this->klantenModel->getklantupdate($contactId);
//     $rows = '';

//     foreach ($klanten as $value) {
//         $persoonId = $value->Id;  // Assuming the primary key column name is 'Id'
//         $rows .= "<tr>
//                     <td>$value->Voornaam</td>
//                     <td>$value->Tussenvoegsel</td>
//                     <td>$value->Achternaam</td>
//                     <td>$value->Geboortedatum</td>
//                     <td>$value->TypePersoon</td>
//                     <td>$value->Vertegenwoordiger</td>
//                     <td>$value->Straatnaam</td>
//                     <td>$value->Huisnummer</td>
//                     <td>$value->Toevoeging</td>
//                     <td>$value->Postcode</td>
//                     <td>$value->Woonplaats</td>
//                     <td>$value->Email</td>
//                     <td>$value->Mobiel</td>
//                     <td><a href='" . URLROOT . "/klanten/update/'>update</a></td>
//                   </tr>";
//     }

//     $data = [
//         'title' => 'klanten in dienst',
//         'amountOfklanten' => sizeof($klanten),
//         'rows' => $rows,
//         'klant' => $klanten
//     ];

//     $this->view('klanten/klantenoverzichtupdate', $data);
// }





//     public function update($persoonId = null)
//     {
//         // Initialiseer $klantsearch met null
//         $klantsearch = null;

//         if ($_SERVER["REQUEST_METHOD"] == "POST") {
//             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//             $result = $this->klantenModel->update($_POST);

//             if ($result == true) {
//                 echo "U vergeet om een email in te vullen";
//                 header("Refresh: 1; URL=" . URLROOT . "/klanten/klantenoverzichtupdate");
//                 exit;
//             } else {
//                 echo "update succesvol";
//                 header("Refresh: 4; URL=" . URLROOT . "/klanten/klantenoverzichtupdate");
//                 exit;
//             }
//         }

//         $klant = $this->klantenModel->getklantbyid($persoonId);
//         var_dump($klant);
//         $data = [
//             'title' => '<h1>Update contactgegevens</h1>',
//             'klant' => $klant
//         ];
//         $this->view("klanten/update", $data);
//     }
// }




//         if ($_SERVER["REQUEST_METHOD"] == "POST") {
//             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//             $this->klantenModel->update($_POST);
//             echo "update succesvol";
//             header("Refresh: 1; URL=" . URLROOT . "/klanten/klantenoverzichtupdate");
//         } else {
//             $klant = $this->klantenModel->getklantbyid($persoonId);

//             $data = [
//                 'title' => '<h1>Update contactgegevens</h1>',
//                 'klant' => $klant[0]
//             ];
//             $this->view("klanten/update", $data);
//         }