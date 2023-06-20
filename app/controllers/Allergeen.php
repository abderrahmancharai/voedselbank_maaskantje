<?php

class Allergeen extends Controller

{
    // Properties, field
    private $allergeenModel;

    // Constructor
    public function __construct()
    {
        $this->allergeenModel = $this->model('AllergeenModel'); // Model initialization
    }

    public function index()
    {
        // Your code for the index method goes here
        // This method will handle the default behavior of the Allergeen controller

        $data = [
            'title' => 'Allergeen Index'
            // Add any other data you need to pass to the view
        ];

        $this->view('allergeen/index', $data);
    }

    public function allergeenoverzicht()
{
    $allergeen = $this->allergeenModel->getAllergeen(); 
    $rows = '';
    foreach ($allergeen as $value) {
        $rows .= "<tr>
            <td>$value->KlantNaam</td>
            <td>$value->Naam</td>
            <td>$value->Omschrijving</td>
            <td><a href='" . URLROOT . "/allergeen/update/$value->Id'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
            <td><a href='" . URLROOT . "/allergeen/delete/$value->Id'><img src='" . URLROOT . "/img/bx-x.svg' alt='Info'></a>
        </tr>";
    }
    $data = [
        'title' => 'Allergeen',
        'rows' => $rows
    ];
    $this->view('allergeen/allergeenoverzicht', $data);
}

public function update($allergeenId)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data = [
            'allergeenId' => $allergeenId,
            'naam' => $_POST['naam'],
            'omschrijving' => $_POST['omschrijving'],
            'klantnaam' => $_POST['klantNaam']
        ];

        $this->allergeenModel->updateAllergeen($data);

        header("Location: " . URLROOT . "/allergeen/allergeenoverzicht");
        exit();
    } else {
        $allergeen = $this->allergeenModel->getSingleAllergeen($allergeenId);

        if ($allergeen) {
            $data = [
                'title' => 'Update Allergeen',
                'allergeen' => $allergeen
            ];

            $this->view("allergeen/update", $data);
        } else {
        }
    }
}



}