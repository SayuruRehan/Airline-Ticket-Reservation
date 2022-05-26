function validateForm() {
  let x = document.forms["myform1"]["from"].value;
  let y = document.forms["myform1"]["to"].value;
  if (x == "") {
  alert("From field must be filled out");
  return false;
  }
  if (y == "") {
  alert("To field must be filled out");
  return false;
  }
  
  }