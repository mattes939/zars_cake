<?php // debug($this->request->data);      ?>

<?php echo $this->Form->create('House'); ?>
<h1><?php echo $this->request->data['House']['name']; ?></h1>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <?php
        $this->Form->inputDefaults([
            'div' => ['class' => 'form-group'],
            'class' => ['form-control']
        ]);
        echo $this->Form->input('id');
//        echo $this->Form->input('user_id');
        echo $this->Form->input('name', ['label' => 'Název']);
        echo $this->Form->input('code', ['label' => 'Číslo objektu', 'type' => 'text']);

        echo $this->Form->input('region_id', ['label' => 'Kraj']);
        echo $this->Form->input('district_id', ['label' => 'Okres']);
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
//        echo $this->Form->input('slug');
//        echo $this->Form->input('long_name');
//        echo $this->Form->input('coordinates');
//        echo $this->Form->input('text_location');
//        echo $this->Form->input('text_equipment');
//        echo $this->Form->input('text_activities');
//        echo $this->Form->input('text_summer_activities');
//        echo $this->Form->input('text_winter_activities');
//        echo $this->Form->input('text_trips');
$this->Form->inputDefaults([
    'div' => ['class' => 'checkbox row'],
    'class' => [' col-xs-3'],
    'label' => false
]);

//		echo $this->Form->input('TravelDate');
?>
<!--        <div class="row">
<?php
?>
        </div>-->
<div class="row"><div class="col-xs-12"><h3>Oblasti</h3></div><?php echo $this->Form->input('Area', ['multiple' => 'checkbox']); ?></div>
<!--<div class="row"><h3>Portály</h3><?php echo $this->Form->input('Portal', ['multiple' => 'checkbox']); ?></div>-->
<?php
$this->Form->inputDefaults([
    'div' => ['class' => 'form-group'],
    'class' => ['form-control'],
    'label' => false
]);
$i = 0;
?>

<h2>Vlastnosti objektu</h2>
<?php
$this->Form->inputDefaults([
    'div' => ['class' => 'form-group'],
    'class' => ['form-control'],
    'label' => false
]);
$current = 0;
foreach ($this->request->data['Value'] as $i => $value) {
    if ($current != $value['Property']['property_type_id']) {
        echo '<h3>' . $value['Property']['PropertyType']['name'] . '</h3>';
        $current = $value['Property']['property_type_id'];
    }
    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
    ?>
    <div class="row">
        <!--<div class="col-xs-3 text-right"><?php echo $value['Property']['name']; ?></div>-->
        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.switch', ['class' => 'checkbox checkbox-right', 'div' => ['class' => 'checkbox'], 'label' => $value['Property']['name']]); ?></div>
        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.value'); ?></div>
        <div class="col-xs-4"><?php echo $this->Form->input('Value.' . $i . '.value2'); ?></div>
    </div>
    <?php
}
?>

<?php echo $this->Form->end(__('Uložit změny')); ?>
