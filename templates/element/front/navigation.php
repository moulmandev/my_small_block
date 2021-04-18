<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">my-small-block</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <?=  $this->Html->link(
                        'Accueil',
                        ['controller' => 'Shops', 'action' => 'index'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>
                <li class="nav-item">
                    <?=  $this->Html->link(
                        'Ajouter un mod',
                        ['controller' => 'Admins', 'action' => 'add'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>


                <?php
                    if (empty($this->Session->read("Auth.id"))) {
                        echo '<li class="nav-item">';
                        echo $this->Html->link(
                            'Se connecter',
                            ['controller' => 'Users', 'action' => 'login'],
                            ['class' => 'nav-link']
                        );
                        echo '</li>';
                    } else {
                        echo '<li class="nav-item">';
                        echo $this->Html->link(
                            'Se déconnecter',
                            ['controller' => 'Users', 'action' => 'logout'],
                            ['class' => 'nav-link']
                        );
                        echo '</li>';

                        echo '<li class="nav-item">';
                        echo $this->Html->link(
                            'Administration',
                            ['controller' => 'Admins', 'action' => 'index'],
                            ['class' => 'btn btn-danger']
                        );
                        echo '</li>';
                    }
                ?>

                <li class="nav-item">
                    <?php
                    $cart = $this->Session->read("cart");

                    echo $this->Html->link(
                        '<i class="fa fa-shopping-cart"></i> Panier
                        <span class="badge badge-light">'.($cart != NULL ? count($cart) : 0).'</span>',
                        ['controller' => 'Shops', 'action' => 'cart'],
                        ['class' => 'btn btn-success ml-3', 'escapeTitle' => false]
                    ); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
