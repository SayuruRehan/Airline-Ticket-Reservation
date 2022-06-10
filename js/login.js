function generateListTags(list){
    let listHtml = "";
    list.forEach((element)=>{
        listHtml += '<li>'+element+'</li>';
    })
    return listHtml;
}
// const passwordErrors = {
//     1: {
//         text:"Password should have at least eight characters!",
//         check: false
//     },
//     2: {
//         text:"Password should have at least 1 number."
//     },
//     3: {}
// }
function validatePassword(input){
    let errors =[];
    const password = input.value;
    const passwordLength = password.length;
    if(passwordLength>0 && passwordLength<8){
        errors.push( "Password should have at least 8 characters!");
    }
    return errors;
}
function handlePasswordInput(){
    const passwordInput = document.getElementById('password');
    const passwordErrors = document.getElementById('error-list');
    passwordInput.addEventListener('change', ()=>{
        let errors = validatePassword(passwordInput);
        passwordErrors.innerHTML = generateListTags(errors);
    });
}
function hideElements(elements){
    elements.forEach((el)=>{
        el.style.display = 'none';
    })
}
function showElements(elements){
    elements.forEach((el)=>{
        el.style.display = 'block';
    })
}


const toggleForms = ()=>{
    const showRegisterFormButton = document.getElementById('show-register-form-btn');
    const showLoginFormButton = document.getElementById('show-login-form-btn');
    const rememberForgetDiv = document.getElementById('remember-forget');
    const registerDiv = document.getElementById('register');
    const registerBtn = document.getElementById('register-btn');
    const loginBtn = document.getElementById('login-btn');
    const formHeading = document.querySelector('.heading');

    //when user clicks 'CREATE NEW ACCOUNT' button
    showRegisterFormButton.addEventListener('click', ()=>{
        //hide remember me and forget credentials
        //hide login btn
        hideElements([rememberForgetDiv,loginBtn, showRegisterFormButton]);
        //show register form sections
        //show register button
        showElements([registerDiv, registerBtn, showLoginFormButton]);
        //change form heading
        formHeading.innerHTML = 'REGISTER';
        handlePasswordInput();
    });

    //when user clicks 'ALREADY HAVE AN ACCOUNT' button
    showLoginFormButton.addEventListener('click',()=>{
        //hide register form sections
        //hide register button
        hideElements([registerDiv, registerBtn, showLoginFormButton]);
        //show remember me and forget credentials
        //show login btn
        showElements([rememberForgetDiv,loginBtn, showRegisterFormButton]);
        //change form heading
        formHeading.innerHTML = 'LOGIN';
    })
}





