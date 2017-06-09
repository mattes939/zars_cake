<div class="row">
    <div class="col-xs-12">
        <h2><?php echo $area['Area']['name']; ?></h2>

        <?php
//debug($area);
        echo $this->element('content/houses', ['houses' => $area['House'], 'area' => $area['Area']['name']]);
        ?>
    </div>
</div>