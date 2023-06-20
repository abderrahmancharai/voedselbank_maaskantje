<?php

class Klant extends Controller
{
    //properties
    private $KlantModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->KlantModel = $this->model('KlantModel');
    }

    public function index()
    {
        $Klanten = $this->KlantModel->getKlant();
        //  var_dump($Leveranciers);exit();

        $rows = '';

        foreach ($Klanten as $items)
        {
            $rows .= "<tr>
                        <td>$items->Naam</td>
                        <td>$items->Plaats</td>
                        <td>$items->Telefoonnummer</td>
                        <td>$items->Email</td>
                        <td>$items->AantalVolwassen</td>
                        <td>$items->AantalKinderen</td>
                        <td>$items->AantalBaby</td>
                        <td>
                            <a href='" . URLROOT . "/Klant/update/$items->klantId'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/Klant/Delete/$items->klantId'><img src='" . URLROOT . "/img/bx-x.svg' alt='Info'></a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "<h2>KLANT INFORMATIE</h2>",
            'rows' => $rows
        ];
        $this->view('Klant/index', $data);
    }
}