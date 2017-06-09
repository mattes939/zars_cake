
<div id="featuredGallery">
    <div class="row">
        <div class="col-xs-12 col-md-6">
              <?php
            echo $this->element('content/search_form', ['areas' => $areas, 'travelDates' => $travelDates, 'countries' => $countries]);
            ?>
        </div>
        <div class="col-xs-12 col-md-6">
            <div id="search-by-map">
                <h3>Vyhledávání podle mapy</h3>
                <div class="row" style="margin-top: 40px;">
                    <div class="col-md-6 text-center">
                        Nabídka ubytování v ČR<br />

                        <object data="<?php echo $this->webroot . './svg/cr-kraje.svg'; ?>" type="image/svg+xml" style="margin-top: 20px;">Váš prohlížeč nepodporuje SVG</object>
                    </div>
                    <div class="col-md-6 text-center">
                        Nabídka ubytování v SR
                        <object data="<?php echo $this->webroot . './svg/sr-kraje.svg'; ?>" type="image/svg+xml" style="margin-top: 20px;">Váš prohlížeč nepodporuje SVG</object>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Akční nabídka</h2>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($houses as $house) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <?php
                    $image = $this->Html->image($house['Media']['']['file'], ['class' => 'img-responsive']);
                    echo $this->Html->link($image, ['controller' => 'houses', 'action' => 'view', $house['House']['slug']], ['escape' => FALSE])
                    ?>
                    <div class="caption">
                        <h4 class="title"><?php
                            echo $this->Html->link($house['House']['name'] . '<span class="cislo">' . $house['House']['code'] . '</span><br>' . $house['Area'][0]['name'], ['controller' => 'houses', 'action' => 'view', $house['House']['slug']], ['escape' => false]);
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

