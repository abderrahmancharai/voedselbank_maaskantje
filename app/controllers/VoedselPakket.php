<?php

class VoedselPakket extends Controller
{
    // Properties, field
    private $VoedselPakketModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->VoedselPakketModel = $this->model('VoedselPakketModel'); // Model initialisatie
    }
    public function index()
    {
        $VoedselPakketten = $this->VoedselPakketModel->getPaketten();

        $rows = '';

        foreach ($VoedselPakketten as $value) {
            $rows .= "<tr>
                        <td>$value->Naam</td>
                        <td>$value->AantalVolwassen</td>  
                        <td>$value->AantalKinderen</td>
                        <td>$value->AantalBaby</td>
                        <td><a href='" . URLROOT . "/VoedselPakket/pakketperpersoon/$value->KlantId'><i class='bx bx-box'></i></i></a></td>
                        <td><a href='" . URLROOT . "/VoedselPakket/allproduct/$value->KlantId'><i class='bx bx-edit-alt'></i></i></a></td>
                        <td><a href='" . URLROOT . "/VoedselPakket/delete/$value->pakketId'><i class='bx bx-message-x'></i></i></a></td>
                      </tr>";

        }
        $data = [
        'rows' => $rows
        ];

        $this->view('VoedselPakket/index', $data);

    }

    public function pakketperpersoon($Id)
    {

        $VoedselPakket = $this->VoedselPakketModel->getPakketById($Id);


        $rows = '';

        foreach ($VoedselPakket as $value) {
            if($value->Aantal) {
                $value->Aantal = "is leeg";
            } else {
                $rows .= "<tr>
                        <td>$value->KlantNaam</td>
                        <td>$value->Categorie</td>  
                        <td>$value->Aantal</td>
                        <td>$value->Naam</td>
                        
                      </tr>";

            }
        }

        $data = [
        'rows' => $rows
          ];

        $this->view('VoedselPakket/pakketperpersoon', $data);


    }

    public function allproduct($klantId)
    {

        $getallproducts = $this->VoedselPakketModel->getallproducts($klantId);


        $rows = '';

        foreach ($getallproducts as $value) {

            $rows .= "<tr>
                        <td>$value->KlantNaam</td>
                        <td>$value->Naam</td>  
                        <td>$value->Aantal</td>
                        <td>$value->Naam</td>
                        <td><a href='" . URLROOT . "/VoedselPakket/update/$value->ProductId'><i class='bx bx-edit-alt'></i></i></a></td>
                        
                      </tr>";

        }


        $data = [
        'rows' => $rows
          ];

        $this->view('VoedselPakket/allproduct', $data);


    }
    public function update($ProductId = NULL)
      {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($POST['Aantal'] < 0) {
            // Handle the error message when 'Aantal' is below 0
            echo "Je kan geen negatief aantal invoeren";
            return;
        }

    
        $update = $this->VoedselPakketModel->update($POST);
        
        // Add a header redirect after the update using URLROOT
        header("Refresh: 4; URL=" . URLROOT . "/VoedselPakket/pakketperpersoon". $POST['klantId']);
        echo "Het aantal is aangepast";
        exit;
    } else {
        $getvoedselpakket = $this->VoedselPakketModel->getvoedselpakketbyIds($ProductId);


        $data = [
            'pakketId' => $getvoedselpakket->pakketId,
            'klantId' => $getvoedselpakket->klantId,
            'productId' => $getvoedselpakket->productId,
            'Aantal' => $getvoedselpakket->Aantal,
        ];
        $this->view('VoedselPakket/update', $data);
    }
}

    public function delete($Id) {
        
    $this->VoedselPakketModel->delete($Id);

    $data =[
      'deleteStatus' => "De Pakket is succesvol verwijderd!"
    ];
    $this->view("VoedselPakket/delete", $data);
    header("Refresh:3; url=" . URLROOT . "/VoedselPakket/index");
  }
    
}



    // Add a header redirect




