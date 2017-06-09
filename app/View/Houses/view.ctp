<div id="content" class="cottage-detail">
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <!--carousel-->
            <div class="row">
                <div class="col-xs-12">

                    <div id="carousel-detail-property" class="carousel slide" data-ride="carousel">                  

                        <a class="left carousel-control" href="#carousel-detail-property" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-detail-property" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="row hidden-xs">
                <div class="col-xs-12">
                    <div id="thumbs-detail-property"></div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-lg-6">
            <table class="table table-condensed table-striped">
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
                    <tr>
                        <td><b>Cena</b></td>
                        <td><b><a href="#tab-tab2" id="open-tab2" title="Ceník">viz ceník</a></b></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered table-reservations">
                <thead>
                    <tr>
                        <th colspan="3">
                            <h3>Náhled obsazenosti objektu 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#tab-tab5" id="open-tab5" title="Termíny léto" onclick="ga('send', 'event', 'ux', 'click', 'leto');"><strong>léto</strong></a>
                                &nbsp;&nbsp;&nbsp;&nbsp; <a href="#tab-tab5" id="open-tab5" title="Termíny zima" onclick="ga('send', 'event', 'ux', 'click', 'zima');"><strong>zima</strong></a>
                                &nbsp;&nbsp;&nbsp;&nbsp; <a href="#tab-tab5" id="open-tab5" title="Termíny Silvestr" onclick="ga('send', 'event', 'ux', 'click', 'silvestr');"><strong>silvestr</strong></a>
                            </h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 9; $i++) {
                        $tdClass = '';
                        $glyphicon = '';
                        if ($i % 3 == 0) {
                            echo '<tr>';
                        }
                        switch ($travelDates[$i]['HouseDate'][0]['date_condition_id']) {
                            case 1:
                                $tdClass = 'text-center success';
                                $glyphicon = 'glyphicon glyphicon-ok';
                                break;
                            case 2:
                                $tdClass = 'text-center danger';
                                $glyphicon = 'glyphicon glyphicon-remove';
                                break;
                            case 3:
                                $tdClass = 'text-center warning';
                                $glyphicon = 'glyphicon glyphicon-remove';
                                break;
                        }
                        ?>
                    <td class="<?php echo $tdClass; ?>"><span class="<?php echo $glyphicon; ?>"></span>
                        <?php
                        echo $this->Time->format('j. n.', $travelDates[$i]['TravelDate']['start']);
                        echo '&nbsp;-&nbsp';
                        echo $this->Time->format('j. n.', $travelDates[$i]['TravelDate']['end']);
                        ?></td>
                    <?php
                    if ($i % 3 == 2) {
                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center"><small><a href="#tab-tab5" id="open-tab5" title="Zobrazit obsazenost i pro další dny">Zobrazit obsazenost i pro další dny</a></small></td>
                    </tr>
                </tfoot>
            </table>
            <div class="primary-actions">
                <a href="#tab-tab5" id="open-tab5" title="Rezervace" class="btn btn-primary" onclick="ga('send', 'event', 'ux', 'click', 'objednat');"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><br><span>OBJEDNAT</span></a>
                <a href="#" title="Poslat přátelům" class="btn btn-default" onclick="ga('send', 'event', 'ux', 'click', 'poslat pratelum');"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><br><span>POSLAT PŘÁTELŮM</span></a>
                <?php // echo $this->Html->link('<span class="glyphicon glyphicon-print" aria-hidden="true"></span><br><span>VYTISKNOUT</span>', ['controller' => 'houses', 'action' => 'view', $house['House']['slug'], 'tisk'], ['class' => 'btn btn-default', 'escape' => false, 'onclick' => 'ga(\'send\', \'event\', \'ux\', \'click\', \'vytisknout\');', 'target' => 'blank']); 
                echo $this->Html->link('<span class="glyphicon glyphicon-print" aria-hidden="true"></span><br><span>VYTISKNOUT</span>', ['controller' => 'houses', 'action' => 'view', $house['House']['slug'], 'tisk'], ['class' => 'btn btn-default', 'escape' => false, 'target' => 'blank']); 
                ?>
<!--                <a href="#" title="Vytisknout" class="btn btn-default" onclick="ga('send', 'event', 'ux', 'click', 'vytisknout');"><span class="glyphicon glyphicon-print" aria-hidden="true"></span><br><span>VYTISKNOUT</span></a>-->
                <a href="javascript:AddCookieId('zapamatovane',80)" title="Uložit do oblíbených objektů" class="btn btn-default" onclick="ga('send', 'event', 'ux', 'click', 'oblibene');"><span class="glyphicon glyphicon-heart" aria-hidden="true" onclick="ga('send', 'event', 'ux', 'click', 'oblibene');"></span><br><span>OBLÍBENÉ</span></a>
            </div>

            <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 250px;">
                <div class="bily-ctverec"></div>
                <?php
                $loc = $properties[22]['Property'][2]['Value'][0]['value'];
                $coma = strpos($loc, ',');
                $loc1 = substr($loc, 0, $coma);
                $loc2 = substr($loc, $coma + 2);
                $src = 'https://www.google.com/maps/embed/v1/place?q=' . $loc1 . '%2C%20' . $loc2 . '&key=AIzaSyD8mNLmybvOJIHYmpbOObfshG43-uUMIgk';
                ?>

                <iframe class="google-mapa" style="height:250px;" src="<?php echo $src; ?>"></iframe>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">

            <ul class="nav nav-tabs properties" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-1 - zakladni informace');"><b><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Základní informace</b></a>
                </li>
                <li role="presentation">
                    <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" id="tab-tab2" onClick="ga('send', 'event', 'ux', 'click', 'tab-2 - cenik');"><b><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span> Ceník</b></a>
                </li>
                <li role="presentation">
                    <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-3 - vybaveni');"><b><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> Vybavení</b></a>
                </li>
                <li role="presentation">
                    <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-4 - lokalita');"><b><span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span> Aktivity v okolí</b></a>
                </li>
                <li role="presentation">
                    <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab" id="tab-tab5"  onClick="ga('send', 'event', 'ux', 'click', 'tab-5 - objednavka');"><b><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Objednávka termínu</b></a>
                </li>
                <li role="presentation">
                    <a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-6 - recenze');" ><b><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Recenze</b></a>
                </li>

                <li role="presentation" >
                    <a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab" id="tab-tab7" onClick="ga('send', 'event', 'ux', 'click', 'tab-7 - blog');" ><b><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Články z blogu </b></a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab1">
                    <p><?php echo $house['House']['text_description']; ?></p>
                    <div class="row">
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
                </div>
                <!--CENÍK-->
                <div role="tabpanel" class="tab-pane" id="tab2">
                    <div class="row">
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
                </div>
                <!--VYBAVENÍ-->
                <div role="tabpanel" class="tab-pane" id="tab3">
                    <div class="row">
                        <div class="col-xs-12">
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
                </div>
            </div>


        </div>
    </div>
</div>

<?php
//debug($house['HouseDate']);