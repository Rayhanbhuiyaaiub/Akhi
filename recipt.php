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
    <table class="redTable">
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Price</td>
                <td>Quality Type</td>
                <td>Quantity</td>
                <td>Total Price</td>
              
                <tbody>
                <?php 
       $query = "SELECT * FROM `product` ";
       $result = mysqli_query($conn,$query);
       while($row=mysqli_fetch_assoc($result))
       {
        ?>


          <tr>
              <td><?php echo $row['productName'];?></td>
              <td><?php echo $row['productPrice'];?></td>
              <td><?php echo $row['productQualityType'];?></td>
              <td><input oninput="calculateTotal(<?php echo "'Q_". $row['productId']."',". $row['productPrice'] ; ?>)" type="number" name="<?php echo "Q_". $row['productId'];?>" id="<?php echo "Q_". $row['productId'];?>"></td>
              <td><label  id="<?php echo "T_". $row['productId'];?>" name="<?php echo "T_". $row['productId'];?>">0</label></td>
              
              
          </tr>
       
       <?php
       
        }
       
       ?>
        
       <tr>
           <td colspan="3"></td>
           <td>Total quantity</td>
           <td>Total Price</td>

       </tr>
                </tbody>
            </tr>
        </thead>
    </table>
    </form>
        <script>
            function calculateTotal(quantityId,price)
            {
                var quantityField = document.getElementById(quantityId);
                var t_name=quantityId.substring(2);
                t_name="T_"+t_name;
                var totalField= document.getElementById(t_name);
                var totalPrice=parseInt(quantityField.value)*parseInt(price);
                totalField.innerHTML = totalPrice;
               

            }
        </script>
</body>
</html>