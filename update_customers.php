<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";
         
          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerNumber= $_POST['customerNumber'];
        $customerName = $_POST['customerName'];
        $contactLastName = $_POST['contactLastName'];
        $contactFirstName = $_POST['contactFirstName'];
        $phone = $_POST['phone'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postalCode = $_POST['postalCode'];
        $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
        $creditLimit = $_POST['creditLimit'];
    //query SQL
    $sql = "UPDATE customers SET  customerName='$customerName', contactLastName='$contactLastName',
    contactFirstName='$contactFirstName', phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', 
    city='$city', state='$state', postalCode='$postalCode', salesRepEmployeeNumber='$salesRepEmployeeNumber',
    creditLimit ='$creditLimit' WHERE customerNumber='$customerNumber'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: customer.php?status='.$status);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>update customer</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA CUSTOMER</h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                    <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "customer.php"; ?>"><b>data customer</b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "product.php"; ?>"><b>data product</b></a>
                        </center>    
                    </td>
                </tr>

                <tr class="tengah">
                    <td colspan="1">
                      
                    </td>
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "tambah_customers.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                        <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
                        <form action="update_customers.php" method="POST">
                        <?php while($data = mysqli_fetch_array($result)): ?>
                          <div class="form-group">
                            <label>customerNumber</label>
                            <input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
                          </div>
                          <div class="form-group">
                            <label>customerName</label>
                            <input type="text" class="form-control" placeholder="customerName" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>contactLastName</label>
                            <input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required" >
                          </div>
                          <div class="form-group">
                            <label>contactFirstName</label>
                            <input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>phone</label>
                            <input type="text" class="form-control" placeholder="phone" name="phone" value="<?php echo $data['phone'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>addressLine1</label>
                            <input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" value="<?php echo $data['addressLine1'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>addressLine2</label>
                            <input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" value="<?php echo $data['addressLine2'];  ?>" required="required" >
                          </div>
                          <div class="form-group">
                            <label>city</label>
                            <input type="text" class="form-control" placeholder="city" name="city" value="<?php echo $data['city'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>state</label>
                            <input type="text" class="form-control" placeholder="state" name="state" value="<?php echo $data['state'];  ?>" required="required" >
                          </div>
                          <div class="form-group">
                            <label>postalCode</label>
                            <input type="text" class="form-control" placeholder="postalCode" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>salesRepEmployeeNumber</label>
                            <input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>creditLimit</label>
                            <input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" value="<?php echo $data['creditLimit'];  ?>" required="required">
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                          <?php endwhile; ?>
                        </form>

                      </main>
                    </div>
                  </div>
                  </main>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>