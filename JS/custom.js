function gotoSignUp() {
    $('#ThyBody').empty();
    $('#ThyBody').load("pages/signup.html", "data", function (response, status, request) {
        this;
    });
};

function gotoSignIn() {
    $('#ThyBody').empty();
    $('#ThyBody').load("pages/signin.html", "data", function (response, status, request) {
        this;
    });
};

//Sign Up Ajax cmnd
function signUp(){
    var username=$('#user-name').val();
    var email=$('#user-mail').val();
    var pass=$('#pswd').val();
    var passCnf=$('#pswd-cnf').val();
    if(pass == passCnf){
        console.log("Log SignUp\n///////////////////////\n"+
        "The username : "+username+"\nThe Email: "+email+"\nThe Pass: "+pass+"\n///////////////////////\n");
    }else{
        $('#passCnf').empty();
        $('#passCnf').append("Password didn't match");
        $('#passCnf').attr('style', 'display:block,');

    }
}