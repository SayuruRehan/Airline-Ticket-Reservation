var cardnumber = document.getElementById('Crdnumber')
//const cvv = document.getElementById('cvv')
function success()
{
form.addEventListener('submit',(e) =>{
 
if(cardnumber.value.length > 10 || cardnumber.value.length <10)
{
    alert("card number must be 10 characters");
}
 else
 {
    alert("Payment successful");
 }
}
)
}


