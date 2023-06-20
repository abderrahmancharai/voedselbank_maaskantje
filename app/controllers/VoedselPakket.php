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
                        <td><a href='" . URLROOT . "/VoedselPakket/pakketperpersoon/$value->Id'><i class='bx bx-box'></i></i></a></td>
                        <td><a href='" . URLROOT . "/VoedselPakket/update/$value->Id'><i class='bx bx-box'></i></i></a></td>
                      </tr>";

                }
            $data = [
            'rows' => $rows
        ];

            $this->view('VoedselPakket/index', $data);
        
    }
}