<?php echo $this->Form->create('Article', [
    'inputDefaults' => [
        'div' => ['class' => 'form-group'],
        'class' => 'form-control'
    ]
]); ?>
	<fieldset>
		<legend><?php echo __('Upravit článek'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id', ['label' => 'Nadřazená položka', 'empty' => '---']);
		echo $this->Form->input('title', ['label' => 'Název']);
                echo $this->Form->input('menu_title', ['label' => 'Název v menu', 'placeholder' => 'Pro stejný název zanechte prázdné']);
		echo $this->Form->input('intro', ['label' => 'Úvodní text']);
		echo $this->Form->input('content', ['label' => 'Obsah článku']);
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
		
        $this->Form->inputDefaults([
            'div' => ['class' => 'checkbox row'],
            'class' => [' col-xs-3'],
            'label' => false
        ]);
        ?>

        <div class="row"><div class="col-xs-12"><h4>Přidružené oblasti</h4></div><?php echo $this->Form->input('Area', ['multiple' => 'checkbox']); ?></div>
        <?php echo $this->Form->input('hidden', ['label' => 'Skrytý článek', 'div' => ['class' => 'checkbox'], 'class' => 'checkbox']);?>
	</fieldset>
<?php echo $this->Form->submit('Uložit', ['class' => ['btn btn-success'], 'escape' => false]); 