<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <?php //TODO: Alt ?>
        <a href="#"><img class="card-img-top" src="<?= $data["picture"] ?>" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#"><?= $data["name"] ?></a>
            </h4>
            <h5><?= $data["price"] ?>€</h5>
            <p class="card-text"><?= $data["description"] ?></p>
        </div>

        <?php //TODO: Système de notation ?>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>
