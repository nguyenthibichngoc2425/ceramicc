<style>
 /* Nền toàn trang với gradient mượt hơn và chiều sâu */
body {
  background: linear-gradient(135deg, #f8f9fa, #e0ecf8, #d1e3fc);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  min-height: 100vh;
  margin: 0;
  padding: 20px 0;
}

/* Tiêu đề trang - tăng font size, thêm shadow nhẹ */
.content-header h1 {
  font-size: 36px;
  font-weight: 900;
  color: #1f2d3d;
  margin-bottom: 15px;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
}

/* Breadcrumb */
.breadcrumb {
  background: transparent;
  margin-bottom: 25px;
  font-weight: 600;
  font-size: 14px;
}
.breadcrumb li a {
  color: #007bff;
  transition: color 0.3s ease;
}
.breadcrumb li a:hover {
  color: #0056b3;
}

/* Hộp chứa bảng - bóng nhẹ hơn, bo góc tròn hơn */
.box {
  background: white;
  border-radius: 25px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
  border: none;
  padding: 30px 25px;
  max-width: 1100px;
  margin: 0 auto;
}

/* Header của box */
.box-header.with-border {
  border-bottom: 1px solid #dee2e6;
  margin-bottom: 25px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 10px;
}

/* Bảng - bo góc cho toàn bộ bảng, bóng nhẹ khi hover từng hàng */
table.table-bordered {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 15px;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

table.table-bordered th {
  background: linear-gradient(90deg,rgb(179, 190, 216),rgb(33, 75, 120));
  color: white;
  text-align: center;
  font-weight: 700;
  padding: 15px 10px;
  user-select: none;
}

table.table-bordered td {
  text-align: center;
  vertical-align: middle;
  background-color: #fefefe;
  color: #333;
  padding: 14px 8px;
  font-weight: 600;
  border-top: 1px solid #e3e3e3;
  transition: background-color 0.3s ease;
  cursor: default;
}

table.table-bordered tbody tr:hover td {
  background-color: #e7f1ff;
  color:rgb(223, 226, 228);
  transition: background-color 0.3s ease, color 0.3s ease;
}

/* Nút in & nút xem chi tiết - bo tròn, bóng nhẹ, hover nhấn mạnh */
.btn-sm {
  border-radius: 25px;
  padding: 8px 18px;
  font-weight: 600;
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  letter-spacing: 0.5px;
}

.btn-success {
  background: linear-gradient(45deg, #56ab2f, #a8e063);
  border: none;
  color: white;
  box-shadow: 0 5px 15px rgba(88, 196, 57, 0.6);
}
.btn-success:hover {
  box-shadow: 0 8px 25px rgba(88, 196, 57, 0.9);
  transform: scale(1.05);
}

.btn-info {
  background: linear-gradient(45deg,rgb(19, 23, 98), #5b86e5);
  border: none;
  color: white;
  box-shadow: 0 5px 15px rgba(2, 2, 2, 0.6);
}
.btn-info:hover {
  box-shadow: 0 8px 25px rgba(255, 255, 255, 0.9);
  transform: scale(1.05);
}

/* Date range input */
.input-group .form-control {
  border-radius: 25px;
  border: 1px solid #ced4da;
  padding-left: 18px;
  font-weight: 600;
  color: #444;
  transition: border-color 0.3s ease;
}
.input-group .form-control:focus {
  border-color:rgb(236, 240, 244);
  outline: none;
  box-shadow: 0 0 6px rgba(71, 74, 77, 0.5);
}

/* Định dạng nút trong phần pull-right */
.pull-right .btn {
  margin-left: 12px;
}

</style>


<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales History
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="sales_print.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Buyer </th>
                  <th>Transaction</th>
                  <th>Amount</th>
                  <th>Full Details</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE details.sales_id=:id");
                        $stmt->execute(['id'=>$row['salesid']]);
                        $total = 0;
                        foreach($stmt as $details){
                          $subtotal = $details['price']*$details['quantity'];
                          $total += $subtotal;
                        }
                        echo "
                          <tr>
                            <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['sales_date']))."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>".$row['pay_id']."</td>
                            <td>&#36; ".number_format($total, 2)."</td>
                            <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
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
  
    <?php include '../includes/profile_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
</body>
</html>
