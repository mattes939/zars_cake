<div class="cottage-detail" id="content">
    <div class="row">

        <div class="col-xs-12">
            <h1>Objednávka pobytu <?php echo $houseDate['House']['full_name']; ?></h1>
            <?php
//            debug($houseDate);
            echo $this->Form->create('Order', [
                'inputDefaults' => [
//                    'label' => false,
                    'div' => ['class' => 'form-group'],
                    'class' => 'form-control'
                ]
            ]);
            //editovatelné podle toho, jestli v ceníku je na méně dní
            echo $this->Form->input('start_day', ['type' => 'text', 'data-provide' => 'datepicker',
                'data-date-format' => 'yyyy-mm-dd',
                'data-language' => 'cs',
                'label' => 'Datum nástupu',
                'value' => $houseDate['TravelDate']['start']
            ]);
            echo $this->Form->input('end_day', ['type' => 'text', 'data-provide' => 'datepicker',
                'data-date-format' => 'yyyy-mm-dd',
                'data-language' => 'cs',
                'label' => 'Datum ukončení',
                'value' => $houseDate['TravelDate']['end']
            ]);
            echo $this->Form->input('User.first_name');
            echo $this->Form->input('User.last_name');
            echo $this->Form->input('User.birthday', ['type' => 'text', 'data-provide' => 'datepicker',
                'data-date-format' => 'yyyy-mm-dd',
                'data-language' => 'cs',
//                        'label' => 'Datum ukončení'
            ]);
            echo $this->Form->input('User.Address.0.street');
            echo $this->Form->input('User.Address.0.city');
            echo $this->Form->input('User.Address.0.psc');
            echo $this->Form->input('User.Address.0.country_id');
            echo $this->Form->input('User.email');
            echo $this->Form->input('User.phone1');

            echo $this->Form->input('attendants');
            echo $this->Form->input('adults');
            echo $this->Form->input('young');
            echo $this->Form->input('children');
            echo $this->Form->input('comment', ['type' => 'textarea']);
            echo $this->Form->input('animals');
            echo $this->Form->input('animals_details');
            echo $this->Form->input('employer_contribution', ['label' => 'Požadavek FKSP', 'class' => '']);
            ?>
            <fieldset id="fksp" class="hidden">
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
            <?php
            echo $this->Form->end(__('Submit'));
            ?>

        </div>
    </div>
</div>