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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // var_dump($POST);

                $allergieselect = $this->allergieenModel->getselecteer($POST);

                  $rows = '';


                foreach ($allergieselect as $items){
                
              
                    $rows .= "<tr>
                                <td>$items->Gezinsnaam</td>
                                <td>$items->Omschrijving</td>
                                <td>$items->AantalVolwassenen</td>
                                <td>$items->AantalKinderen</td>
                                <td>$items->AantalBabys</td>
                                <td>$items->VertegenwoordigerNaam</td>
                                <td>
                                    <a href='" . URLROOT . "/allergieen/allergieendetails/$items->GezinId'><img src='" . URLROOT . "/img/bx-book-content.svg' alt='Info'></a>
                                </td>
                            </tr>";

                }
                
                
                $data = [
                    'title' => "<h2>Overzicht gezinnen met allergieen</h2>",
                    'rows' => $rows
                ];

                if (empty($rows)) {
                    $data['rows'] = "<tr><td colspan='8'><div class='alert alert-warning' role='alert'>“Er zijn geen gezinnen bekent die de geselecteerde allergie hebben</div></td></tr>";
                 }
                $this->view('allergieen/index', $data);
                }else{


                $allergieenen = $this->allergieenModel->getallergieen();
                    
                  $rows = '';

                foreach ($allergieenen as $items){
                

              
                    $rows .= "<tr>
                                <td>$items->Gezinsnaam</td>
                                <td>$items->Omschrijving</td>
                                <td>$items->AantalVolwassenen</td>
                                <td>$items->AantalKinderen</td>
                                <td>$items->AantalBabys</td>
                                <td>$items->VertegenwoordigerNaam</td>
                                <td>
                                    <a href='" . URLROOT . "/allergieen/allergieendetails/$items->GezinId'><img src='" . URLROOT . "/img/bx-book-content.svg' alt='Info'></a>
                                </td>
                            </tr>";

                }
                

                $data = [
                    'title' => "<h2>Overzicht gezinnen met allergieen</h2>",
                    'rows' => $rows
                ];
                $this->view('allergieen/index', $data);
            }
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
                                <td>$items->IsVertegenwoordiger</td>
                                <td>$items->Naam</td>
                                <td>
                                    <a href='" . URLROOT . "/allergieen/update/$items->PersoonId'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
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

            public function update($PersoonId = 0)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // var_dump($POST);exit();
                $AllergieUpdate = $this->allergieenModel->update($POST);
                if(empty($POST["allergienaam"])){
                    header("Refresh: 4; URL=" . URLROOT . "/allergieen/index");
                    echo "Vul veld allergienaam in";
                }else{
                      $this->allergieenModel->update($POST);
                     header("Refresh: 2; URL=" . URLROOT . "/allergieen/index");
                        echo "<div style='background-color: #18c947; color: #fff; padding: 10px;'>De wijziging is doorgegeven</div>";
                     }
        }else{

            $AllergiesUpdaten = $this->allergieenModel->updatedetails($PersoonId,);

            $data = [
                    'title' => 'Allergieen wijzigen',
                    'allergienaam' => $AllergiesUpdaten->Naam,
                    'PersoonId' => $AllergiesUpdaten->PersoonId,
            ];

            $this->view('allergieen/update', $data);
        }
    }
        }