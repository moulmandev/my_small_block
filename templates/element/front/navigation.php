<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <?=  $this->Html->link(
                        'Home',
                        ['controller' => 'Shops', 'action' => 'index'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <?=  $this->Html->link(
                        '<i class="fa fa-shopping-cart"></i> Panier
                        <span class="badge badge-light">3</span>',
                        ['controller' => 'Shops', 'action' => 'cart'],
                        ['class' => 'btn btn-success btn-sm ml-3', 'escapeTitle' => false]
                    ) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
