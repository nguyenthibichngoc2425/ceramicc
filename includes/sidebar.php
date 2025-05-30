<style>
  .box.box-solid {
    background: linear-gradient(to bottom right, #ffffff, #f9f9f9);
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
    padding: 20px;
    margin-bottom: 25px;
  }

  .box-header.with-border {
    border-bottom: 1px solid #ddd;
    margin-bottom: 15px;
  }

  .box-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
  }

  .box-body ul#trending {
    list-style: none;
    padding-left: 0;
    margin: 0;
    counter-reset: trending-counter;
  }

  .box-body ul#trending li {
    counter-increment: trending-counter;
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    position: relative;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
  }

  .box-body ul#trending li::before {
    content: counter(trending-counter) ".";
    font-weight: bold;
    color: #888;
    margin-right: 12px;
    width: 25px;
    text-align: right;
  }

  .box-body ul#trending li:last-child {
    border-bottom: none;
  }

  .box-body ul#trending li a {
    color: #333;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
  }

  .box-body ul#trending li a:hover {
    color: #007bff;
    text-decoration: underline;
  }

  .box-body ul#trending li:hover {
    background-color: #f1f7ff;
    border-radius: 6px;
  }
</style>

<div class="row">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-fire text-red"></i> <b>Most Viewed Today</b></h3>
    </div>
    <div class="box-body">
      <ul id="trending">
        <?php
          $now = date('Y-m-d');
          $conn = $pdo->open();

          $stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
          $stmt->execute(['now'=>$now]);
          foreach($stmt as $row){
            echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
          }

          $pdo->close();
        ?>
      </ul>
    </div>
  </div>
</div>
