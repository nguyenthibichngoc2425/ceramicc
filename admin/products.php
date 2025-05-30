<?php include 'includes/session.php'; ?>
<?php
  $where = '';
  $catid = 0;
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }
?>
<?php include 'includes/header.php'; ?>
<style>
 table.custom-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

table.custom-table thead {
  background-color: #f0f2f5;
}

table.custom-table th {
  text-transform: uppercase;
  font-weight: 700;
  color: #555;
  font-size: 13px;
  padding: 12px 16px;
}

table.custom-table td {
  background: #fff;
  padding: 14px 16px;
  vertical-align: middle;
  box-shadow: 0 2px 6px rgba(0,0,0,0.04);
  border-bottom: 1px solid #eaeaea;
}

table.custom-table tr:hover td {
  background-color: #f9fcff;
}

.custom-btn {
  border: none;
  background: none;
  color: #444;
  font-size: 16px;
  padding: 4px;
  cursor: pointer;
  transition: 0.3s ease;
}

.custom-btn:hover {
  color: #007bff;
  transform: scale(1.1);
}

.table-img {
  height: 45px;
  width: 45px;
  border-radius: 6px;
  object-fit: cover;
  transition: 0.3s;
}

.table-img:hover {
  transform: scale(1.1);
}

.photo-edit-icon {
  color: #888;
  margin-left: 6px;
  font-size: 14px;
  cursor: pointer;
}

.badge-counter {
  background-color: #ff6b6b;
  color: #fff;
  font-size: 12px;
  padding: 4px 8px;
  border-radius: 12px;
}

.tooltip-inner {
  font-size: 13px;
}

</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Product List</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Products</li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a>
              <div class="pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Category: </label>
                    <select class="form-control input-sm" id="select_category">
                      <option value="0">ALL</option>
                      <?php
                        $conn = $pdo->open();
                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();
                        foreach($stmt as $crow){
                          $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                          echo "<option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>";
                        }
                        $pdo->close();
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table class="custom-table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Views Today</th>
                    <th>Tools</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();
                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM products $where");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>
                              <img src='".$image."' class='table-img'>
                              <a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'>
                                <i class='fa fa-edit photo-edit-icon'></i>
                              </a>
                            </td>
                            <td><a href='#description' data-toggle='modal' class='custom-btn btn-view desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                            <td>$ ".number_format($row['price'], 2)."</td>
                            <td>".$counter."</td>
                            <td>
                              <button class='custom-btn btn-edit edit' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='custom-btn btn-delete delete' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }
                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'includes/products_modal.php'; ?>
  <?php include 'includes/products_modal2.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php';
    }
    else{
      window.location = 'products.php?category='+val;
    }
  });

  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();
    }
  });
}

function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
</script>
</body>
</html>
