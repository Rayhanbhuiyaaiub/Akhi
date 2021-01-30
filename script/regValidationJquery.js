$("#register").click(function(){
    onUserNameInput('errorUserName');
    onNameInput('errorAdminName');
    onPasswordInput('errorAdminPassword');
    onRePasswordInput('errorAdminCfmPassword');
    onAddressInput('errorAdminAddress');
    onPhoneInput('errorAdminPhone');

    if(!userflag || !nameflag || !passwordflag || !cnfrmpasswordflag || !addressflag || !phonenumberflag)
    {
        document.getElementById("register").disabled = true;
        return false;
    }
    else
    {
        document.getElementById("register").disabled = false;
        return true;
    }

  });