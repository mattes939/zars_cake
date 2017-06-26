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
                <span class="pull-right">
                <?php 
        echo $this->Html->link('Stornovat', ['controller' => 'orders', 'action' => 'changeStatus', $id, 2], ['class' => 'btn btn-danger btn-sm']) . '&nbsp';
        echo $this->Html->link('Archivovat', ['controller' => 'orders', 'action' => 'changeStatus', $id, 3], ['class' => 'btn btn-warning btn-sm']) . '&nbsp';
        ?></span>
            </legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('confirmed', ['type' => 'hidden']);
            echo $this->Form->input('company_id', ['label' => 'Cestovka', 'empty' => '---', 'required']);
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
            echo $this->Form->input('comment', ['type' => 'textarea', 'label' => 'Komentář zákazníka']);
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
            echo $this->Form->input('User.Address.0.id');
//            echo $this->Form->input('User.Address.0.user_id', ['type' => 'hidden']);
            echo $this->Form->input('User.Address.0.street', ['label' => 'Ulice, č.p.']);
            ?>
            <div class="row">
                <div class="col-xs-8"><?php echo $this->Form->input('User.Address.0.city', ['label' => 'Město']); ?></div>
                <div class="col-xs-4"><?php echo $this->Form->input('User.Address.0.psc', ['label' => 'PSČ']); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-6"><?php echo $this->Form->input('User.Address.0.country_id', ['label' => 'Stát']); ?></div>
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
            echo $this->Form->input('customer_notes', ['type' => 'textarea', 'label' => 'Poznámky pro zákazníka']);
            echo $this->Form->input('notes', ['type' => 'textarea', 'label' => 'Vlastní poznámky']);
            ?>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <fieldset>
            <legend>Ceny</legend>
            <div class="row">
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('price', ['label' => 'Katalogová cena']); ?></div>
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('discount', ['label' => 'Sleva']); ?></div>
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('final_price', ['label' => 'Výsledná cena']); ?></div>

                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('provision', ['label' => 'Provize']); ?></div>
                <div class="col-xs-8 col-md-4"><?php echo $this->Form->input('billing_price', ['label' => 'Fakturační cena', 'required']); ?></div>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">  <fieldset>
        <div class="col-xs-12"><legend>Zákazník - zálohy, doplatky, platby</legend></div>
        <div class="col-xs-12 col-md-6">


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
                                if (empty($deposit['pay_date'])) {
                                    $class .= ' disabled';
                                }

                                echo $this->Html->link('<span class="glyphicon glyphicon-send"></span>', ['controller' => 'deposits', 'action' => 'confirm', $deposit['id']], ['title' => 'Odeslat potvrzení o přijaté platbě', 'class' => $class, 'escape' => false]);
                                ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-md-6 buttons">

            <?php
            echo $this->Html->link('Náhled/tisk výzvy k platbě - zákazník', ['controller' => 'orders', 'action' => 'confirmation', $id, 'platba'], ['escape' => false, 'class' => 'btn btn-primary', 'target' => '_blank']);
            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email výzvy k platbě - zákazník', ['controller' => 'orders', 'action' => 'confirmation', $id, 'platba-email'], ['escape' => false, 'class' => 'btn btn-primary', 'target' => 'blank']);
            echo $this->Html->link('Náhled/tisk faktury - ZARS pro účetní', ['controller' => 'orders', 'action' => 'confirmation', $id, 'zars'], ['escape' => false, 'class' => 'btn btn-default', 'target' => '_blank']);
            if (!empty($this->request->data['Order']['customer_confirmation_sent'])) {
                echo '<p class="">Výzva k platbě odeslána ' . $this->Time->format($this->request->data['Order']['customer_confirmation_sent'], '%e. %-m. %Y') . '</p>';
            }
            echo '<hr><h4>Poukaz k pobytu</h4>';
            echo $this->Html->link('Náhled/tisk poukazu k pobytu', ['controller' => 'orders', 'action' => 'confirmation', $id, 'poukaz-tisk'], ['escape' => false, 'class' => 'btn btn-primary', 'target' => '_blank']);
            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email poukazu k pobytu', ['controller' => 'orders', 'action' => 'confirmation', $id, 'poukaz-email'], ['escape' => false, 'class' => 'btn btn-primary', 'target' => '_blank']);
            if (!empty($this->request->data['Order']['customer_coupon_sent'])) {
                echo '<p class="">Poukaz k pobytu byl poslán ' . $this->Time->format($this->request->data['Order']['customer_coupon_sent'], '%e. %-m. %Y') . '</p>';
            }
            ?>
        </div>
    </fieldset>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Majitel objektu - objednávka</legend>
            <?php
            echo $this->Form->input('owner_email', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Emailem'
            ]);
            echo $this->Form->input('owner_phone', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Telefonem'
            ]);
            echo $this->Form->input('owner_letter', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Písemně'
            ]);
            ?>
        </fieldset>
    </div>

    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Objednávka pobytu majiteli objektu</legend>
            <?php
            echo $this->Form->input('owner_notes', ['type' => 'text',
                'class' => 'textarea form-control',
                'label' => 'Poznámky majiteli',
                'type' => 'textarea',
                'rows' => 2
            ]);
            echo $this->Html->link('Náhled (tisk) objednávky objektu majiteli', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel'], ['class' => 'btn btn-primary', 'escape' => false, 'target' => '_blank']);
            echo '<br><br>';
            echo $this->Html->link('Odeslat objednávku majiteli emailem', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-email'], ['class' => 'btn btn-primary', 'escape' => false, 'target' => '_blank']);
            ?>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <fieldset>
            <legend>Platby majitel</legend>

            <div class="row">
                <div class="col-xs-6">
                    Deadline: <?php echo $this->Time->format($this->request->data['Order']['owner_deadline'], '%e. %-m. %Y'); ?>  
                </div>
                <div class="col-xs-6">
                    <?php
                    echo $this->Form->input('owner_total', ['label' => 'Majitel celkem']);
//            echo $this->Form->input('owner_deadline', ['label' => 'Kdy poslat majiteli platbu', 'disabled', 'type' => 'text']);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php echo $this->Form->input('owner_deposit', ['label' => 'Záloha majiteli']); ?>
                </div>
                <div class="col-xs-6"><?php echo $this->Form->input('owner_deposit_date', ['label' => 'dne', 'type' => 'text', 'class' => 'datepicker form-control']);
                    ?></div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php echo $this->Form->input('owner_payment', ['label' => 'Platba majiteli']); ?>
                </div>
                <div class="col-xs-6"><?php echo $this->Form->input('owner_payment_date', ['label' => 'dne', 'type' => 'text', 'class' => 'datepicker form-control']);
                    ?></div>
            </div>
            <?php
            echo $this->Form->input('owner_payment_email', ['label' => 'E-mailové oznámení o platbě majiteli', 'type' => 'text', 'class' => 'datepicker form-control']);
            echo $this->Form->input('owner_payment_letter', ['label' => 'Písemné oznámení o platbě majiteli', 'type' => 'text', 'class' => 'datepicker form-control']);
            echo $this->Form->input('rg_payment', ['label' => 'Platba RG dne', 'type' => 'text', 'class' => 'datepicker form-control']);
            ?>
        </fieldset>
    </div>

    <div class="col-xs-12 col-md-6">
        <?php // debug($this->request->data['HouseDate']['House']['User']); ?>
        <h2>Matitel objektu</h2>
        <dl class="dl-horizontal">
            <dt>Variabilní symbol</dt>
            <dd> <?php echo empty($this->request->data['Order']['code']) ? '<small><i>(nepotvrzená objednávka)</i></small>' : $this->request->data['Order']['code']; ?></dd>
            <dt>Číslo účtu</dt>
            <dd><?php echo $this->request->data['HouseDate']['House']['User']['bank_account']; ?></dd>
            <dt>Kód banky</dt>
            <dd><?php echo $this->request->data['HouseDate']['House']['User']['bank_code']; ?></dd>
            <dt>Jméno majitele</dt>
            <dd><?php echo $this->request->data['HouseDate']['House']['User']['first_name'] . ' ' . $this->request->data['HouseDate']['House']['User']['last_name']; ?></dd>
            <dt>Příjmení zákazníka</dt>
            <dd><?php echo $this->request->data['User']['last_name']; ?></dd>
        </dl>
        <br>
        
    </div>
</div>

<?php
echo $this->Form->submit('Uložit', ['class' => 'btn btn-success fixed-submit']);
echo $this->Form->end();
?>
