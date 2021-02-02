<?php
include "database/data_access.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/table.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script>

   
        $(document).ready(function () {
        $('select').selectize({
          sortField: 'text'
        });
        });
    </script>
</head>
<body>
    <form action="">
    <label>Product:</label>
    <select name="productList" id="" style=width:40%>
     <option value="" >Select a product</option>
     <?php 
       $query = "SELECT * FROM `product` ";
       $result = mysqli_query($conn,$query);
       while($row=mysqli_fetch_assoc($result))
       {
           echo "<option value=\"".$row['productId']."\">".$row['productName']."</option>";
       }
        
        ?>
    </select>
    <table id="receiptTable" class="redTable">
    <col width="25%" />
        <thead>
            <tr>
                <td >Product Name</td>
                <td>Price</td>
                <td>Quality Type</td>
                <td>Quantity</td>
                <td>Total Price</td>
            </tr>
                <tbody>

                <?php 
       $query = "SELECT * FROM `product` ";
       $result = mysqli_query($conn,$query);
       while($row=mysqli_fetch_assoc($result))
       {
        ?>


          <tr>
              <td ><?php echo $row['productName'];?></td>
              <td><?php echo $row['productPrice'];?></td>
              <td><?php echo $row['productQualityType'];?></td>
              <td colspan="1"><input oninput="calculateTotal(<?php echo "'Q_". $row['productId']."',". $row['productPrice'] ; ?>)" type="number" name="<?php echo "Q_". $row['productId'];?>" id="<?php echo "Q_". $row['productId'];?>"></td>
              <td colspan="1"><label id="<?php echo "T_". $row['productId'];?>" name="<?php echo "T_". $row['productId'];?>">0</label></td>
              
              
          </tr>
       
       <?php
       
        }
       
       ?>
        
            <tr>
                <td colspan="3"></td>
                <td id="totalQuan">Total quantity</td>
                <td id="totalPrice">Total Price</td>

            </tr>


            <tr>
            
            <td colspan="3"></td>
            <td>Discount: </td>
            <td> <input oninput="updateSubTotal()" type="number" name="disCount" id="disCount" value=0></td>
            </tr>

            <tr>
            <td colspan="3"></td>
            <td>SubTotal: </td>
            <td> <label for="" id="subTotal">0</label></td>
            </tr>


            </tbody>
            
        </thead>

        <button type="submit">Generate PDF</button>

    </table>
    </form>
        <script src="script/receiptScript.js"></script>
</body>
</html>