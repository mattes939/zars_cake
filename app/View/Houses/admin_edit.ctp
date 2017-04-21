<?php $this->request->data['Value'] = $this->request->data['Value']; ?>

<?php
echo $this->Html->nestedList([
    $this->Html->link('Nahoru', '#nahoru', ['class' => 'btn btn-primary']),
    $this->Html->link('Základní', '#zaklad', ['class' => 'btn btn-primary']),
    $this->Html->link('Poloha', '#poloha', ['class' => 'btn btn-primary']),
    $this->Html->link('Místnosti', '#mistnosti', ['class' => 'btn btn-primary']),
    $this->Html->link('Vybavení', '#vybaveni', ['class' => 'btn btn-primary']),
    $this->Html->link('Aktivity', '#aktivity', ['class' => 'btn btn-primary']),
    $this->Html->link('Důležité', '#dulezite', ['class' => 'btn btn-primary']),
    $this->Html->link('Fotky', '#foto', ['class' => 'btn btn-primary']),
    $this->Html->link('Termíny', '#terminy', ['class' => 'btn btn-primary']),
        ], ['class' => 'fixed-nav']);
?>
<div class="panel panel-primary">
    <div class="panel-heading" id="nahoru"><h1><?php echo $this->request->data['House']['name']; ?></h1></div>
    <div class="panel-body">
        <?php echo $this->Form->create('House'); ?>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <?php
                $this->Form->inputDefaults([
                    'div' => ['class' => 'form-group'],
                    'class' => ['form-control']
                ]);
                echo $this->Form->input('id');
                echo $this->Form->input('name', ['label' => 'Název']);
                echo $this->Form->input('code', ['label' => 'Číslo objektu', 'type' => 'text']);

                echo $this->Form->input('region_id', ['label' => 'Kraj']);
                echo $this->Form->input('district_id', ['label' => 'Okres']);

                echo $this->Form->input('Value.' . 0 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 0 . '.value', ['label' => $this->request->data['Value'][0]['Property']['name']]);
                echo $this->Form->input('Value.' . 1 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 1 . '.value', ['label' => $this->request->data['Value'][1]['Property']['name']]);

//        debug($this->request->data['Value']);
//        foreach ($this->request->data['Value'] as $i => $value) {
//            debug($i);
////            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
////            echo $this->Form->input('Value.' . $i . '.value', ['label' => $value['Property']['name']]);
////            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $value['Property']['name']]);
//        }
//        for($i = 1; $i === 2; $i++){
//            $value = $this->request->data['Value'][$i];
//             echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
//            echo $this->Form->input('Value.' . $i . '.value', ['label' => $value['Property']['name']]);
//        }
                ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('html_title');
                echo $this->Form->input('html_keywords');
                echo $this->Form->input('html_description');
                echo $this->Form->input('website', ['label' => 'Vlastní www stránky objektu']);
                ?>
            </div>
        </div>

        <?php
        $this->Form->inputDefaults([
            'div' => ['class' => 'checkbox row'],
            'class' => [' col-xs-3'],
            'label' => false
        ]);

//		echo $this->Form->input('TravelDate');
        ?>

        <div class="row"><div class="col-xs-12"><h4>Oblasti, ke kterým objekt spadá</h4></div><?php echo $this->Form->input('Area', ['multiple' => 'checkbox']); ?></div>
    </div>
</div>
<?php
$this->Form->inputDefaults([
    'div' => ['class' => 'checkbox'],
    'class' => 'checkbox',
//    'label' => false
]);
//$current = 0;
?>

