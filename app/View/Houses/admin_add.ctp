
<?php echo $this->Form->create('House'); ?>
<fieldset>
    <legend><?php echo __('Admin Add House'); ?></legend>
    <?php
//    echo $this->Form->input('id',['type' => 'text']);
    echo $this->Form->input('user_id');
    echo $this->Form->input('region_id');
    echo $this->Form->input('district_id');
    echo $this->Form->input('code');
    echo $this->Form->input('name');
    echo $this->Form->input('slug');
    echo $this->Form->input('long_name');
    echo $this->Form->input('active');
    echo $this->Form->input('website');
    echo $this->Form->input('coordinates');
    echo $this->Form->input('html_title');
    echo $this->Form->input('html_keywords');
    echo $this->Form->input('html_description');
    echo $this->Form->input('text_description');
    echo $this->Form->input('text_location');
    echo $this->Form->input('text_equipment');
    echo $this->Form->input('text_activities');
    echo $this->Form->input('text_summer_activities');
    echo $this->Form->input('text_winter_activities');
    echo $this->Form->input('text_trips');
    echo $this->Form->input('Area', ['multiple' => 'checkbox']);
    ?>
</fieldset>
<?php
//$i = 0;
//foreach ($properties as $property) {
//    echo $this->Form->input('Value.' . $i . '.id', array('type' => 'hidden'));
//    echo $this->Form->input('Value.' . $i . '.property_id', array('type' => 'hidden', 'value' => $property['Property']['id']));
//    echo $this->Form->input('Value.' . $i . '.switch', array('label' => $property['Property']['name'], 'type' => 'checkbox'));
//    echo $this->Form->input('Value.' . $i . '.value', array('label' => 'value'));
//    echo $this->Form->input('Value.' . $i . '.value2', array('label' => 'value2'));
//    $i++;
//}
//debug($i);
?>  


<?php echo $this->Form->end(__('Submit')); ?>

