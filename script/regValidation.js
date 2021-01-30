
var userflag=0;
var nameflag=0;
var passwordflag=0;
var cnfrmpasswordflag=0;
var addressflag=0;
var phonenumberflag=0;

function validate()
{   
    
    if(!userflag || !nameflag || !passwordflag || !cnfrmpasswordflag || !addressflag || !phonenumberflag)
    {
        document.getElementById("register").disabled = true;
    }
    else
    {
        document.getElementById("register").disabled = false;
    }
}
function onUserNameInput(id)
{
    var errorLabel = document.getElementById(id);
    var userNameField = document.getElementById("adminusername");

    var userName = userNameField.value;
    var regex = /^[A-Za-z0-9 ]+$/ ;
    var isvalid = regex.test(userName);

    if(userName.search(/\s/) == 1)
    {
        userflag=0;
        userNameField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"can not Containt space ");
    }
    else if(!isvalid)
    { 
        userflag=0;  
        userNameField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"Containt special char");
    }

    else if(userName[0]=="A" && userName.length==4)
    {
        userNameField.style.border="2px solid red";
        

        if(Number.isInteger(Number(userName.substring(1,4))))
        {
            userflag=0;
            errorLabel.style.opacity=0;
            setTimeout(changeText,500,errorLabel,"Username Not Allowed");
        }

    }
    else if( userName.length<4)
    {
        userflag=0;
        userNameField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"Username Must be Min length 4");
    }
    else
    {
        var flag = 0;
        for(i=0;i<userNameArray.length;i++)
        {
            if(userName==userNameArray[i])
            {
                flag = 1;
                break;
            }
        }

        if(flag==1)
        {
            userNameField.style.border="2px solid red";
            errorLabel.style.opacity=0;
            setTimeout(changeText,500,errorLabel,"Username Already Exist!");
        }
        else
        {
            userflag = true;
            userNameField.style.border="2px solid green";
            errorLabel.style.opacity=0;
            setTimeout(changeText,500,errorLabel,"");
        }
        
    }
    validate();
}

function onNameInput(id)
{
    var errorLabel = document.getElementById(id);
    var adminNameField = document.getElementById("adminname");
    var adminName = adminNameField.value;

    var multipleSpaceCheckerFlag = doubleSpCharChecker(adminName," ") ;
    var multipleCommaCheckerFlag = doubleSpCharChecker(adminName,",") ;
    var multipleDotCheckerFlag   = doubleSpCharChecker(adminName,".") ;


    if(adminName.length <= 2)
    {
        nameflag=0;
        adminNameField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel," Invalid Name ");
    }

    else if(adminName[0]==" " || adminName[0]=="," || adminName[0]==".")
    {  
        nameflag=0; 
        adminNameField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel," Invalid Name ");
    }
    else if (multipleSpaceCheckerFlag || multipleCommaCheckerFlag )
    {
        nameflag=0;
        adminNameField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"Invalid Name ");
    }
    else
    {  
        nameflag = true;
        adminNameField.style.border="2px solid green";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"");
    }


    validate();
}

function onPasswordInput(id)
{
    
    var errorLabel = document.getElementById(id);
    var adminPasswordField = document.getElementById("adminpassword");
    var adminPassword = adminPasswordField.value;


    if(adminPassword.length < 6)
    {
        passwordflag=0;
        adminPasswordField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"Password should be minimum 6 digit");
    }
    else
    {  
        
        passwordflag = true; 
        adminPasswordField.style.border="2px solid green";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"");

    }
    validate();
}

function onRePasswordInput(id)
{   
    var errorLabel = document.getElementById(id);
    var adminPassword = document.getElementById("adminpassword").value;
    var adminRePasswordField = document.getElementById("confirmpassword");
    var adminRePassword = adminRePasswordField.value;


    if(!(adminPassword===adminRePassword))
    {
        cnfrmpasswordflag=0;
        adminRePasswordField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"Password doesn't match");
    }
    else
    {
        cnfrmpasswordflag =true;
        adminRePasswordField.style.border="2px solid green";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"");  
    }
    validate();
}

function onAddressInput(id)
{
    var errorLabel = document.getElementById(id);
    var adminAddressField = document.getElementById("adminaddress");
    var adminAddress = adminAddressField.value;


    
    if(adminAddress.length <= 2)
    {
        addressflag=0;
        adminAddressField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel," Invalid Name ");
    }

    else if(adminAddress[0]==" " || adminAddress[0]=="," || adminAddress[0]==".")
    {
        addressflag=0;
        adminAddressField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel," Invalid Address ");
    }

    else
    {
        addressflag = true;
        adminAddressField.style.border="2px solid green";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"");
    }
    validate();
}

function onPhoneInput(id)
{
    var errorLabel = document.getElementById(id);
    var adminPhoneField = document.getElementById("adminphone");
    var adminPhone = adminPhoneField.value;
    var regex =/^[0-9]+$/ ;

    

    if(! regex.test(adminPhone) ) 
    {
        phonenumberflag=0;
        adminPhoneField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel," Invalid phone number ");
    }

    else if(adminPhone.length != 11)
    {
        phonenumberflag=0;
        adminPhoneField.style.border="2px solid red";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel," Number Must be 11 digit ");
    }

    else
    {
        phonenumberflag=true;
        adminPhoneField.style.border="2px solid green";
        errorLabel.style.opacity=0;
        setTimeout(changeText,500,errorLabel,"");
    }

    validate();
}




function changeText(x,text)
{   
        
    x.style.opacity = 1;
    x.innerText  =text;
        
}

function doubleSpCharChecker(hay,needle) 
{
    for(i=0;i<hay.length-1;i++)
    {   
         if (hay[i] == needle && hay[i+1]==needle )
        {
            return true;
        }
    }
    return false;

}

validate() ;
