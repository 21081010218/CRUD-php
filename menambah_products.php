<?php 
    include ('koneksi.php');

    $status = '';

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
        $country = $_POST['country'];
        $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
        $creditLimit = $_POST['creditLimit'];
        //query SQL
        $query = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
        VALUES('$customerNumber', '$customerName', '$contactLastName', '$contactFirstName', '$phone', '$addressLine1', '$addressLine2', '$city', '$state', '$postalCode', '$country', '$salesRepEmployeeNumber', '$creditLimit')"; 
  
        //eksekusi query
        $result = mysqli_query(connection(),$query);
        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>customer</title>
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
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "tambah_customers.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
                          }
                        ?>
                
                      <h2 style="margin: 30px 0 30px 0;">Form Customer</h2>
                      <form action="tambah_customers.php" method="POST">
                      <div class="form-group">
                        <label>customerNumber</label>
                        <input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" required="required">
                      </div>
                      <div class="form-group">
                        <label>customerName</label>
                        <input type="text" class="form-control" placeholder="customerName" name="customerName" required="required">
                      </div>
                      <div class="form-group">
                        <label>contactLastName</label>
                        <input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" required="required">
                      </div>
                      <div class="form-group">
                        <label>contactFirstName</label>
                        <input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" required="required">
                      </div>
                      <div class="form-group">
                        <label>phone</label>
                        <input type="text" class="form-control" placeholder="phone" name="phone" require="require">
                      <div class="form-group">
                        <label>addressLine1</label>
                        <input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" required="required">
                      </div>
                      <div class="form-group">
                        <label>addressLine2</label>
                        <input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" required="required">
                      </div>
                      <div class="form-group">
                        <label>cty</label>
                        <input type="text" class="form-control" placeholder="city" name="city" required="required">
                      </div>
                      <div class="form-group">
                        <label>state</label>
                        <input type="text" class="form-control" placeholder="state" name="state" required="required">
                      </div>
                      <div class="form-group">
                        <label>postalCode</label>
                        <input type="text" class="form-control" placeholder="postalCode" name="postalCode" required="required">
                      </div>
                      <div class="form-group">
                        <label>country</label>
                        <input type="text" class="form-control" placeholder="country" name="country" required="required">
                      </div>
                      <div class="form-group">
                        <label>salesRepEmployeeNumbe</label>
                        <input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" required="required">
                      </div>
                      <div class="form-group">
                        <label>creditLimit</label>
                        <input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" required="required">
                      </div>

                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </main>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>