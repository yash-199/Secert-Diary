var state=false;
function toggle(){
    if(state){
        document.getElementById("pass").setAttribute("type","password");
        state=false;
    }
    else{
        document.getElementById("pass").setAttribute("type","text");
        state=true;
    }
}
function myFunction(show){
    show.classList.toggle("fa-eye-slash");
}

/*$("#showLogInForm").click(function(){

    $("#signUpForm").toggle();
    $("#logInForm").toggle();
});*/

 /*function validate()
{
    var username=document.getElementById("email");
    var password=document.getElementById("pass");

    if(username.value.trim()=="")
    {
        //alert("Blank username");
        username.style.border="solid 3px red";
        document.getElementById("lbluser")
        .style.visibility="visible";
        return false;
    }
   else if(password.value.trim()=="")
    {
        //alert("Blank Password");
        password.style.border="solid 3px red";
        document.getElementById("lblpass")
        .style.visibility="visible";
        return false;
    }
    else if(password.value.trim().length<5)
    {
        //alert("Password to short");
        document.getElementById("passlen")
        .style.visibility="visible";
        return false;
    }
    else{
        return true;
    }
}*/