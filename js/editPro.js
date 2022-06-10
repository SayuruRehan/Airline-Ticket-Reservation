function success()
{
    let userid = document.forms["form"]["id"].value;
    // let username = document.forms["form"]["username"].value;
    // let fname = document.forms["form"]["fname"].value;
    // let lname = document.forms["form"]["lname"].value;
    // let address = document.forms["form"]["address"].value;
    // let email = document.forms["form"]["email"].value;
    // let phone = document.forms["form"]["Phone"].value;
    // let birthday = document.forms["form"]["birthday"].value;
    

    if(userid ==""){

        alert( "User ID must be filled");
        return false;
    }
    // else if(username =="" || fname == "" || lname==""|| address=="" || email=="" || phone==""|| birthday==""){

    //     alert( "If there no changes, re-enter your current details as same");
    //     return false;
    // }
    else{
        alert( "Save changes successfully");
        return false;
    }


    
}
