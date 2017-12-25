<!-- Modal -->

<?php
require_once '../Sysfiles/init.php';
$id = $_POST['id']; // using _Post get the id from form data as inspected
$id = (int)$id; // make sure it is an integer

$sql = "SELECT * FROM products WHERE id ='$id'"; // sql to retrieve prod details wrt to id
$result = $db->query($sql); // exec sql
$product = mysqli_fetch_assoc($result); // get the prod details as assoc array
$brand_id = $product['brand'];
$sql = "SELECT brand FROM brand WHERE id ='$brand_id'";
$brand_q = $db->query("$sql");
$brand = mysqli_fetch_assoc($brand_q);
$sizeString = $product['sizes'];
$sizeArray = explode(',',$sizeString);


?>

<?php ob_start(); ?> <!-- starts an output buffer and reads all the divs below -->
<div class="modal fade details-1" id = "details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button class="close" type="button" onclick="closemodal()" aria-label="Close"> <!-- x to close modal -->
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center"><?=$product['title'];?></h4>

            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="center-block">
                                <img src="<?=$product['image'];?>" alt="<?=$product['title'];?>" class="details img-responsive "/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4>Details</h4>
                            <p> <?=$product['description'];?></p>
                            <hr>
                            <p> Price: $<?=$product['price'];?></p>
                            <p> Brand:<?=$brand['brand'];?></p>
                        </div>
                        <form action="addtocart.php" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="num">Quantity</label>
                                    <input type="text" class="form-control" name="num" id="num">
                                </div>



                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for = "size">Size</label>
                                        <select name="size" class="form-control">
                                            <?php foreach ($sizeArray as $string){
                                               $s_arr = explode(':',$string);
                                               $size = $s_arr[0];
                                               $quantity = $s_arr[1];
                                                echo '<option value='.$size.'>'.$size.'('.$quantity.'Available)</option>';

                                            }?>


                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-default" type="button" onclick="closemodal()">Close</button>  <!-- close button to close modal -->
                <button class="btn btn-warning" type="submit">Add to cart</button>
            </div>
        </div>
    </div>
</div>

<script>
    function closemodal() {
        jQuery("#details-modal").modal('hide');
        setTimeout(function () {
            jQuery("#details-modal").remove();
        },500);
        
    }
</script>
<?php echo ob_get_clean() ?> <!-- frees up the output buffer -->
