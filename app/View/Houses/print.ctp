<div id="content" class="cottage-detail">
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <!--carousel-->
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $this->Html->image($house['Thumb']['file'], ['class' => 'img-responsive']); ?>

                </div>
            </div>
            <div class="row hidden-xs">
                <div class="col-xs-12">
                    <div id="thumbs-detail-property"></div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-lg-6">
            <table class="table table-condensed">
                <thead>
                    <tr><th colspan="2"><h1><?php echo $house['House']['name']; ?></h1></th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Číslo</td>
                        <td><?php echo $house['House']['code']; ?></td>
                    </tr>
                    <tr>
                        <td>Kraj</td>
                        <td><?php echo $house['Region']['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Oblast</td>
                        <td><?php
                            foreach ($house['Area'] as $area) {
                                echo $area['name'];
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td>Okres</td>
                        <td><?php echo $house['District']['name']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Pronájem pro</b></td>
                        <td>
                            <b><?php echo (int) $beds['SUM(total_beds)'] + (int) $beds['SUM(extra_beds)'] . ' osob '; ?></b>
                            <?php echo '(' . $beds['SUM(total_beds)'] . ' lůžka + ' . $beds['SUM(extra_beds)'] . ' přistýlky)'; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
<!--            <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 250px;">
                <div class="bily-ctverec"></div>
                <?php
//                $loc = $properties[22]['Property'][2]['Value'][0]['value'];
//                $coma = strpos($loc, ',');
//                $loc1 = substr($loc, 0, $coma);
//                $loc2 = substr($loc, $coma + 2);
//                $src = 'https://www.google.com/maps/embed/v1/place?q=' . $loc1 . '%2C%20' . $loc2 . '&key=AIzaSyD8mNLmybvOJIHYmpbOObfshG43-uUMIgk';
                ?>
                <iframe class="google-mapa" style="height:250px;" src="<?php echo $src; ?>"></iframe>
              
            </div>-->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
              <br>
            <!--<h2>Základní informace</h2>-->
            <p><?php echo $house['House']['text_description']; ?></p>
        </div>
        <div class="col-xs-12 col-lg-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Obecné</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Typ ubytování:</b></td>
                        <td><?php echo $this->Code->generateList($properties[1]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>K dispozici:</b></td>
                        <td><?php echo $this->Code->generateList($properties[2]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Objekt je možno využívat:</b></td>
                        <td><?php echo $this->Code->generateList($properties[3]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Majitel:</b></td>
                        <td><?php echo $this->Code->generateList($properties[4]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Konstrukce objektu:</b></td>
                        <td><?php echo $this->Code->generateList($properties[5]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Pozemek u ubytování:</b></td>
                        <td><?php echo $this->Code->generateList($properties[6]['Property']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-lg-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Důležité informace</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Nástup a ukončení pobytu:</b></td>
                        <td><?php echo $this->Code->generateList($properties[24]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Čas nástupu:</b></td>
                        <td><?php echo $this->Code->generateList($properties[25]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Bezbariérový přístup:</b></td>
                        <td><?php echo $this->Code->getProperty($properties[24]['Property'][2]); ?></td>
                    </tr>
                    <tr>
                        <td><b>Parkování:</b></td>
                        <td><?php echo $this->Code->generateList($properties[26]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Domácí zvíře v objektu:</b></td>
                        <td><?php echo $this->Code->generateList($properties[27]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Výše kauce:</b></td>
                        <td><?php echo $this->Code->generateList($properties[28]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Kouření uvnitř ubytování:</b></td>
                        <td><?php echo $this->Code->generateList($properties[29]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Povlečení na lůžkoviny:</b></td>
                        <td><?php echo $this->Code->generateList($properties[30]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Dřevo k dispozici:</b></td>
                        <td><?php echo $this->Code->generateList($properties[31]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Voda:</b></td>
                        <td><?php echo $this->Code->generateList($properties[32]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Komunikace s rekreanty možná v cizím jazyce:</b></td>
                        <td><?php echo $this->Code->generateList($properties[33]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Důležité vzdálenosti (km):</b></td>
                        <td><?php echo $this->Code->generateList($properties[34]['Property']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Další služby:</b></td>
                        <td><?php echo $this->Code->getProperty($properties[0]['Property'][3], false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--CENÍK-->

    <div class="row">
        <div class="col-xs-12"> <h2>Ceník</h2></div>
        <div class="col-xs-12 col-lg-6">

            <table class="table table-bordered">
                <thead>
                    <tr><th colspan="3">Léto</th></tr>
                    <tr>
                        <th></th>
                        <th> objekt/týden (Kč)</th>
                        <th> kratší pobyty na min. $row[19] noci
                            <br /><span class="text-muted">pro min. $row[20] osob (os/noc)</span></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Hlavní sezóna</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Mimosezóna</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Poznámky</b></td>
                        <td colspan="2"></td>                                    
                    </tr>
                    <tr>
                        <td colspan="3"><b>Doplatky na místě</b></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-lg-6">

            <table class="table table-bordered">
                <thead>
                    <tr><th colspan="3">Zima</th></tr>
                    <tr>
                        <th></th>
                        <th> objekt/týden (Kč)</th>
                        <th> kratší pobyty na min. $row[19] noci
                            <br /><span class="text-muted">pro min. $row[20] osob (os/noc)</span></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Hlavní sezóna</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Mimosezóna</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Vánoce 7 nocí</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Silvestr 7 nocí</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Velikonoce</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Poznámky</b></td>
                        <td colspan="2"></td>                                    
                    </tr>
                    <tr>
                        <td colspan="3"><b>Doplatky na místě</b></td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--VYBAVENÍ-->

    <div class="row">
        <div class="col-xs-12">
            <h2>Vybavení</h2>
            <p><?php echo $house['House']['text_equipment']; ?></p>
            <table class="table table-bordered">
                <thead>
                    <tr><th colspan="2">Vybavení</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Vybavení interiéru:</b></td>
                        <td><?php echo $this->Code->generateList($properties[10]['Property'], false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <h2>Aktivity</h2>  
        </div>
    </div>
</div>

<?php
//debug($house['HouseDate']);
