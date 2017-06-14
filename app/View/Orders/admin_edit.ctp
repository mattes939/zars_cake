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
            <legend><?php echo __('Objednávka'); ?></legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('confirmed', ['type' => 'hidden']);
            echo $this->Form->input('company_id', ['label' => 'Cestovka']);
//		echo $this->Form->input('user_id');
            echo $this->Form->input('HouseDate.house_id', ['label' => 'Objekt']);
            echo $this->Form->input('HouseDate.travel_date_id', ['label' => 'Termín']);





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
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'yyyy-mm-dd',
                        'data-language' => 'cs',
                        'label' => 'Datum nástupu'
                    ]);
                    ?>
                </div>
                <div class="col-xs-6">
                    <?php
                    echo $this->Form->input('end_day', ['type' => 'text',
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'yyyy-mm-dd',
                        'data-language' => 'cs',
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

            <?php
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
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'yyyy-mm-dd',
                        'data-language' => 'cs',
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
                                    'data-provide' => 'datepicker',
                                    'data-date-format' => 'yyyy-mm-dd',
                                    'data-language' => 'cs',
                                    'label' => false
                                ]);
                                ?></td>
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

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Order.id')))); ?></li>
        <li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
    </ul>
</div>
