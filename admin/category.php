<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
  body {
    background: linear-gradient(to right, #e3f2fd, #fff); /* Xanh nhạt sang trắng */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .content-wrapper {
    background: linear-gradient(to bottom right, #ffffff, #e1f5fe);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    min-height: 80vh;
  }
  table.custom-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  }

  table.custom-table thead {
    background-color: #f8f9fa;
  }

  table.custom-table th, table.custom-table td {
    padding: 14px 18px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
  }

  table.custom-table th {
    font-weight: 600;
    color: #343a40;
  }

  table.custom-table tbody tr:hover {
    background-color: #e9f5ff;
  }

  .custom-btn {
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    font-size: 13px;
    transition: 0.3s ease;
    font-weight: 500;
  }

  .btn-add {
    background-color:rgb(94, 113, 134);
    color: white;
  }

  .btn-edit {
    background-color:rgb(66, 94, 150);
    color: white;
  }

  .btn-delete {
    background-color:rgb(13, 16, 78);
    color: white;
  }

  .custom-btn:hover {
    opacity: 0.9;
  }

</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Product Categories</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Products</li>
        <li class="active">Category</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-add btn-sm"><i class="fa fa-plus"></i> Add New Category</a>
            </div>
            <div class="box-body">
              <table class="custom-table">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th style="width: 180px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();
                    try {
                      $stmt = $conn->prepare("SELECT * FROM category");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
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


  <?php include 'includes/category_modal.php'; ?>

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
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id);
      $('#edit_name').val(response.name);
      $('.catname').html(response.name);
    }
  });
}
</script>
</body>
</html>
