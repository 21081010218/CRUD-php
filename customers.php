<?php
    include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>EMPLOYEES</title>
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
                    <td colspan="6">
                        <table border="1" align="center" >
                            <thead>
                                <tr bgcolor="tan" >
                                    <th>customerNumber</th>
                                    <th>customerName</th>
                                    <th>contactLastName</th>
                                    <th>contactFirstName</th>
                                    <th>phone</th>
                                    <th>addressLine1</th>
                                    <th>addressLine2</th>
                                    <th>city</th>
                                    <th>state</th>
                                    <th>postalCode</th>
                                    <th>country</th>
                                    <th>salesRepEmployeeNumber</th>
                                    <th>creditLimit</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM customers";
                                $result = mysqli_query(connection(),$query);
                                ?>

                                <?php 
                                    while($data = mysqli_fetch_array($result)): 
                                ?>
                                    <tr>
                                            <td>
                                                <?php 
                                                    echo $data['customerNumber'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['customerName'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['contactLastName'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['contactFirstName'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $data['phone'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['addressLine1'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['addressLine2'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['city'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['state'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['postalCode'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['country'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['salesRepEmployeeNumber'];  
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php 
                                                    echo $data['creditLimit'];  
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo "update_customers.php?customerNumber=".$data['customerNumber']; ?>" > Update</a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo "hapus_customers.php?customerNumber=".$data['customerNumber']; ?>"> Delete</a>
                                            </td>
                                    </tr>
                                    
                                <?php endwhile ?>
                            </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 