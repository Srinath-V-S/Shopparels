<?php
require 'Sysfiles/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/header.php';
include 'includes/leftsidebar.php';

$sql = "SELECT * FROM products WHERE featured=1";
$featured = $db->query($sql);
?>
    <!-- main content -->
            <div class="col-md-8">

                <div class ="row">
                    <h2 class="text-center">Featured Products</h2>
                        <?php while ($product = mysqli_fetch_assoc($featured)): ?>
                        <div class="col-md-3">
                            <h4><?=$product['title'];?></h4>
                            <img id = "clothes" src="<?=$product['image'];?>" alt="<?=$product['title'];?>"/>
                            <p class="list-price text-danger">List Price : <s><?=$product['list_price'];?></s></p>
                            <p class="price">Our price : <b><?=$product['price'];?></b></p>
                            <button type="button" class="btn-btn-sm btn-success" onclick="detailsmodal(<?=$product['id']; ?>);">Details</button>
                        </div>
                        <?php endwhile; ?>


                </div>


            </div>










<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>



<?php
include 'includes/rightsidebar.php';
include 'includes/footer.php';
?>