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

    public function update($klantId = 0)
    {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(empty($POST["naam"])){
                header("Refresh: 4; URL=" . URLROOT . "/Klant/index");
                echo "Vul veld naam in";
            }else{
                  $this->KlantModel->KlantUpdate($POST);
                 header("Refresh: 2; URL=" . URLROOT . "/Klant/index");
                    echo "Klant is gewijzigd";
                 }
    }else{

    

        $KlantUpdate = $this->KlantModel->KlantUpdatedetails($klantId);

        $data = [
                'title' => 'Klant wijzigen',
                'Naam' => $KlantUpdate->Naam,
                'Plaats' => $KlantUpdate->Plaats,
                'Telefoonnummer' => $KlantUpdate->Telefoonnummer,
                'Email' => $KlantUpdate->Email,
                'AantalVolwassen' => $KlantUpdate->AantalVolwassen,
                'AantalKinderen' => $KlantUpdate->AantalKinderen,
                'AantalBaby' => $KlantUpdate->AantalBaby,
                'GezinId' => $KlantUpdate->GezinId,
        ];

         $this->view('Klant/update', $data);
    }
 }

 public function delete($klantId)
  {
    $deleteStatus = $this->KlantModel->delete($klantId);


        header("Refresh: 2; URL=" . URLROOT . "/Klant/index/$klantId");
         echo "de klant is succesvol verwijderd";

  }


  public function create()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(empty($POST["naam"])){
                header("Refresh: 4; URL=" . URLROOT . "/Klant/index");
                echo "Vul veld naam in";
            }else{
                 $this->KlantModel->createKlant($POST);
                 header("Refresh: 2; URL=" . URLROOT . "/Klant/index");
                    echo "Klant is gemaakt";
                 }
    }else{
        
        $data = [
            'title' => "Create Klant"
        ];

        $this->view("Klant/create", $data);
        }
    
}
}
