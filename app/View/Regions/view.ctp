<div class="row">
    <div class="col-xs-12">
        <h2><?php echo $region['Region']['name']; ?></h2>

        <?php
//debug($region);
        echo $this->element('content/houses', ['houses' => $region['House']]);
        ?>
    </div>
</div>