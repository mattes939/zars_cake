<div class="row">
    <div class="col-xs-12 col-md-6">
        <?php
        echo $this->Form->create('Order', [
            'inputDefaults' => [
                'div' => ['class' => 'form-group'],
                'class' => 'form-control'
            ],
//            'class' => 'form-horizontal'
        ]);
        ?>
        <fieldset>
            <legend>Objednávka
                <?php echo empty($this->request->data['Order']['code']) ? '<small><i>(nepotvrzená)</i></small>' : 'č. <samp>', $this->request->data['Order']['code'] . '</samp>'; ?>
            </legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('confirmed', ['type' => 'hidden']);
            echo $this->Form->input('company_id', ['label' => 'Cestovka', 'empty' => '---']);
//		echo $this->Form->input('user_id');
            echo $this->Form->input('HouseDate.id');
            echo $this->Form->input('HouseDate.house_id', ['label' => 'Objekt', 'empty' => '---']);
            echo $this->Form->input('HouseDate.travel_date_id', ['label' => 'Termín', 'empty' => '---']);





//		echo $this->Form->input('confirmed');
//		echo $this->Form->input('canceled');
            ?>
            <div class="row">
                <div class="col-xs-3"><?php echo $this->Form->input('attendants', ['label' => 'Počet osob:']); ?></div>
                <div class="col-xs-3"><?php echo $this->Form->input('adults', ['label' => 'Dospělí']); ?></div>
                <div class="col-xs-3"><?php echo $this->Form->input('young', ['label' => '4 - 18 let']); ?></div>
                <div class="col-xs-3"><?php echo $this->Form->input('children', ['label' => 'Do 3 let']); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php
                    echo $this->Form->input('start_day', ['type' => 'text',
                        'class' => 'datepicker form-control',
                        'label' => 'Datum nástupu'
                    ]);
                    ?>
                </div>
                <div class="col-xs-6">
                    <?php
                    echo $this->Form->input('end_day', ['type' => 'text',
                        'class' => 'datepicker form-control',
                        'label' => 'Datum ukončení'
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
<?php echo $this->Form->input('start_time', ['label' => 'Čas nástupu']); ?>
                </div>
                <div class="col-xs-6">
<?php echo $this->Form->input('end_time', ['label' => 'Čas ukončení']); ?>
                </div>
            </div>


<?php
echo $this->Form->input('comment', ['type' => 'textarea', 'label' => 'Poznámka zákazníka']);
?>
            <div class="form-group">
            <?php
            echo $this->Form->input('animals', ['div' => false, 'label' => 'Domácí zvíře:', 'class' => '']);
            echo $this->Form->input('animals_details', ['label' => false, 'div' => false, 'class' => 'form-control']);
            ?>
            </div>
                <?php echo $this->Form->input('employer_contribution', ['label' => 'Požadavek FKSP', 'class' => '']); ?>

            <?php ?>
        </fieldset>


    </div>
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend><?php echo __('Zákazník'); ?></legend>
<?php
echo $this->Form->input('User.id');
?>
            <div class="row">
                <div class="col-xs-5"><?php echo $this->Form->input('User.first_name', ['label' => 'Jméno']); ?></div>
                <div class="col-xs-7"><?php echo $this->Form->input('User.last_name', ['label' => 'Příjmení']); ?></div>
            </div>
<?php
echo $this->Form->input('User.Address.id');
echo $this->Form->input('User.Address.street', ['label' => 'Ulice, č.p.']);
?>
            <div class="row">
                <div class="col-xs-8"><?php echo $this->Form->input('User.Address.city', ['label' => 'Město']); ?></div>
                <div class="col-xs-4"><?php echo $this->Form->input('User.Address.psc', ['label' => 'PSČ']); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-6"><?php echo $this->Form->input('User.Address.country_id', ['label' => 'Stát']); ?></div>
                <div class="col-xs-6"><?php
            echo $this->Form->input('User.birthday', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Datum narození'
            ]);
?></div>
            </div>
                    <?php
                    echo $this->Form->input('User.email', ['label' => 'Email']);
                    echo $this->Form->input('User.phone1', ['label' => 'Telefon']);
                    echo $this->Form->input('notes', ['type' => 'textarea', 'label' => 'Poznámky']);
                    ?>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Ceny</legend>
            <div class="row">
                <div class="col-xs-4"><?php echo $this->Form->input('price', ['label' => 'Standartní cena']); ?></div>
                <div class="col-xs-4"><?php echo $this->Form->input('discount', ['label' => 'Sleva']); ?></div>
                <div class="col-xs-4"><?php echo $this->Form->input('final_price', ['label' => 'Výsledná cena']); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-4"><?php echo $this->Form->input('provision', ['label' => 'Provize']); ?></div>
                <div class="col-xs-8"><?php echo $this->Form->input('billing_price', ['label' => 'Fakturační cena']); ?></div>
            </div>
        </fieldset>
    </div>

    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Zákazník - zálohy, doplatky</legend>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Částka</th>
                        <th>Splatnost</th>
                        <th>Zaplaceno dne</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($this->request->data['Deposit'] as $i => $deposit) {
    echo $this->Form->input('Deposit.' . $i . '.id');
    echo $this->Form->input('Deposit.' . $i . '.deposit_type_id', ['type' => 'hidden']);
    ?>
                        <tr>
                            <td><?php echo $depositTypes[$i + 1]; ?></td>
                            <td><?php echo $this->Form->input('Deposit.' . $i . '.price', ['label' => FALSE]); ?></td>
                            <td><?php
                        echo $this->Form->input('Deposit.' . $i . '.maturity', ['type' => 'text',
                            'class' => 'datepicker form-control',
                            'label' => false
                        ]);
                        ?></td>
                            <td><?php
                                echo $this->Form->input('Deposit.' . $i . '.pay_date', ['type' => 'text',
                                    'class' => 'datepicker form-control',
                                    'label' => false
                                ]);
                                ?></td>
                            <td><?php 
                            $class = 'btn btn-sm btn-primary';
                            if(empty($deposit['Deposit']['pay_date'])){
                                $class .= ' disabled';
                            }
                             
                            echo $this->Html->link('<span class="glyphicon glyphicon-send"></span>', '#', ['title' => 'Odeslat potvrzení o přijaté platbě', 'class' => $class, 'escape' => false]); ?></td>
                        </tr>
                                <?php
                            }
                            ?>
                </tbody>
            </table>


        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Majitel objektu - objednávka</legend>

        </fieldset>
    </div>

    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Objednávka pobytu majiteli objektu</legend>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Zákazník - platby</legend>

        </fieldset>
    </div>

    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Poukaz k pobytu</legend>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Platby majitel</legend>

        </fieldset>
    </div>

    <div class="col-xs-12 col-md-6">

    </div>
</div>

<?php
echo $this->Form->submit('Uložit', ['class' => 'btn btn-success fixed-submit']);
echo $this->Form->end();
?>
