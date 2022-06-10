const allQuestions = document.querySelectorAll(".questionTitle");

allQuestions.forEach(qstion => {
  qstion.addEventListener("click", event => {
    
    //to keep only one FAQ open at once
        
    const activeQstionBox = document.querySelector(".questionTitle.active");
    if(activeQstionBox && activeQstionBox!==qstion) {
    activeQstionBox.classList.toggle("active");

    
    activeQstionBox.nextElementSibling.style.maxHeight = 0;
    }
    //
    qstion.classList.toggle("active");
    const aswerBox = qstion.nextElementSibling;
    if(qstion.classList.contains("active")) {
      aswerBox.style.maxHeight = aswerBox.scrollHeight + "px";
    }
    else {
        //if not clicked on, answer will not open
      aswerBox.style.maxHeight = 0;
    }
    
  });
});