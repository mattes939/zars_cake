<div id="featuredGallery">

    <div class="row">
        <?php
        foreach ($houses as $house) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <?php
                    if(!empty($house['Media'])){
                    $image = $this->Html->image($house['Media'][0]['file'], ['class' => 'img-responsive']);
                    echo $this->Html->link($image, ['controller' => 'houses', 'action' => 'view', $house['slug']], ['escape' => FALSE]);    
                    }
                    
                    ?>
                    <div class="caption">
                        <h4 class="title"><?php
                if (isset($area)) {
                    $areaName = &$area;
                } else {
                    $areaName = &$house['Area'][0]['name'];
                }


                echo $this->Html->link($house['name'] . '<span class="cislo">' . $house['code'] . '</span><br>' . $areaName, ['controller' => 'houses', 'action' => 'view', $house['slug']], ['escape' => false]);
                    ?></h4>
                        <p>Tady bude akční text</p>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>
    </div>
</div>
