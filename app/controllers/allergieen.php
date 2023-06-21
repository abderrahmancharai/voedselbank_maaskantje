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
            $allergieDetail = $this->allergieenModel->allergieendetails($GezinId);

            $rows = '';

            foreach ($allergieDetail as $items)
            {
                $rows .= "<tr>
                            <td>$items->Voornaam</td>
                            <td>$items->TypePersoon</td>
                            <td>$items->IsVertegenwoordiger</td>
                            <td>$items->Naam</td>
                            <td>
                                <a href='" . URLROOT . "/allergieen/allergieendetails/$items->AllergieId'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
                            </td>
                        </tr>";
            }

            $data = [
                'title' => "<h2>Overzicht gezinnen met allergieen</h2>",
                'rows' => $rows
            ];
            $this->view('allergieen/allergieendetails', $data);
        }
    }