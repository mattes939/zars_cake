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
            <?php
            if ($house['House']['composition']) {
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <h5>Do areálu patří následující objekty:</h5>
                        <?php
//                        debug($travelDates[0]['HouseDate']);
                        $list = [];
                        foreach ($childrenTravelDates[0]['HouseDate'] as $houseDate) {
                            $list[] = $this->Html->link($houseDate['House']['code'] . '-' . $houseDate['House']['name'], ['controller' => 'houses', 'action' => 'view', $houseDate['House']['slug']], ['target' => 'blank']);
                        }
                        echo $this->Html->nestedList($list);
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
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
            <?php
//            if ($house['House']['composition']) {
//                
//            } else {
            ?>
            <table class="table table-condensed table-bordered table-reservations">
                <thead>
                    <tr>
                        <th colspan="3">
                            <h5>Náhled obsazenosti objektu 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#tab-tab5" id="open-tab5" title="Termíny léto" onclick="ga('send', 'event', 'ux', 'click', 'leto');"><strong>léto</strong></a>
                                &nbsp;&nbsp;&nbsp;&nbsp; <a href="#tab-tab5" id="open-tab5" title="Termíny zima" onclick="ga('send', 'event', 'ux', 'click', 'zima');"><strong>zima</strong></a>
                                &nbsp;&nbsp;&nbsp;&nbsp; <a href="#tab-tab5" id="open-tab5" title="Termíny Silvestr" onclick="ga('send', 'event', 'ux', 'click', 'silvestr');"><strong>silvestr</strong></a>
                            </h5>
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
            <?php
//            }
            ?>


            <div class="primary-actions">
                <a href="#tab-tab5" id="open-tab5" title="Rezervace" class="btn btn-primary" onclick="ga('send', 'event', 'ux', 'click', 'objednat');"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><br><span>OBJEDNAT</span></a>
                <a href="#" title="Poslat přátelům" class="btn btn-default" onclick="ga('send', 'event', 'ux', 'click', 'poslat pratelum');"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><br><span>POSLAT PŘÁTELŮM</span></a>
                <?php
                // echo $this->Html->link('<span class="glyphicon glyphicon-print" aria-hidden="true"></span><br><span>VYTISKNOUT</span>', ['controller' => 'houses', 'action' => 'view', $house['House']['slug'], 'tisk'], ['class' => 'btn btn-default', 'escape' => false, 'onclick' => 'ga(\'send\', \'event\', \'ux\', \'click\', \'vytisknout\');', 'target' => 'blank']); 
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
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Sezóna</th>
                        <th>Od</th>
                        <th>Do</th>
                        <th>Stav</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($house['House']['composition']) {
                        foreach ($childrenTravelDates as $i=> $childrenTravelDate) {
                            ?>
                            <tr>
                                <td><?php echo $travelDates[$i]['TravelDateType']['name']; ?></td>
                                <td><?php echo $travelDates[$i]['TravelDate']['start']; ?></td>
                                <td><?php echo $travelDates[$i]['TravelDate']['end']; ?></td>
                                <td><?php
                                    echo $this->Code->getCompositionVacancy($childrenTravelDate['HouseDate'], $travelDates[$i]['HouseDate'][0]['id']);
//                                    foreach ($travelDate['HouseDate'] as $houseDate) {
//                                        echo $this->Html->link($houseDate['House']['code'].'-'.$houseDate['House']['name'], ['controller' => 'houses','action' => 'view', $houseDate['House']['slug']], ['target' => 'blank']);
//                                        echo ': ' . $houseDate['DateCondition']['name'] . '<br>';
//                                    }
//                                else {
//                                    echo $travelDate['HouseDate'][0]['DateCondition']['name'];
//                                }
                                    ?></td>
                            </tr>
                            <?php
                        }
                    } else {
//                        debug($travelDates);
                        foreach ($travelDates as $travelDate) {
                            ?>
                            <tr>
                                <td><?php echo $travelDate['TravelDateType']['name']; ?></td>
                                <td><?php echo $travelDate['TravelDate']['start']; ?></td>
                                <td><?php echo $travelDate['TravelDate']['end']; ?></td>
                                <td><?php 
                                echo $this->Code->orderCell($travelDate['HouseDate'][0]['date_condition_id'], $travelDate['HouseDate'][0]['id']);
//                                echo $travelDate['HouseDate']['DateCondition']['name']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>