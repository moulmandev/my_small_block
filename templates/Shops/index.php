<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="my-4">Shop Name</h1>
            <div class="list-group">
                <?php
                /** @var array $keywords */
                foreach($keywords as $keyword){
                    echo $this->Html->link($keyword['key'],
                        ['controller' =>'Shops', 'action' => 'index', $keyword['key']],
                        [ 'class'=>'list-group-item']
                    );
                }
                ?>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row">
                <?php
                /** @var array $modsArray */
                foreach ($modsArray as $k => $v) {
                    echo $this->element('front/mod', array("data" => $v));
                }
                ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
