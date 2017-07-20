<div class="row">
    <?php
    echo $this->Form->create('Order', [
        'inputDefaults' => [
            'div' => ['class' => 'form-group'],
            'class' => 'form-control'
        ],
//            'class' => 'form-horizontal'
    ]);
    if (!empty($this->request->data['Order']['canceled'])) {
        ?>
        <div class="col-xs-12 bg-danger">
            <fieldset class="">

                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <h2>Storno objednávky</h2>
                        <dl class="dl-horizontal">
                            <dt>Stornováno dne</dt>
                            <dd><?php echo $this->Time->format($this->request->data['Order']['canceled'], '%e. %m. %y'); ?></dd>
                            <dt>Dnů před nástupem</dt>
                            <dd><?php
                                $canceled = new DateTime($this->request->data['Order']['canceled']);
                                $startDay = new DateTime($this->request->data['Order']['start_day']);
                                $diff = $canceled->diff($startDay)->format('%a');
                                $percentage = 1;
                                if ($diff >= 41) {
                                    $percentage = 0.1;
                                } elseif ($diff >= 11) {
                                    $percentage = 0.5;
                                } elseif ($diff >= 4) {
                                    $percentage = 0.8;
                                }
                                echo $diff . ' (' . $percentage * 100 . '%)';
                                ?></dd>
                            <dt>Výše storno poplatku</dt>
                            <dd><?php echo $this->request->data['Order']['billing_price'] * $percentage; ?> Kč</dd>
                            <dt>Výše storna majiteli</dt>
                            <dd><?php echo $this->request->data['Order']['owner_total'] * $percentage; ?> Kč</dd>
                            <dt>Zákazník již zaplatil</dt>
                            <dd>
                                <?php
                                $customerPaid = 0;
                                foreach ($this->request->data['Deposit'] as $i => $deposit) {
                                    $customerPaid += $deposit['price_paid'];
                                }
                                echo $customerPaid . ' Kč';
                                ?>
                            </dd>
                            <dt>Majitel již obdržel</dt>
                            <dd><?php
                                $ownerReceived = 0;
                                $ownerReceived += $this->request->data['Order']['owner_deposit'] + $this->request->data['Order']['owner_payment'];
                                echo $ownerReceived . ' Kč'
                                ?></dd>
                            <dt>Zákazník zaplatí</dt>
                            <dd><?php echo $this->request->data['Order']['billing_price'] * $percentage - $customerPaid; ?> Kč</dd>
                            <dt>Majitel obdrží</dt>
                            <dd><?php echo $this->request->data['Order']['owner_total'] * $percentage - $ownerReceived; ?> Kč</dd>
                        </dl>
                        <?php
//                        echo $this->Form->input('canceled', ['label' => 'Stornováno dne', 'class' => 'datepicker form-control', 'type' => 'text']);
                        ?>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <h2>Zákazník - Výzva k platbě storna</h2>
                        <?php
                        echo $this->Html->link('Náhled/tisk', ['controller' => 'orders', 'action' => 'confirmation', $id, 'storno'], ['escape' => false, 'class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['canceled']), 'target' => '_blank']);
                        echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email', ['controller' => 'orders', 'action' => 'confirmation', $id, 'storno-email'], ['escape' => false, 'class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['canceled']), 'target' => '']);
                        echo $this->Form->input('customer_canceled_sent', ['label' => 'odesláno dne (emailem automaticky)', 'type' => 'text', 'class' => 'datepicker form-control ', 'placeholder' => 'vyplnit pouze v případě zaslání poštou']);
                        ?>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <h2>Zákazník - Potvrzení platby storna</h2>
                        <?php
                        echo $this->Html->link('Náhled/tisk', ['controller' => 'orders', 'action' => 'confirmation', $id, 'storno-zaplaceno'], ['escape' => false, 'class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['canceled']), 'target' => '_blank']);
                        echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email', ['controller' => 'orders', 'action' => 'confirmation', $id, 'storno-zaplaceno-email'], ['escape' => false, 'class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['canceled']), 'target' => '']);
                        echo $this->Form->input('customer_canceled_sent', ['label' => 'odesláno dne (emailem automaticky)', 'type' => 'text', 'class' => 'datepicker form-control ', 'placeholder' => 'vyplnit pouze v případě zaslání poštou']);
                        ?>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <h2>Majitel - Potvrzení platby storna</h2>
                        <?php
                        echo $this->Html->link('Náhled/tisk', ['controller' => 'orders', 'action' => 'confirmation', $id, 'storno-majitel'], ['escape' => false, 'class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['canceled']), 'target' => '_blank']);
                        echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email', ['controller' => 'orders', 'action' => 'confirmation', $id, 'storno-majitel-email'], ['escape' => false, 'class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['canceled']), 'target' => '']);
                        echo $this->Form->input('owner_canceled_sent', ['label' => 'odesláno dne (emailem automaticky)', 'type' => 'text', 'class' => 'datepicker form-control ', 'placeholder' => 'vyplnit pouze v případě zaslání poštou']);

