<link rel="stylesheet" href="pro.css">
<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
    <!-- Cột hình ảnh sản phẩm -->
    <div class="col-sm-6">
        <img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" 
             width="100%" 
             class="zoom img-thumbnail" 
             data-magnify-src="images/large-<?php echo $product['photo']; ?>">
    </div>

    <!-- Cột thông tin sản phẩm + form thêm vào giỏ -->
    <div class="col-sm-6">
        <h1 class="page-header"><?php echo $product['prodname']; ?></h1>
        <h3 class="text-danger"><b>$<?php echo number_format($product['price'], 2); ?></b></h3>
        <p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>
        
        <p><b>Description:</b></p>
        <p><?php echo $product['description']; ?></p>

        <!-- Form Thêm vào giỏ hàng -->
        <form class="form-inline mt-4" id="productForm">
            <div class="form-group d-flex align-items-center flex-wrap gap-2">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" id="minus" class="btn btn-outline-secondary btn-lg"><i class="fa fa-minus"></i></button>
                    </span>
                    <input type="text" name="quantity" id="quantity" class="form-control input-lg text-center" value="1">
                    <span class="input-group-btn">
                        <button type="button" id="add" class="btn btn-outline-secondary btn-lg"><i class="fa fa-plus"></i></button>
                    </span>
                </div>
                <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
                <button type="submit" class="btn btn-primary btn-lg">Add
                </button>
            </div>
        </form>
    </div>
</div>
					<h3 class="page-header">Related Products</h3>
					<div class="related-products">
					<?php
						$stmt = $conn->prepare("SELECT *, products.name AS prodname, products.id AS prodid FROM products WHERE category_id = :catid AND slug != :slug ORDER BY RAND() LIMIT 4");
						$stmt->execute(['catid'=>$product['category_id'], 'slug'=>$slug]);

						foreach($stmt as $row){
							$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
							echo "
							<div class='product-card'>
								<img src='".$image."' alt='".$row['prodname']."' class='product-image'>
								<div class='product-info'>
									<h4 class='product-name'><a href='product.php?product=".$row['slug']."'>".$row['prodname']."</a></h4>
									<p class='product-price'>&#36; ".number_format($row['price'], 4)."</p>
								</div>
							</div>
							";
						}
					?>
					</div>


	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>