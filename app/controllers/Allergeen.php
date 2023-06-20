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
            <td>$value->Naam</td>
            <td>$value->Omschrijving</td>
            <td>$value->KlantNaam</td>
            <td><a href='" . URLROOT . "/allergeen/update/$value->Id'>Update</a></td>
            <td><a href='" . URLROOT . "/allergeen/delete/$value->Id'>delete</a></td>
        </tr>";
    }
    $data = [
        'title' => 'Allergeen',
        'rows' => $rows
    ];
    $this->view('allergeen/allergeenoverzicht', $data);
}
}