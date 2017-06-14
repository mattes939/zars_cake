
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
                    CENÍK
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
                    VYBAVENÍ
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
                 TERMÍNY 
                <div role="tabpanel" class="tab-pane" id="tab5">
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>Sezöna</th>
                                        <th>Od</th>
                                        <th>Do</th>
                                        <th>Stav</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
    foreach ($travelDates as $travelDate) {
        ?>
                                        <tr>
                                            <td><?php echo $travelDate['TravelDateType']['name']; ?></td>
                                            <td><?php echo $travelDate['TravelDate']['start']; ?></td>
                                            <td><?php echo $travelDate['TravelDate']['end']; ?></td>
                                            <td><?php echo $travelDate['HouselDate']['DateCondition']['name']; ?></td>
                                        </tr>
        <?php
    }
    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php
//debug($house['HouseDate']);