//                        echo $this->Html->link('Uzavřít storno', [], ['class' => 'btn btn-success']);
                         echo $this->Form->input('closed', ['label' => 'uzavřeno dne', 'type' => 'text', 'class' => 'datepicker form-control ', 'placeholder' => 'vyplnit datum uzavření storna', 'div' => ['class' => 'bg-success', 'style' => 'padding: 5px 15px 15px 15px;']]);
                        ?>
                    </div>
                </div>
            </fieldset>
        </div>
        <?php
    }
    ?>
    <div class="col-xs-12 col-md-6">

        <fieldset>
            <legend>Objednávka
                <?php echo empty($this->request->data['Order']['code']) ? '<small><i>(nepotvrzená)</i></small>' : 'č. <samp>', $this->request->data['Order']['code'] . '</samp>'; ?>
                <span class="pull-right">
                    <?php
//                    echo $this->Html->link('Stornovat', ['controller' => 'orders', 'action' => 'changeStatus', $id, 2], ['class' => 'btn btn-danger btn-sm']) . '&nbsp';
//                    echo $this->Html->link('Archivovat', ['controller' => 'orders', 'action' => 'changeStatus', $id, 3], ['class' => 'btn btn-warning btn-sm']) . '&nbsp';
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
                        'label' => 'Datum nástupu',
                        'placeholder' => 'automaticky'
                    ]);
                    ?>
                </div>
                <div class="col-xs-6">
                    <?php
                    echo $this->Form->input('end_day', ['type' => 'text',
                        'class' => 'datepicker form-control',
                        'label' => 'Datum ukončení',
                        'placeholder' => 'automaticky'
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php echo $this->Form->input('start_time', ['label' => 'Čas nástupu', 'placeholder' => 'automaticky']); ?>
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


        </fieldset>
        <fieldset id="fksp" class="<?php echo $this->request->data['Order']['employer_contribution'] ? '' : 'hidden'; ?>">
            <legend>FKSP</legend>
            <?php
            echo $this->Form->input('fksp_name', ['label' => 'Název firmy']);
            echo $this->Form->input('fksp_address', ['label' => 'Adresa firmy']);
            ?>
            <div class="row">
                <div class="col-xs-6"><?php echo $this->Form->input('fksp_ico', ['label' => 'IČO firmy']); ?></div>
                <div class="col-xs-6"><?php echo $this->Form->input('fksp_dic', ['label' => 'DIČ firmy']); ?></div>
            </div>
            <?php
            echo $this->Form->input('fksp_price', ['label' => 'Výše hrazení']);
            echo $this->Form->input('fksp_text', ['label' => 'Text do faktury']);
            ?>

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
            echo $this->Form->input('customer_notes', ['type' => 'textarea', 'label' => 'Poznámky pro zákazníka', 'default' => 'Ubytovací služby.']);
            echo $this->Form->input('notes', ['type' => 'textarea', 'label' => 'Vlastní poznámky']);
            ?>
        </fieldset>
    </div>
</div>
<fieldset>
    <legend>Majitel objektu - objednávka</legend>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <?php
            echo $this->Form->input('owner_notes', ['type' => 'text',
                'class' => 'textarea form-control',
                'label' => 'Poznámky majiteli',
                'type' => 'textarea',
                'rows' => 2,
                'empty' => 'Ubytovací služby. Prosím o potvrzení objednávky zpět formou sms na tel. 608 775 582. Děkuji a zůstávám s přáním pěkného dne. Monika Hadová za CA ZARS.'
            ]);
            ?>
        </div>
        <div class="col-xs-12 col-md-6">

            <?php
            echo $this->Form->input('owner_email', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Emailem',
                'placeholder' => 'automaticky'
            ]);
            echo $this->Form->input('owner_phone', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Telefonem'
            ]);
            echo $this->Form->input('owner_letter', ['type' => 'text',
                'class' => 'datepicker form-control',
                'label' => 'Písemně'
            ]);

            echo $this->Html->link('Náhled (tisk) objednávky objektu majiteli', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-objednavka'], ['class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'escape' => false, 'target' => '_blank']);