<div class="panel panel-primary">
    <div class="panel-heading" id="zaklad"><h4>Základní charakteristiky</h4></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('text_description', ['label' => 'Krátký všeobecný popis objektu', 'class' => 'form-control', 'div' => ['class' => 'form-group']]);
                ?></div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][2]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 2; $i <= 11; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>
                <div class="checkbox">
                    <?php
                    echo $this->Form->input('Value.12.id', ['type' => 'hidden']);

                    echo $this->Form->input('Value.12.value', ['label' => $this->request->data['Value'][$i]['Property']['name'], 'div' => false, 'class' => 'form-control form-control-inline']);
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][13]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 13; $i <= 17; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>
                <div class="checkbox">
                    <?php
                    echo $this->Form->input('Value.18.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.18.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'], 'div' => false]);
                    echo $this->Form->input('Value.18.value', ['label' => false, 'div' => false, 'class' => 'form-control']);
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][13]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 19; $i <= 28; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][29]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 29; $i <= 33; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][34]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 34; $i <= 39; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>

                <?php
                echo $this->Form->input('Value.40.id', ['type' => 'hidden']);
//                    echo $this->Form->input('Value.40.switch', ['label' => $this->request->data['Value'][$i++]['Property']['name'], 'div' => false]);
                echo $this->Form->input('Value.40.value', ['label' => ['class' => 'col-xs-5', 'text' => $this->request->data['Value'][$i++]['Property']['name']], 'div' => ['class' => 'row form-group'], 'class' => 'form-control form-control-inline']);
                ?>

                <?php
                echo $this->Form->input('Value.41.id', ['type' => 'hidden']);
