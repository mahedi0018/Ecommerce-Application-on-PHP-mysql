<?php
include "header.php";
include_once('../db_connect.php') ;
?>
	
	
	<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />

	
		<?php
            include "left_menu.php";
        ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
                        
                        $page=1;
                        
                        if(isset($_GET['page'])) $page=$_GET['page'];
                        
                        $inc=1;
                        $start=($page-1)*$inc;
                        
                        $sql = "SELECT * FROM product LIMIT $start,$inc";
                        $result = $conn->query($sql);
                        while($row=mysqli_fetch_array($result)){
                        ?> 
                        
                        
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="product_image" src="../admin/product_image/<?php echo $row["product_image"];?>" alt="" />
										<h2><?php echo $row["product_price"]; ?></h2>
										<p><?php echo $row["product_name"]; ?></p>
										<a href="product_details.php?id=<?php echo $row["id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $row["product_price"]; ?></h2>
											<p><?php echo $row["product_name"]; ?></p>
											<a href="product_details.php?id=<?php echo $row["id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
                        <?php      
                            
                            
                        }
                        ?>
						
						
						
						</div>
						
						<ul class="pagination">
						    <?php
                            $sql = "SELECT * FROM product";
                            $result = $conn->query($sql);
                            $no_of_row=$result->num_rows;
                            $no_of_page=0;
                            if($no_of_row%$inc!=0) {
                                $no_of_page=($no_of_row/$inc)+1;
                            }
                            else {
                                $no_of_page=($no_of_row/$inc); 
                            }
                            ?>
                            <?php if($page-3>=1) { ?>
							    <li><a href="<?php echo '?page='.($page-3); ?>">&laquo;</a></li>
							<?php } elseif($page-1>=1) { ?>
                            <li><a href="<?php echo '?page='.($page-1); ?>">&laquo;</a></li>
                            <?php } ?>
                            <?php
                            for($i=$page; $i<=$no_of_page; $i++) {
                                if($i==($page+3)) break;
                            ?>
							<li><a href="<?php echo '?page='.$i; ?>"><?php echo $i ?></a></li>
							<?php } ?>
							<?php if($page+3<=$no_of_page) { ?>
							<li><a href="<?php echo '?page='.($page+3); ?>">&raquo;</a></li>
							<?php } elseif($page+1<=$no_of_page) { ?>
							<li><a href="<?php echo '?page='.$no_of_page; ?>">&raquo;</a></li>
							<?php } ?>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php
include "footer.php";
?>