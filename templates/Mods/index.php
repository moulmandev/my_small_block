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
                    <span class="posted_in"> <strong>Catégories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>
                    <span class="tagged_as"><strong>Tags:</strong> <a rel="tag" href="#">mens</a>, <a rel="tag" href="#">womens</a>.</span>
                </div>
                <div class="m-bot15"> <strong>Prix : </strong><?= $mod["price"] ?>€</div>

                <?=  $this->Html->link(
                    '<i class="fa fa-shopping-cart"></i> Ajouter au panier',
                    ['controller' => 'Shops', 'action' => 'addCart', $mod["id"]],
                    ['class' => 'btn btn-round btn-danger', 'escapeTitle' => false]
                ) ?>
            </div>
        </div>
    </div>
</div>