//                    echo $this->Form->input('Value.41.switch', ['label' => $this->request->data['Value'][$i++]['Property']['name'], 'div' => false]);
                echo $this->Form->input('Value.41.value', ['label' => ['class' => 'col-xs-5', 'text' => $this->request->data['Value'][$i++]['Property']['name']], 'div' => ['class' => 'row form-group'], 'class' => 'form-control form-control-inline']);
                ?>

            </div>
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][42]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 42; $i <= 49; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>
                <div class="checkbox">
                    <?php
                    echo $this->Form->input('Value.50.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.50.switch', ['label' => $this->request->data['Value'][$i++]['Property']['name'], 'div' => false]);
                    echo $this->Form->input('Value.50.value', ['label' => false, 'div' => false, 'class' => 'form-control']);
                    ?>
                </div>
                <div class="checkbox">
                    <?php
                    echo $this->Form->input('Value.51.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.51.switch', ['label' => $this->request->data['Value'][$i++]['Property']['name'], 'div' => false]);
                    echo $this->Form->input('Value.51.value', ['label' => false, 'div' => false, 'class' => 'form-control']);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="poloha"><h4>Poloha</h4></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('text_location', ['label' => 'Text k poloze objektu', 'class' => 'form-control', 'div' => ['class' => 'form-group']]);
                ?></div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][327]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 327; $i <= 335; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                    if (in_array($i, [335, 328])) {
                        echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                    }
                }
                ?>

            </div>
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][69]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 69; $i <= 72; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                    if (in_array($i, [70, 72])) {
                        echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                    }
                }
                ?>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][52]['Property']['PropertyType']['name']; ?></h4>
                <?php
                echo $this->Form->input('Value.' . 52 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 52 . '.value', ['label' => $this->request->data['Value'][52]['Property']['name'], 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group']]);
                for ($i = 53; $i <= 57; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>

            </div>
            <div class="col-xs-12 col-md-6">
                <!--<h4><?php // echo $this->request->data['Value'][52]['Property']['PropertyType']['name'];                                                  ?></h4>-->
                <br><br>
                <?php
                for ($i = 58; $i <= 62; $i++) {
                    ?>
                    <div class="checkbox">
                        <?php
                        echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'], 'div' => false]);
                        if ($i == 58) {
                            echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'class' => 'form-control form-control-inline', 'div' => false]);
                        }
                        ?>
                    </div>
                    <?php
                }
                echo $this->Form->input('Value.' . 63 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 63 . '.value', ['label' => $this->request->data['Value'][63]['Property']['name'], 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group']]);
                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <?php
                $this->Form->inputDefaults([
                    'div' => ['class' => 'form-group'],
                    'class' => ['form-control'],
                    'label' => false
                ]);
                for ($i = 64; $i <= 68; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>

                    <div class="row">
                        <div class="col-xs-4 text-right"><div class="form-group"><?php echo $this->request->data['Value'][$i]['Property']['name']; ?></div></div>
                        <div class="col-xs-1"><?php echo $this->Form->input('Value.' . $i . '.value'); ?></div>
                        <?php if (in_array($i, [67, 68])) { ?>
                            <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.value2'); ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="mistnosti"><h4>Místnosti</h4></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-2">Název</div>
            <div class="col-xs-2">Podlaží</div>
            <div class="col-xs-2">Velikost</div>
            <div class="col-xs-1">Vytápění</div>
            <div class="col-xs-1">Jednolůžek</div>
            <div class="col-xs-1">Dvoulůžek</div>
            <div class="col-xs-1">Patrových postelí</div>
            <div class="col-xs-1">Celkem lůžek</div>
            <div class="col-xs-1">Přistýlek</div>
        </div>
        <?php
        foreach ($this->request->data['Room'] as $i => $room) {
            echo $this->Form->input('Room.' . $i . '.id');
            ?>
            <div class="row">
                <div class="col-xs-2"><?php echo $this->Form->input('Room.' . $i . '.name'); ?></div>
                <div class="col-xs-2"><?php echo $this->Form->input('Room.' . $i . '.floor'); ?></div>
                <div class="col-xs-2"><?php echo $this->Form->input('Room.' . $i . '.size'); ?></div>
                <div class="col-xs-1"><?php echo $this->Form->input('Room.' . $i . '.heating', ['type' => 'checkbox', 'class' => 'checkbox']); ?></div>
                <div class="col-xs-1"><?php echo $this->Form->input('Room.' . $i . '.single_beds', ['type' => 'text']); ?></div>
                <div class="col-xs-1"><?php echo $this->Form->input('Room.' . $i . '.double_beds', ['type' => 'text']); ?></div>
                <div class="col-xs-1"><?php echo $this->Form->input('Room.' . $i . '.bunk_beds', ['type' => 'text']); ?></div>
                <div class="col-xs-1"><?php echo $this->Form->input('Room.' . $i . '.total_beds', ['type' => 'text']); ?></div>
                <div class="col-xs-1"><?php echo $this->Form->input('Room.' . $i . '.extra_beds', ['type' => 'text']); ?></div>

            </div>



            <?php
        }
        ?>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="vybaveni"><h4>Vybavení</h4></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('text_equipment', ['label' => 'Text k vybavení objektu', 'class' => 'form-control', 'div' => ['class' => 'form-group']]);
                ?></div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][73]['Property']['PropertyType']['name']; ?></h4>
                <?php
                $this->Form->inputDefaults([
                    'div' => ['class' => 'checkbox'],
                    'class' => '',
                    'label' => false
                ]);
                for ($i = 73; $i <= 79; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                }
                ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <br>
                <?php
                echo $this->Form->input('Value.80.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.80.value', ['label' => $this->request->data['Value'][80]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][81]['Property']['PropertyType']['name']; ?></h4>
                <?php
                $this->Form->inputDefaults([
                    'div' => ['class' => 'checkbox'],
                    'class' => '',
                    'label' => false
                ]);
                for ($i = 81; $i <= 108; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                    if (in_array($i, [88, 90])) {
                        echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                    }
                }
                echo $this->Form->input('Value.336.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.336.value', ['label' => $this->request->data['Value'][336]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][109]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 109; $i <= 123; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                        if (in_array($i, [109, 110, 114, 115, 116, 117, 118, 119])) {
                            echo $this->Form->input('Value.' . $i . '.value', ['label' => 'počet', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                        }
                        ?></div><?php
                    }
                    ?>
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        echo $this->Form->input('Value.' . 124 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 124 . '.switch', ['label' => $this->request->data['Value'][124]['Property']['name'],]);
                        ?>
                    </div>
                    <div class="col-xs-8">
                        <?php
                        echo $this->Form->input('Value.' . 124 . '.value', ['label' => false, 'div' => false, 'class' => 'form-control form-control-inline']) . ' m';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <?php
                        echo $this->Form->input('Value.' . 125 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 125 . '.switch', ['label' => $this->request->data['Value'][125]['Property']['name'],]);
                        ?>
                    </div>
                    <div class="col-xs-5 col-xs-offset-1">
                        <?php
                        echo $this->Form->input('Value.' . 126 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 126 . '.switch', ['label' => $this->request->data['Value'][126]['Property']['name'],]);
                        ?>
                    </div>
                </div>
                <?php
                echo $this->Form->input('Value.337.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.337.value', ['label' => $this->request->data['Value'][337]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control ']);
                ?>  
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][127]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 127; $i <= 145; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                        if (in_array($i, [127, 128, 129, 130])) {
                            echo $this->Form->input('Value.' . $i . '.value', ['label' => 'počet', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                        }
                        ?></div><?php
                    }
                    echo $this->Form->input('Value.146.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.146.value', ['label' => $this->request->data['Value'][146]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                    ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][147]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 147; $i <= 151; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                        if (in_array($i, [151])) {
                            echo $this->Form->input('Value.' . $i . '.value', ['label' => 'počet', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                        }
                        ?></div><?php
                    }
                    echo $this->Form->input('Value.152.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.152.value', ['label' => $this->request->data['Value'][152]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                    ?>

                <hr>
                <h4><?php echo $this->request->data['Value'][338]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 338; $i <= 346; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                            ?></div><?php
                }
                echo $this->Form->input('Value.347.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.347.value', ['label' => $this->request->data['Value'][347]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][153]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 153; $i <= 157; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                            ?></div><?php
                }
                ?>                
            </div>
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][158]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 158; $i <= 159; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                            ?></div><?php
                }
                ?> 
            </div>
            <div class="col-xs-12 col-md-4">
                <h4><?php echo $this->request->data['Value'][160]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 160; $i <= 164; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                            ?></div><?php
                }
                echo $this->Form->input('Value.165.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.165.value', ['label' => $this->request->data['Value'][165]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?> 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h4><?php echo $this->request->data['Value'][166]['Property']['PropertyType']['name']; ?></h4>
                <?php
                for ($i = 166; $i <= 169; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div>
                        <div class="col-xs-2"><?php
                            echo $this->Form->input('Value.' . $i . '.value', ['class' => 'form-control', 'div' => ['class' => 'form-group']]);
                            ?></div>

                        <div class="col-xs-2"><?php
                            echo $this->Form->input('Value.' . $i . '.value2', ['class' => 'form-control', 'div' => ['class' => 'form-group']]);
                            ?></div>
                        <?php
                        ?></div><?php
                    }
                    for ($i = 170; $i <= 186; $i++) {
                        ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                        if (in_array($i, [174, 173])) {
                            echo $this->Form->input('Value.' . $i . '.value', ['label' => 'počet', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                        }
                        if (in_array($i, [183])) {
                            ?>
                            <div class="col-xs-7">
                                <?php
                                echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                                ?>
                            </div>
                            <?php
                        }
                        ?></div><?php
                }
                ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        echo $this->Form->input('Value.' . 187 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 187 . '.switch', ['label' => $this->request->data['Value'][187]['Property']['name'],]);
                        ?></div>
                    <div class="col-xs-3 text-right">rozměry (m)</div>
                    <div class="col-xs-2"><?php
                        echo $this->Form->input('Value.' . 187 . '.value', ['class' => 'form-control', 'div' => ['class' => 'form-group']]);
                        ?></div>

                    <div class="col-xs-2"><?php
                        echo $this->Form->input('Value.' . 187 . '.value2', ['class' => 'form-control', 'div' => ['class' => 'form-group']]);
                        ?></div>
                    <?php
                    ?></div>
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <?php
                        echo $this->Form->input('Value.' . 188 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 188 . '.value', ['label' => $this->request->data['Value'][188]['Property']['name'], 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group ']]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <div class="row">
                            <?php
                            for ($i = 189; $i <= 191; $i++) {
                                ?>
                                <div class="col-xs-4">
                                    <?php
                                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                                    ?></div><?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php ?>
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        echo $this->Form->input('Value.' . 192 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 192 . '.switch', ['label' => $this->request->data['Value'][192]['Property']['name'],]);
                        ?></div>
                    <div class="col-xs-7">
                        <?php echo $this->Form->input('Value.' . 192 . '.value', ['label' => 'typ', 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group ']]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        echo $this->Form->input('Value.' . 193 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 193 . '.switch', ['label' => $this->request->data['Value'][193]['Property']['name'],]);
                        ?></div>
                    <div class="col-xs-3">
                        <?php echo $this->Form->input('Value.' . 193 . '.value', ['label' => 'počet', 'class' => 'form-control form-control-inline number', 'div' => ['class' => 'form-group ']]); ?>
                    </div>
                    <div class="col-xs-5">
                        <?php echo $this->Form->input('Value.' . 193 . '.value2', ['label' => 'typ', 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group ']]); ?>
                    </div>
                </div>
                <?php
                for ($i = 194; $i <= 205; $i++) {
                    ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?php
                            echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                            echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name'],]);
                            ?></div><?php
                        if (in_array($i, [205])) {
                            echo $this->Form->input('Value.' . $i . '.value', ['label' => 'dlouhý', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                        }
                        if (in_array($i, [194])) {
                            ?>
                            <div class="col-xs-7">
                                <?php
                                echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                                ?>
                            </div>
                            <?php
                        }
                        ?></div><?php
                }
                echo $this->Form->input('Value.206.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.206.value', ['label' => $this->request->data['Value'][206]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="aktivity"><h4>Aktivity</h4></div>
    <div class="panel-body">
        <h4>Letní aktivity</h4>
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('text_summer_activities', ['label' => 'Text k letním aktivitám', 'class' => 'form-control', 'div' => ['class' => 'form-group']]);
                ?></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php
                for ($i = 213; $i <= 234; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <?php if (!in_array($i, [225, 227, 228])) { ?>
                            <div class="col-xs-3"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                            <div class="col-xs-5"><?php echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('Value.235.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.235.value', ['label' => $this->request->data['Value'][235]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?>
            </div>
        </div>
        <hr>
        <h4>Zimní aktivity</h4>
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('text_winter_activities', ['label' => 'Text k zimním aktivitám', 'class' => 'form-control', 'div' => ['class' => 'form-group']]);
                ?></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <?php
                    echo $this->Form->input('Value.' . 236 . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="col-xs-4"><?php echo $this->Form->input('Value.' . 236 . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][236]['Property']['name']]); ?></div>
                    <div class="col-xs-3"><?php echo $this->Form->input('Value.' . 236 . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                    <div class="col-xs-5"><?php echo $this->Form->input('Value.' . 236 . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>

                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        echo $this->Form->input('Value.' . 237 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 237 . '.switch', ['label' => $this->request->data['Value'][237]['Property']['name'],]);
                        ?></div>
                    <div class="col-xs-7 col-xs-offset-0">
                        <?php
                        echo $this->Form->input('Value.' . 237 . '.value', ['label' => 'km', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']);
                        ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><?php
                        echo $this->Form->input('Value.' . 238 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 238 . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][238]['Property']['name']]);
                        ?></div>
                    <div class="col-xs-3"><?php echo $this->Form->input('Value.' . 238 . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                    <div class="col-xs-5"><?php echo $this->Form->input('Value.' . 238 . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                    <div class="col-xs-3 col-xs-offset-1">
                        <?php
                        echo $this->Form->input('Value.' . 239 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 239 . '.value', ['label' => 'počet vleků', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']);
                        ?>
                    </div>
                    <div class="col-xs-6">
                        <?php echo $this->Form->input('Value.' . 239 . '.value2', ['label' => 'z toho pro děti', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?>
                    </div>

                </div>
                <?php
                for ($i = 240; $i <= 241; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <div class="col-xs-3"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                        <div class="col-xs-5"><?php echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                    </div>
                    <?php
                }
                ?>
                <?php
                for ($i = 242; $i <= 243; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <div class="col-xs-3"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                        <div class="col-xs-5"><?php echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'kam', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                    </div>
                    <?php
                }
                ?>
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        echo $this->Form->input('Value.' . 244 . '.id', ['type' => 'hidden']);
                        echo $this->Form->input('Value.' . 244 . '.switch', ['label' => $this->request->data['Value'][244]['Property']['name']]);
                        ?></div>
                    <div class="col-xs-8">
                        <?php
                        echo $this->Form->input('Value.' . 244 . '.value', ['label' => 'vzdálené od ubytování (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']);
                        ?></div>
                </div>
                <?php
                echo $this->Form->input('Value.' . 245 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 245 . '.switch', ['label' => $this->request->data['Value'][245]['Property']['name']]);
                for ($i = 246; $i <= 249; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <?php if (!in_array($i, [225, 227, 228])) { ?>
                            <div class="col-xs-3"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                            <div class="col-xs-5"><?php echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        <hr>
        <h4>Tipy na výlet</h4>
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('text_trips', ['label' => 'Text k výletům', 'class' => 'form-control', 'div' => ['class' => 'form-group']]);
                ?></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php
                for ($i = 303; $i <= 326; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <div class="col-xs-3"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                        <div class="col-xs-5"><?php echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="dulezite"><h4>Důležité informace</h4></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <h4>Příjezd</h4>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 348 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 348 . '.value', ['label' => $this->request->data['Value'][348]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 250 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 250 . '.value', ['label' => $this->request->data['Value'][250]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
            <div class="col-xs-12 col-md-12">
                <?php
                echo $this->Form->input('Value.' . 251 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 251 . '.value', ['label' => $this->request->data['Value'][251]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control', 'type' => 'textarea', 'rows' => 2]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Klíče od objektu předává</h4>
            </div>
            <div class="col-xs-12 col-md-4">
                <?php
                echo $this->Form->input('Value.' . 252 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 252 . '.switch', ['label' => $this->request->data['Value'][252]['Property']['name']]);
                ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 253 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 253 . '.value', ['label' => $this->request->data['Value'][253]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-0">
                <?php
                echo $this->Form->input('Value.' . 254 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 254 . '.switch', ['label' => $this->request->data['Value'][254]['Property']['name']]);
                ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <?php
                echo $this->Form->input('Value.' . 254 . '.value', ['label' => 'jméno', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <?php
                echo $this->Form->input('Value.' . 254 . '.value2', ['label' => 'telefon', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-0">
                <?php
                echo $this->Form->input('Value.' . 255 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 255 . '.switch', ['label' => $this->request->data['Value'][255]['Property']['name']]);
                ?>
            </div>
            <div class="col-xs-12 col-md-8">
                <?php
                echo $this->Form->input('Value.' . 255 . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?>
            </div>
            <div class="col-xs-12 col-md-3 col-md-offset-1">
                <?php
                echo $this->Form->input('Value.' . 255 . '.value2', ['label' => 'jméno', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-0">
                <?php
                echo $this->Form->input('Value.' . 349 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 349 . '.value', ['label' => 'telefon', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <h4>Nástup a ukončení pobytu</h4>
            </div>
            <?php
            for ($i = 256; $i <= 258; $i++) {
                ?>
                <div class="col-xs-4">
                    <?php
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]);
                    ?>
                </div>                   
                <?php
            }
            ?>
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 259 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 259 . '.value', ['label' => $this->request->data['Value'][259]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control']);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Čas nástupu na pobyt</h4>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 260 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 260 . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][260]['Property']['name']]);
                ?>  
            </div>
            <div class="col-xs-12 col-md-1">
                <?php
                echo $this->Form->input('Value.' . 261 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 261 . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][261]['Property']['name']]);
                ?>  
            </div>
            <div class="col-md-4 col-xs-12">
                <?php echo $this->Form->input('Value.' . 261 . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 262 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 262 . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][262]['Property']['name']]);
                ?>  
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h4>Parkování</h4>
                <?php
                for ($i = 263; $i <= 268; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <?php if ($i == 264) {
                            ?>
                            <div class="col-xs-8"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => false, 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                            <?php
                        }
                        if ($i == 265) {
                            ?>
                            <div class="col-xs-8"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'pro aut', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                            <?php
                        }
                        ?>

                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <h4>Domácí zvíře v objektu</h4>
                <?php
                for ($i = 269; $i <= 273; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h4>Výše kauce</h4>                
            </div>

            <?php
            for ($i = 274; $i <= 275; $i++) {
                ?>
                <div class="col-xs-12 col-md-2">
                    <?php
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]);
                    ?>
                </div>
                <?php
            }
            ?>          
            <div class="col-xs-12 col-md-6">
                <?php
                echo $this->Form->input('Value.' . 276 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 276 . '.value', ['label' => $this->request->data['Value'][276]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h4>Kouření unitř objektu</h4>
                <?php
                for ($i = 277; $i <= 279; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?> 
            </div>
            <div class="col-xs-12 col-md-4">
                <h4>Povlečení na lůžkoviny</h4>
                <?php
                for ($i = 280; $i <= 282; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?> 
            </div>
            <div class="col-xs-12 col-md-4">
                <h4>Dřevo k dispozici</h4>
                <?php
                for ($i = 283; $i <= 285; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?> 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h4>Voda v objektu</h4>
                <?php
                for ($i = 286; $i <= 289; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                ?> 
            </div>
            <div class="col-xs-12 col-md-8">
                <h4>Komunikace s rekreanty možná v cizím jazyce</h4>
                <?php
                for ($i = 290; $i <= 294; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $this->request->data['Value'][$i]['Property']['name']]);
                }
                echo $this->Form->input('Value.' . 295 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 295 . '.value', ['label' => $this->request->data['Value'][295]['Property']['name'], 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group']]);
                ?> 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <h4>Důležité vzdálenosti (km)</h4>
                <?php
                for ($i = 296; $i <= 299; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('Value.' . $i . '.value', ['label' => $this->request->data['Value'][$i]['Property']['name'], 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group']]);
                }
                for ($i = 300; $i <= 301; $i++) {
                    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
                    ?>
                    <div class="row">
                        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $this->request->data['Value'][$i]['Property']['name']]); ?></div>
                        <div class="col-xs-3"><?php echo $this->Form->input('Value.' . $i . '.value', ['label' => 'vzdálenost (km)', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline number']); ?></div>
                        <div class="col-xs-5"><?php echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'název/kde', 'div' => ['class' => 'form-group'], 'class' => 'form-control form-control-inline']); ?></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->Form->input('Value.' . 302 . '.id', ['type' => 'hidden']);
                echo $this->Form->input('Value.' . 302 . '.value', ['label' => $this->request->data['Value'][302]['Property']['name'], 'div' => ['class' => 'form-group'], 'class' => 'form-control', 'type' => 'textarea', 'rows' => 2]);
                ?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="foto"><h4>Fotografie</h4></div>
    <div class="panel-body">
        <?php echo $this->Media->iframe('House', $this->request->data['House']['id']); ?>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" id="terminy"><h4>Termíny</h4></div>
    <div class="panel-body">
                <?php 
                foreach($this->request->data['HouseDate'] as $i =>$houseDate){
                    if(!empty($houseDate['TravelDate'])){
                        echo $this->Form->input('HouseDate.' . $i . '.id', ['type' => 'hidden']);
                    echo $this->Form->input('HouseDate.' . $i . '.date_condition_id', ['label' => $houseDate['TravelDate']['start'].' - '.$houseDate['TravelDate']['end'], 'class' => 'form-control form-control-inline', 'div' => ['class' => 'form-group'], 'type' => 'select']);
                    }
                }
                ?>
    </div>
</div>
<?php
echo $this->Form->submit('Uložit', ['class' => ['btn btn-success fixed-submit'], 'escape' => false]);
echo $this->Form->end();
