<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>CeramC</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- AdminLTE -->
  	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Magnify -->
    <link rel="stylesheet" href="magnify/magnify.min.css">
  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">

  	<!-- Paypal Express -->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Custom CSS -->
    <style type="text/css">
      body {
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #f7f8fa;
      }

      .navbar {
        border-radius: 0;
      }

      .product-detail-wrapper {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-top: 20px;
      }

      .product-title {
        font-size: 28px;
        font-weight: 600;
        color: #333;
      }

      .product-price {
        font-size: 24px;
        font-weight: bold;
        color: #e74c3c;
      }

      .product-main-image {
        border-radius: 10px;
        border: 1px solid #ddd;
        transition: transform 0.3s ease;
      }

      .product-main-image:hover {
        transform: scale(1.02);
      }

      .product-info-card {
        background-color: #fefefe;
        border-radius: 10px;
        padding: 20px;
      }

      .quantity-group {
        width: 130px;
        display: flex;
        align-items: center;
      }

      .quantity-group input {
        border: 1px solid #ccc;
      }

      .product-card {
        background: #fff;
        border-radius: 10px;
        padding: 10px;
        margin: 10px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      }

      .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      }

      .product-image {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
      }

      .product-name {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin: 5px 0;
      }

      .page-header {
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
        margin-top: 40px;
        font-weight: 600;
        font-size: 22px;
      }

      .btn-success {
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: bold;
      }

      /* Responsive fix */
      @media (max-width: 767px) {
        .product-main-image {
          max-height: 250px;
          object-fit: cover;
        }

        .product-title {
          font-size: 22px;
        }
      }
    </style>
</head>
