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
    
    $totalPrice = 0;

    foreach  ($productInfoArray as $product)
    {
        $totalPrice += $product[2];
    }
    

    echo "<br>Total Price: ".$totalPrice."<br>";
    
    //

    $html="
    
    <h1 class=\"headLabel\"><img width=\"100px\" height=\"100px\" src=\"photo\power.jpg\"> আখি প্রিন্ট শাড়ি</h1>
    
    <table  class=\"redTable\">
    <col width=\"25%\" />
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Price</td>
                <td>Quality Type</td>
                <td>Quantity</td>
                <td>Total Price</td>
            </tr>
                <tbody>

                

          <tr>
              <td > Power</td>
              <td> 610</td>
              <td> Bp</td>
              <td colspan=\"1\"><input  type=\"number\" ></td>
              <td colspan=\"1\"><label >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td > Vowel</td>
              <td> 450</td>
              <td> vowel</td>
              <td colspan=\"1\"><input  type=\"number\" ></td>
              <td colspan=\"1\"><label >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td > Vowel Plus</td>
              <td> 440</td>
              <td> vowel</td>
              <td colspan=\"1\"><input type=\"number\" ></td>
              <td colspan=\"1\"><label >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td > Selfi</td>
              <td> 530</td>
              <td>BP</td>
              <td colspan=\"1\"><input  type=\"number\"></td>
              <td colspan=\"1\"><label  n>0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td > Talash</td>
              <td> 430</td>
              <td>vowel</td>
              <td colspan=\"1\"><input  type=\"number\"  ></td>
              <td colspan=\"1\"><label >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td >Pakhi</td>
              <td> 435</td>
              <td>BP</td>
              <td colspan=\"1\"><input  type=\"number\" ></td>
              <td colspan=\"1\"><label >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td >Rong</td>
              <td>390</td>
              <td>BP</td>
              <td colspan=\"1\"><input  type=\"number\"  ></td>
              <td colspan=\"1\"><label  >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td >Deu</td>
              <td>350</td>
              <td>BP</td>
              <td colspan=\"1\"><input  type=\"number\"  ></td>
              <td colspan=\"1\"><label  >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td > Pakhi</td>
              <td> 430</td>
              <td> without Bp</td>
              <td colspan=\"1\"><input  type=\"number\"  ></td>
              <td colspan=\"1\"><label  >0</label></td>
              
              
          </tr>
       
       

          <tr>
              <td > Rong</td>
              <td> 385</td>
              <td> without Bp</td>
              <td colspan=\"1\"><input  type=\"number\"  ></td>
              <td colspan=\"1\"><label  >0</label></td>
              
              
          </tr>
       
               
            <tr>
                <td colspan=\"3\"></td>
                <td id=\"totalQuan\">Total quantity</td>
                <td id=\"totalPrice\">Total Price</td>

            </tr>


            <tr>
            
            <td colspan=\"3\"></td>
            <td>Discount: </td>
            <td> <input  type=\"number\"  value=0></td>
            </tr>

            <tr>
            <td colspan=\"3\"></td>
            <td>SubTotal: </td>
            <td> <label for=\"\" id=\"subTotal\">".$totalPrice."</label></td>
            </tr>


            </tbody>
            
        </thead>


    </table>";
    return $html;
}
?>