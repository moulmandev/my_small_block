<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">DETAILS</h1>
    </div>
</section>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="pro-img-details">
                    <img src="<?= $mod["picture"] ?>" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="pro-d-title">
                    <?= $mod["name"] ?>
                </h4>
                <p>
                    <?= $mod["description"] ?>
                </p>
                <div class="product_meta">
                    <span class="tagged_as"><strong>Tags:</strong>
                    <?php
                        foreach ($mod["keywords"] as $k => $v) {
                            echo $mod["keywords"][$k]["keyword"].", ";
                        }
                    ?>
                    </span>
                </div>
                <div class="m-bot15"> <strong>Prix : </strong><?= $mod["price"] ?>€</div>

                <div class="btn-group">
                <?php
                    if (empty($this->Session->read("Auth.id"))) {
                        echo $this->Html->link(
                            '<i class="fa fa-shopping-cart"></i> Ajouter au panier',
                            ['controller' => 'Shops', 'action' => 'addCart', $mod["id"]],
                            ['class' => 'btn btn-round btn-danger', 'escapeTitle' => false]
                        );
                    } else {
                        if ($mod['isShown'] == false) {
                            echo $this->Html->link(
                                '<i class="fa fa-plus"></i> Ajouter au catalogue',
                                ['controller' => 'Admins', 'action' => 'addToCatalogue', $mod["id"]],
                                ['class' => 'btn btn-round btn-success', 'escapeTitle' => false]
                            );

                            echo $this->Html->link(
                                '<i class="fa fa-trash"></i> Supprimer la demande',
                                ['controller' => 'Admins', 'action' => 'removeFromDb', $mod["id"]],
                                ['class' => 'btn btn-round btn-danger', 'escapeTitle' => false]
                            );

                        } else {
                            echo $this->Html->link(
                                '<i class="fa fa-trash"></i> Retirer du catalogue',
                                ['controller' => 'Admins', 'action' => 'removeFromCatalogue', $mod["id"]],
                                ['class' => 'btn btn-round btn-danger', 'escapeTitle' => false]
                            );
                        }
                    }
                ?>
                </div>


                <?php
                    if (!empty($this->Session->read("Auth.id"))) {
                        echo '<div class="btn-group">';

                        for ($i = 1; $i < 6; $i++) {
                            echo $this->Html->link(
                                    '&#9733',
                                    ['controller' => 'Admins', 'action' => 'setStars', $mod["id"], '?' => ['stars' => $i]],
                                    ['class' => 'btn btn-primary', 'style' => 'font-size:15px', 'escapeTitle' => false]
                                );
                        }
                         echo '</div>';
                    }
                ?>


            </div>
        </div>
    </div>
</div>


