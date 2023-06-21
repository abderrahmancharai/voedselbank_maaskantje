    <?php

    class allergieen extends Controller
    {
        //properties
        private $allergieenModel;

        // Dit is de constructor van de controller
        public function __construct() 
        {
            $this->allergieenModel = $this->model('allergieenModel');
        }

        public function index()
        {
            

            $allergieenen = $this->allergieenModel->getallergieen();

            $rows = '';

            foreach ($allergieenen as $items)
            {
                $rows .= "<tr>
                            <td>$items->Gezinsnaam</td>
                            <td>$items->Omschrijving</td>
                            <td>$items->AantalVolwassenen</td>
                            <td>$items->AantalKinderen</td>
                            <td>$items->AantalBabys</td>
                            <td>$items->VertegenwoordigerNaam</td>
                            <td>
                                <a href='" . URLROOT . "/allergieen/allergieendetails/$items->GezinId'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
                            </td>
                        </tr>";
            }

            $data = [
                'title' => "<h2>Overzicht gezinnen met allergieen</h2>",
                'rows' => $rows
            ];
            $this->view('allergieen/index', $data);
        }

        public function allergieendetails($GezinId)
        {
            $allergeenen = $this->allergieenModel->getAllergeenById($GezinId);

            $allergieDetail = $this->allergieenModel->allergieendetails($GezinId);

            $rows = '';

            foreach ($allergieDetail as $items)
            {
                $rows .= "<tr>
                            <td>$items->Voornaam</td>
                            <td>$items->TypePersoon</td>
                            <td>$items->VertegenwoordigerNaam</td>
                            <td>$items->Naam</td>
                            <td>
                                <a href='" . URLROOT . "/allergieen/update/$items->GezinId'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
                            </td>
                        </tr>";
            }

            $data = [
                'title' => "<h2>Overzicht gezinnen met allergieen</h2>",
                'rows' => $rows,
                'Gezinsnaam' =>$allergeenen->Gezinsnaam,
                'omschrijving' =>$allergeenen->omschrijving,
                'totaal' =>$allergeenen->TotaalAantalPersonen

            ];
            $this->view('allergieen/allergieendetails', $data);
        }

        public function update($GezinId = 0)
    {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // if(empty($POST["allergienaam"])){
            //     header("Refresh: 4; URL=" . URLROOT . "/Klant/index");
            //     echo "Vul veld allergienaam in";
            // }else{
            //       $this->allergieenModel->update($POST);
            //      header("Refresh: 2; URL=" . URLROOT . "/Klant/index");
            //         echo "Allergie is gewijzigd";
            //      }
    }else{

        $AllergieUpdate = $this->allergieenModel->update($GezinId);

        $data = [
                'title' => 'Allergieen wijzigen',
                'allergienaam' => $AllergieUpdate->Naam,
                'GezinId' => $GezinId

        ];

         $this->view('allergieen/update', $data);
    }
 }
    }