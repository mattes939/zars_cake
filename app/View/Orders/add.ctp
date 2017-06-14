<div class="cottage-detail" id="content">
    <div class="row">

        <div class="col-xs-12">

            <?php
            echo $this->Form->create('Order', [
                'inputDefaults' => [
//                    'label' => false,
                    'div' => ['class' => 'form-group'],
                    'class' => 'form-control'
                ]
            ]);
            echo $this->Form->input('User.first_name');
            echo $this->Form->input('User.last_name');
            echo $this->Form->input('User.birthday', ['type' => 'text', 'data-provide' => 'datepicker',
                'data-date-format' => 'yyyy-mm-dd',
                'data-language' => 'cs',
//                        'label' => 'Datum ukončení'
            ]);
            echo $this->Form->input('User.Address.street');
            echo $this->Form->input('User.Address.city');
            echo $this->Form->input('User.Address.psc');
            echo $this->Form->input('User.Address.country_id');
            echo $this->Form->input('User.email');
            echo $this->Form->input('User.phone1');

            echo $this->Form->input('attendants');
            echo $this->Form->input('adults');
            echo $this->Form->input('young');
            echo $this->Form->input('children');
            echo $this->Form->input('comment', ['type' => 'textarea']);
            echo $this->Form->input('animals');
            echo $this->Form->input('animals_details');

//            echo $this->Form->input('Deposit.0.deposit_type_id');
//            echo $this->Form->input('Deposit.1.deposit_type_id');
//            echo $this->Form->input('Deposit.2.deposit_type_id');

            echo $this->Form->end(__('Submit'));
            ?>

        </div>
    </div>
</div>