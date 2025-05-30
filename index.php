<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
	<style>
  body {
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    font-family: 'Segoe UI', sans-serif;
  }

  .carousel-inner img {
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  }

  .carousel-control span {
    font-size: 40px;
    color: #333;
    text-shadow: none;
  }

  h2 {
    margin-top: 30px;
    font-weight: bold;
    text-align: center;
    background: linear-gradient(to right,rgb(168, 180, 204),rgb(4, 14, 32));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .box.box-solid {
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    background: #fff;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
  }

  .box.box-solid:hover {
    transform: translateY(-5px);
  }

  .prod-body img.thumbnail {
    border-radius: 8px;
    object-fit: cover;
  }

  .prod-body h5 {
    text-align: center;
    margin-top: 10px;
    font-size: 16px;
  }

  .box-footer {
    background: #f1f1f1;
    border-top: none;
    text-align: center;
    font-weight: bold;
    color: #444;
    border-radius: 0 0 10px 10px;
    padding: 10px;
  }

  .alert {
    border-radius: 6px;
    text-align: center;
  }
  /* Nền tổng thể nhẹ nhàng */
.content-wrapper {
    background: linear-gradient(to bottom right, #f8f9fc, #e3f2fd);
    padding: 30px 10px;
}

/* Card sản phẩm */
.box.box-solid {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
    border: none;
    background-color: #ffffff;
}

/* Khi hover card */
.box.box-solid:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

/* Ảnh sản phẩm */
.prod-body img.thumbnail {
    border-radius: 12px;
    transition: transform 0.3s ease;
}

/* Hover ảnh */
.prod-body img.thumbnail:hover {
    transform: scale(1.05);
}

/* Tên sản phẩm */
.prod-body h5 a {
    color:rgb(83, 97, 141);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}

.prod-body h5 a:hover {
    color: #ff6600;
}

/* Giá sản phẩm */
.box-footer {
    font-size: 1.1em;
    font-weight: bold;
    color: #333;
    background-color: #f0f0f0;
    border-top: 1px solid #ddd;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    padding: 10px;
}
/* === About Us Section === */
.about-section {
  padding: 60px 20px;
  background-color: #f8f9fa;
  font-family: 'Segoe UI', sans-serif;
}

.about-section .container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  max-width: 1100px;
  margin: auto;
}

.about-content {
  flex: 1 1 500px;
  padding: 20px;
}

.about-content h1 {
  font-size: 2rem;
  color: #333;
  margin-bottom: 20px;
}

.about-content h1 span {
  color:rgb(23, 53, 85);
}

.about-content p {
  font-size: 1.1rem;
  line-height: 1.7;
  color: #555;
  margin-bottom: 15px;
}



.about-section {
  border-top: 1px solid #ccc;
  margin-top: 40px;
}


/* Responsive */
@media (max-width: 768px) {
  .container {
    flex-direction: column;
  }

  .about-content h1 {
    font-size: 1.4rem;
    text-align: center;
  }
.about-section {
  border-top: 1px solid #ccc;
  margin-top: 40px;
}

}

</style>

<div class="wrapper">
	

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/1.jpg" alt="First slide"style="width: 100%; height: auto;">
		                  </div>
		                  <div class="item">
		                    <img src="images/2.jpg" alt="Second slide"style="width: 100%; height: auto;">
		                  </div>
		                  <div class="item">
		                    <img src="images/3.jpg" alt="Third slide"style="width: 100%; height: auto;">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
					<section id="products">
		            <h2>Products</h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 12");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
		

	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
					</section>
			<section id="about-us">
  <div class="container">
    <div class="about-content">
      <h1>About <span>Ceramic CupShop</span></h1>
      <p>
        Welcome to <strong>Ceramic Shop</strong>, your destination for elegant, handcrafted ceramic products that blend traditional craftsmanship with modern aesthetics.
      </p>
      <p>
        Our mission is to bring warmth and authenticity into your home through carefully curated ceramic cups, bowls, plates, and decor items made by skilled artisans. We believe that every piece tells a story – from the shaping of clay to the final glaze.
      </p>
      <p>
        Whether you're searching for timeless tableware, personalized gifts, or artistic home accents, we offer products that reflect quality, beauty, and sustainability.
      </p>
    
  </div>
</section>
	      </section>

	     
	    </div>
	  </div>
  	<!-- About Us Section -->



</div> <!-- kết thúc .content-wrapper -->

  	<?php include 'includes/footer.php'; ?>
</div>
	
<?php include 'includes/scripts.php'; ?>
</body>
</html>