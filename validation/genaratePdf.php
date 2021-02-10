<?php

function generatePdf($productInfoArray,$discount)
{
    include ('vendor/autoload.php');
    $fileId="";
    $fileName="";
    getNextFileInformation($fileName,$fileId);
    
    $mpdf = new \Mpdf\Mpdf([
     'default_font' => 'bangla',
     'mode' => 'utf-8'
     ]);

    $tableCSS = file_get_contents('css/table.css');
    $stylesheet = file_get_contents('css/style.css');
    
    $html=getHtml($productInfoArray,$discount);
    
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($tableCSS,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html);
    $mpdf->AddPage();
    $mpdf->WriteHTML($html);
    $mpdf->Output("pdf/".$fileName,'F');
}
function getNextFileInformation(&$fileName,&$fileId)
{
    
    include "../akhiGit/database/data_access.php";
    include "validation/functions.php";
    $fileExsitCount= doesFileExist();

    if($fileExsitCount ==0)
    {
        $fileId="F100000";
        $fileName=$fileId.".pdf";
    }
    else
    {
        $query = "SELECT * FROM `filetracker` order by Id DESC limit 1";
        $result = mysqli_query($conn,$query);
    
   
        if($row=mysqli_fetch_assoc($result))
        {
            $lastFileId=$row['file_Id']; 

            $numberPart = intval(substr($lastFileId,1,6));
            $numberPart++;      
           $fileId='F'.$numberPart;
           $fileName=$fileId.".pdf";
        }
    }

}  
function getHtml($productInfoArray,$discount)
{   
    //Product Info Calculation 
    
    //
    $totalPrice = 0;
    $totalQuantity = 0;
    $subTotal=0;
    include "database/data_access.php";
    $html="
    
    <h1 class=\"headLabel\"><img width=\"100px\" height=\"100px\" src=\"photo\power.jpg\"> আখি প্রিন্ট শাড়ি</h1>
    
    <table  class=\"redTable\">
    <col width=\"25%\" />
        <thead>
            <tr>
                <td >Product Name</td>
                <td>Price</td>
                <td>Quality Type</td>
                <td>Quantity</td>
                <td>Total Price</td>
            </tr>";

    $query = "SELECT * FROM `product` ";
    $result = mysqli_query($conn,$query);
    $productCounter = 0;
            while($row=mysqli_fetch_assoc($result))
            {
            $html .=  "<tr>
                   <td>".$row['productName']."</td>
                   <td>".$row['productPrice']."</td>
                   <td>".$row['productQualityType']."</td>
                   <td>".$productInfoArray[$productCounter]['quantity']."</td>
                   <td>".$productInfoArray[$productCounter]['totalPrice']."</td>
                   </tr>";

                    $totalPrice += $productInfoArray[$productCounter]['totalPrice'];
                    $totalQuantity += $productInfoArray[$productCounter]['quantity'];

                   $productCounter++;
                }
                
           
             
               
    $html .= "<tr>
                <td colspan=\"3\"></td>
                <td id=\"totalQuan\">Total quantity: ".$totalQuantity."</td>
                <td id=\"totalPrice\">Total Price: ".$totalPrice."</td>

            </tr>


            <tr>
            
            <td colspan=\"3\"></td>
            <td>Discount: </td>
            <td>".$discount."</td>
            </tr>

            <tr>
            <td colspan=\"3\"></td>
            <td>SubTotal: </td>
            <td>".($totalPrice-$discount)."</td>
            </tr>


            </tbody>
            
        </thead>


    </table>";
    return $html;
}
?>