//            echo '<br><br>';
            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Odeslat objednávku majiteli emailem', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-objednavka-email'], ['class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'escape' => false, 'target' => '_blank']);
            ?>

        </div>
    </div>
</fieldset>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <fieldset>
            <legend>Ceny <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> Do ceníku', ['controller' => 'prices', 'action' => 'edit', $id], ['class' => 'btn btn-default btn-xs', 'escape' => false]); ?></legend>
            <div class="row">
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('owner_total', ['label' => 'Majitel celkem']); ?></div>

                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('price', ['label' => 'Katalogová cena', 'onchange' => 'calculateBillingPrice()']); ?></div>
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('discount', ['label' => 'Sleva', 'value' => 0, 'onchange' => 'calculateBillingPrice()']); ?></div>
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('final_price', ['label' => 'Dílčí výsledek', 'readonly']); ?></div>

                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('provision', ['label' => 'Provize %', 'value' => 0, 'onchange' => 'calculateBillingPrice()']); ?></div>
                <div class="col-xs-4 col-md-2"><?php echo $this->Form->input('billing_price', ['label' => 'Fakturační cena', 'required', 'readonly']); ?></div>
            </div>
        </fieldset>
    </div>
</div>
<fieldset>
    <legend>Zákazník - zálohy, doplatky, platby</legend>
    <div class="row">  
        <div class="col-xs-12">
            <p>Částky a data se doplní automaticky po potvrzení objednávky</p>
        </div>
        <div class="col-xs-12 col-md-12">

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Částka</th>
                        <th class="border-right">Splatnost</th>
                        <th>Přijatá částka</th>
                        <th>Zaplaceno dne</th>
                        <th>Potvrzení platby</th>
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
                            <td><?php echo $this->Form->input('Deposit.' . $i . '.price', ['label' => FALSE, 'placeholder' => 'automaticky']); ?></td>
                            <td class="border-right"><?php
                                echo $this->Form->input('Deposit.' . $i . '.maturity', ['type' => 'text',
                                    'class' => 'datepicker form-control',
                                    'label' => false,
                                    'placeholder' => 'automaticky'
                                ]);
                                ?></td>
                            <td><?php echo $this->Form->input('Deposit.' . $i . '.price_paid', ['label' => FALSE,]); ?></td>
                            <td><?php
                                echo $this->Form->input('Deposit.' . $i . '.pay_date', ['type' => 'text',
                                    'class' => 'datepicker form-control',
                                    'label' => false
                                ]);
                                ?></td>
                            <td><?php
                                if (empty($deposit['confirmed'])) {
                                    echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Potvrzení platby', ['controller' => 'deposits', 'action' => 'confirm', $deposit['id']], ['title' => 'Odeslat potvrzení o přijaté platbě', 'class' => 'btn btn-sm btn-primary' . $this->Code->classDisabled($deposit['pay_date']), 'escape' => false]);
                                } else {
                                    echo $this->Time->format($deposit['confirmed'], '%e. %-m. %Y');
                                }
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
            $sent = ' neodeslána';
            if (!empty($this->request->data['Order']['customer_coupon_sent'])) {
                $sent = ' odeslána ' . $this->Time->format($this->request->data['Order']['customer_coupon_sent'], '%e. %-m. %Y');
            }
            echo '<h2>Výzva k platbě' . $sent . '</h2>';

            echo $this->Html->link('Náhled/tisk výzvy k platbě - zákazník', ['controller' => 'orders', 'action' => 'confirmation', $id, 'platba'], ['escape' => false, 'class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'target' => '_blank']);
            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email výzvy k platbě - zákazník', ['controller' => 'orders', 'action' => 'confirmation', $id, 'platba-email'], ['escape' => false, 'class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'target' => 'blank']);

            echo $this->Form->input('customer_confirmation_sent', ['label' => 'odesláno dne (emailem automaticky)', 'type' => 'text', 'class' => 'datepicker form-control ', 'placeholder' => 'vyplnit pouze v případě zaslání poštou']);
            echo $this->Html->link('Náhled/tisk faktury - ZARS pro účetní', ['controller' => 'orders', 'action' => 'confirmation', $id, 'zars'], ['escape' => false, 'class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'target' => '_blank']);
            ?>
        </div>
        <div class="col-xs-12 col-md-6 buttons">
            <?php
            $sent = ' neodeslán';
            if (!empty($this->request->data['Order']['customer_coupon_sent'])) {
                $sent = ' odeslán ' . $this->Time->format($this->request->data['Order']['customer_coupon_sent'], '%e. %-m. %Y');
            }

            echo '<h2>Poukaz k pobytu' . $sent . '</h2>';
            echo $this->Html->link('Náhled/tisk poukazu k pobytu', ['controller' => 'orders', 'action' => 'confirmation', $id, 'poukaz-tisk'], ['escape' => false, 'class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'target' => '_blank']);
            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Email poukazu k pobytu', ['controller' => 'orders', 'action' => 'confirmation', $id, 'poukaz-email'], ['escape' => false, 'class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['confirmed']), 'target' => '_blank']);
            echo $this->Form->input('customer_coupon_sent', ['label' => 'odesláno dne (emailem automaticky)', 'type' => 'text', 'class' => 'datepicker form-control', 'placeholder' => 'vyplnit pouze v případě zaslání poštou']);
            ?>
        </div>
    </div>
</fieldset>

<fieldset id="payment-section">
    <legend>Platby majiteli</legend>
    <div class="row">
        <div class="col-xs-12 col-md-3">            
            <dl class="dl-horizontal">
                <dt>Zaplatit do</dt>
                <dd><?php echo $this->Time->format($this->request->data['Order']['owner_deadline'], '%e. %-m. %Y'); ?></dd>
                <dt>Celková částka</dt>
                <dd><?php echo $this->request->data['Order']['owner_total']; ?> Kč</dd>
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
                <dt>Číslo objektu</dt>
                <dd><?php echo $this->request->data['HouseDate']['House']['code']; ?></dd>
            </dl>
            <?php
//            debug($this->request->data['Order']);
            $disabled = '';
            if ($this->request->data['Order']['order_status_id'] != 1) {
                $disabled = ' disabled';
            }
            echo $this->Html->link('Stornovat', ['controller' => 'orders', 'action' => 'changeStatus', $id, 2], ['class' => 'btn btn-danger btn-sm' . $disabled]) . '&nbsp';
            if (empty($this->request->data['Order']['owner_payment_date'])) {
                $disabled = ' disabled';
            }
            echo $this->Html->link('Archivovat', ['controller' => 'orders', 'action' => 'changeStatus', $id, 3], ['class' => 'btn btn-warning btn-sm' . $disabled]) . '&nbsp';
            ?>
        </div>
        <div class="col-xs-12 col-md-4">   
            <h2>Záloha</h2>
            <div class="row">
                <div class="col-xs-6">
                    <?php echo $this->Form->input('owner_deposit', ['label' => 'Záloha majiteli']); ?>
                </div>
                <div class="col-xs-6"><?php echo $this->Form->input('owner_deposit_date', ['label' => 'zaplacena dne', 'type' => 'text', 'class' => 'datepicker form-control']);
                    ?></div>
            </div>
            <?php
            echo $this->Html->link('Náhled (tisk) zálohy objektu majiteli', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-zaloha'], ['class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['owner_deposit']), 'escape' => false, 'target' => '_blank']);

            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Odeslat oznámení o záloze majiteli emailem', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-zaloha-email'], ['class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['owner_deposit']), 'escape' => false, 'target' => '_blank']);
            echo $this->Form->input('owner_deposit_email', ['label' => 'E-mailové oznámení o záloze majiteli', 'type' => 'text', 'class' => 'datepicker form-control', 'placeholder' => 'automaticky']);
            echo $this->Form->input('owner_deposit_letter', ['label' => 'Písemné oznámení o záloze majiteli', 'type' => 'text', 'class' => 'datepicker form-control']);
            ?>
        </div>
        <div class="col-xs-12 col-md-4">
            <h2>Platba</h2>
            <div class="row">
                <div class="col-xs-6">
                    <?php echo $this->Form->input('owner_payment', ['label' => 'Platba majiteli']); ?>
                </div>
                <div class="col-xs-6"><?php echo $this->Form->input('owner_payment_date', ['label' => 'zaplacena dne', 'type' => 'text', 'class' => 'datepicker form-control']);
                    ?></div>
            </div>
            <?php
            echo $this->Html->link('Náhled (tisk) platby objektu majiteli', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-platba'], ['class' => 'btn btn-default' . $this->Code->classDisabled($this->request->data['Order']['owner_payment']), 'escape' => false, 'target' => '_blank']);

            echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Odeslat oznámení o platbě majiteli emailem', ['controller' => 'orders', 'action' => 'confirmation', $id, 'majitel-platba-email'], ['class' => 'btn btn-primary' . $this->Code->classDisabled($this->request->data['Order']['owner_payment']), 'escape' => false, 'target' => '_blank']);
            echo $this->Form->input('owner_payment_email', ['label' => 'E-mailové oznámení o platbě majiteli', 'type' => 'text', 'class' => 'datepicker form-control', 'placeholder' => 'automaticky']);
            echo $this->Form->input('owner_payment_letter', ['label' => 'Písemné oznámení o platbě majiteli', 'type' => 'text', 'class' => 'datepicker form-control']);
//            echo $this->Form->input('rg_payment', ['label' => 'Platba RG dne', 'type' => 'text', 'class' => 'datepicker form-control']);
            ?>
        </div>
    </div>

</fieldset>
<?php
if (empty($this->request->data['Order']['confirmed'])) {
    echo $this->Form->submit('Potvrdit', ['class' => 'btn btn-info fixed-submit']);
} else {
    echo $this->Form->submit('Uložit', ['class' => 'btn btn-success fixed-submit']);
}

echo $this->Form->end();
?>
