<style>
  .product-box {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease-in-out;
    margin-bottom: 30px;
    background-color: #fff;
    overflow: hidden;
  }

  .product-box:hover {
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transform: translateY(-5px);
  }

  .product-box img {
    border-radius: 5px;
    object-fit: cover;
    height: 230px;
    width: 100%;
  }

  .prod-body {
    padding: 10px 15px;
    text-align: center;
    min-height: 120px;
  }

  .prod-body h5 {
    font-weight: 600;
    margin-top: 10px;
    font-size: 16px;
  }

  .prod-body a {
    color: #333;
    text-decoration: none;
  }

  .prod-body a:hover {
    color: #337ab7;
  }

  .box-footer {
    padding: 10px 15px;
    background-color: #f9f9f9;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    border-top: 1px solid #eee;
  }

  .page-header {
    border-bottom: 2px solid #ddd;
    margin-bottom: 30px;
    font-weight: bold;
  }
</style>

<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header"><?php echo $cat['name']; ?></h1>
		       		<?php
  $conn = $pdo->open();

  try {
    $inc = 3;  
    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
    $stmt->execute(['catid' => $catid]);
    foreach ($stmt as $row) {
      $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
      $inc = ($inc == 3) ? 1 : $inc + 1;
      if($inc == 1) echo "<div class='row'>";

      echo "
        <div class='col-sm-4'>
          <div class='product-box'>
            <img src='".$image."' class='img-responsive'>
            <div class='prod-body'>
              <h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
            </div>
            <div class='box-footer'>
              &#36; ".number_format($row['price'], 2)."
            </div>
          </div>
        </div>
      ";

      if($inc == 3) echo "</div>";
    }

    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
    if($inc == 2) echo "<div class='col-sm-4'></div></div>";
  } catch(PDOException $e) {
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
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>