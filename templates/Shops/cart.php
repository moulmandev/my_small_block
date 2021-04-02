<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">PANIER</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col">Produit</th>
                        <th scope="col">Disponible</th>
                        <th scope="col" class="text-right">Prix</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $cart = $this->Session->read("cart");
                        if ($cart != NULL) {
                            foreach ($cart as $k => $v) {
                                echo "<tr>";
                                    echo '<td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>';
                                    echo '<td>Product Name Dada</td>';
                                    echo '<td>En stock</td>';
                                    echo '<td class="text-right">124,90 €</td>';
                                    echo '<td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>';
                                echo '</tr>';
                            }
                        }
                    ?>


                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><strong>346,90 €</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
