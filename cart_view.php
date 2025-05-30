<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
	<style>
  .cart-container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    padding: 20px;
    margin-bottom: 30px;
  }

  .page-header {
    font-weight: bold;
    border-bottom: 2px solid #ddd;
    margin-bottom: 30px;
  }

  table.table {
    background-color: #fff;
  }

  table.table th, table.table td {
    vertical-align: middle !important;
    text-align: center;
  }

  .quantity-controls {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .quantity-controls button {
    width: 30px;
    height: 30px;
    font-size: 16px;
  }

  #paypal-button {
    margin-top: 20px;
    text-align: center;
  }

  .login-reminder {
    background-color: #f8f8f8;
    padding: 15px;
    border-left: 5px solid #337ab7;
    margin-top: 20px;
    border-radius: 5px;
  }

  .login-reminder a {
    font-weight: bold;
    color: #337ab7;
  }

  .cart-image {
    max-width: 60px;
    border-radius: 5px;
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
  <h1 class="page-header">🛒 YOUR CART</h1>
  <div class="cart-container">
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr class="info">
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Price</th>
            <th width="20%">Quantity</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <!-- Cart items will be loaded here -->
        </tbody>
      </table>
    </div>
  </div>

  <?php
    if(isset($_SESSION['user'])){
      echo "<div id='paypal-button' class='text-center'></div>";
    }
    else{
      echo "
        <div class='login-reminder'>
          <h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
        </div>
      ";
    }
  ?>
</div>

	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>
<!-- Paypal Express -->
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

	client: {
        sandbox:    'AEfYxns5l1tnCle5stC4-vpS0mg4ABwESySCOSq9CsW7wff3Ehr5LeGA',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
    	color: 'gold',
    	size: 'small'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: total, 
                        	currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
			window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');
</script>
</body>
</html>