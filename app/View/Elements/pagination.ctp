<nav aria-label="Page navigation" id="productsPagination" class="text-center">
    <?php echo $this->Paginator->prev('<< předchozí', array('class' => 'prev pull-left btn btn-default'), null, array('class' => 'prev pull-left disabled btn btn-default')); ?>
    <?php // echo $this->Paginator->next('další >>', array('class' => 'next pull-right'), null, array('class' => 'next pull-right disabled visible-xs')); ?>
    <ul class="pagination hidden-xs">
        <?php
        echo $this->Paginator->numbers(array(
            'separator' => '',
            'currentClass' => 'active',
            'currentTag' => 'a',
            'tag' => 'li',
        ));
        ?>

    </ul>
    <?php echo $this->Paginator->next('další >>', array('class' => 'next pull-right btn btn-default'), null, array('class' => 'next  disabled pull-right btn btn-default')); ?>
    <div class="row visible-xs">
        <ul class="pagination visible-xs col-xs-12 text-center">
            <?php
            echo $this->Paginator->numbers(array(
                'separator' => '',
                'currentClass' => 'disabled',
                'tag' => 'li',
            ));
            ?>

        </ul>
    </div>
</nav>