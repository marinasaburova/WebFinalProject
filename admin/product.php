<!-- Displays details for a specific product -->

<?php
include 'view/header.php';
include 'view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
    <main>
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-5">
                <div class="card mb-4 sticky-top" style="top: 72px; z-index:1018;">
                    <img class=" card-img-top" src="media/purse.jpg" alt="Image of product" />

                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <p class="card-text">Price: <?php echo $product['price'] ?></p>
                        <a href="#" class="btn btn-primary">Add to cart</a>
                        <p class="card-text pt-3">Description... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque nec nam aliquam sem. Vitae justo eget magna fermentum iaculis. Sed adipiscing diam donec adipiscing. Euismod in pellentesque massa placerat duis ultricies lacus sed. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque. Viverra nibh cras pulvinar mattis nunc sed blandit libero volutpat. Purus semper eget duis at tellus at urna. Morbi quis commodo odio aenean sed adipiscing. Eget mi proin sed libero. Risus sed vulputate odio ut enim blandit volutpat maecenas volutpat. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla pellentesque. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Amet cursus sit amet dictum sit amet justo donec. Porttitor massa id neque aliquam. Enim ut tellus elementum sagittis vitae et. Enim eu turpis egestas pretium aenean pharetra magna ac placerat. Amet facilisis magna etiam tempor orci eu lobortis elementum.

                            Quam id leo in vitae turpis. Amet risus nullam eget felis eget. Ut placerat orci nulla pellentesque dignissim enim sit. Blandit turpis cursus in hac. Gravida cum sociis natoque penatibus et. Convallis a cras semper auctor neque vitae tempus quam. Congue nisi vitae suscipit tellus mauris a diam. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Integer quis auctor elit sed vulputate mi sit amet. Feugiat pretium nibh ipsum consequat nisl vel. Semper quis lectus nulla at.

                            Imperdiet dui accumsan sit amet nulla facilisi. Egestas congue quisque egestas diam. Orci nulla pellentesque dignissim enim sit amet venenatis. Auctor neque vitae tempus quam pellentesque. Nulla facilisi morbi tempus iaculis urna. Ultricies integer quis auctor elit sed. Mauris commodo quis imperdiet massa tincidunt nunc. Felis eget nunc lobortis mattis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Neque sodales ut etiam sit amet nisl purus in mollis. Felis eget velit aliquet sagittis id consectetur purus ut. Faucibus nisl tincidunt eget nullam non nisi est sit. Sed ullamcorper morbi tincidunt ornare massa eget egestas. In metus vulputate eu scelerisque felis imperdiet. Eros donec ac odio tempor orci. Dolor morbi non arcu risus quis varius quam quisque. Pellentesque dignissim enim sit amet venenatis urna cursus eget. Semper risus in hendrerit gravida rutrum quisque.

                            Id cursus metus aliquam eleifend mi in nulla posuere. Dignissim enim sit amet venenatis urna cursus. Id semper risus in hendrerit gravida rutrum quisque non. Volutpat ac tincidunt vitae semper quis. Faucibus turpis in eu mi. Nulla porttitor massa id neque aliquam vestibulum morbi blandit. Id consectetur purus ut faucibus pulvinar elementum. Posuere urna nec tincidunt praesent semper feugiat nibh sed. Pretium quam vulputate dignissim suspendisse in est ante. Ultrices neque ornare aenean euismod elementum nisi quis eleifend. Felis eget nunc lobortis mattis aliquam. Turpis egestas maecenas pharetra convallis posuere morbi leo urna molestie. Quisque non tellus orci ac auctor augue mauris. Ipsum suspendisse ultrices gravida dictum fusce. Amet mauris commodo quis imperdiet massa tincidunt.

                            Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non. Mauris ultrices eros in cursus turpis. Viverra accumsan in nisl nisi. Nullam vehicula ipsum a arcu cursus. Sit amet venenatis urna cursus eget nunc scelerisque viverra mauris. Turpis egestas pretium aenean pharetra magna ac placerat vestibulum. Vel turpis nunc eget lorem dolor sed viverra ipsum nunc. Penatibus et magnis dis parturient montes. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Aliquam nulla facilisi cras fermentum odio eu feugiat. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Amet consectetur adipiscing elit ut aliquam. In vitae turpis massa sed elementum tempus egestas sed sed. Quis varius quam quisque id diam. Dui id ornare arcu odio ut sem nulla pharetra diam. Pellentesque habitant morbi tristique senectus et. Nibh tortor id aliquet lectus proin. Egestas congue quisque egestas diam in arcu cursus euismod quis. Libero justo laoreet sit amet cursus.</p>


                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </main>
    <!-- /.main -->
</div>
<!-- /.middle container -->

<?php
include 'view/footer.php';
?>