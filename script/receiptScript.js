function calculateTotal(quantityId,price)
{

    var wholeTotalPrice = 0;
    var totalQuantity = 0;


    var quantityField = document.getElementById(quantityId);
    var t_name=quantityId.substring(2);
    t_name="T_"+t_name;
    var totalField= document.getElementById(t_name);
    var totalPrice=parseInt(quantityField.value)*parseInt(price);

    if(totalPrice)
    {

    }
    else
    {
        totalPrice=0;
    }

    totalField.innerHTML = totalPrice;


    var receiptTable = document.getElementById('receiptTable');

    var tr = receiptTable.getElementsByTagName('tr');

    var td="";

  

    for(i=1;i<tr.length-3;i++)
    {
        var td = tr[i].getElementsByTagName('td');

        var newQuantity = parseInt(td[3].getElementsByTagName('input').valueOf()[0].value);

        var newPrice = parseInt(td[4].innerText);

        if(newPrice)
        {

        }
        else
        {
            newPrice = 0;
        }

        if(newQuantity)
        {
            
        }
        else
        {
            newQuantity = 0;
        }

       totalQuantity = totalQuantity+newQuantity;
       wholeTotalPrice = wholeTotalPrice+newPrice;

       
    }


 
    
    //Manipulating the quantity field after getting the value
    var totalQuanField = document.getElementById('totalQuan');
    var totalPriceField = document.getElementById('totalPrice');
    totalQuanField.innerHTML = "Total Quantity: "+totalQuantity;
    totalPriceField.innerText = "Total Price: "+wholeTotalPrice;

    
    updateSubTotal();
   

}


function updateSubTotal()
{
    var totalPriceField = document.getElementById('totalPrice');
    var totalDiscountField = document.getElementById('disCount');
    var subTotalField = document.getElementById('subTotal');
    var discount=parseInt(totalDiscountField.value);
    if (!discount)
    {
        discount=0;
    }
    var subTotal = parseInt(totalPriceField.innerText.substring(13))-discount;
    
    subTotalField.innerText = subTotal;


}
