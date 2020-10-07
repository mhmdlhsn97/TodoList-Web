function gotoSignUp() {
    $('#ThyBody').empty();
    $('#ThyBody').load("pages/signup.html", "data", function () {
        this;
    });
};

function gotoSignIn() {
    $('#ThyBody').empty();
    $('#ThyBody').load("pages/signin.html", "data", function () {
        this;
    });
};
function gotoHome() {
    $('#ThyBody').empty();
    $('#ThyBody').load("pages/Home.html", "data", function () {
        this;
    });
};

//Sign Up Ajax cmnd
function signUp() {
    var username = $('#user-name').val();
    var email = $('#user-mail').val();
    var pass = $('#pswd').val();
    var passCnf = $('#pswd-cnf').val();
    if (pass == passCnf) {
        $.ajax({
            type: "POST",
            url: "db/signUp.php",
            data: {
                name: username,
                email: email,
                pass: pass
            },
            dataType: "text",
            success: function (response) {
                var x = parseInt(response);
                switch (x) {
                    case 5:
                        $('#passCnf').empty();
                        $('#passCnf').append("User already exists!");
                        $('#passCnf').attr('style', 'display:block,');
                        break;
                    case 4:
                        $('#passCnf').empty();
                        $('#passCnf').append("Email already exists!");
                        $('#passCnf').attr('style', 'display:block,');
                        break;
                    case 1:
                        $('#passCnf').empty();
                        $('#passCnf').append("Success, you will be redirected to sign in page.");
                        $('#passCnf').attr('style', 'display:block,');
                        setTimeout(gotoSignIn, 3000);
                        break;
                    case 0:
                        $('#passCnf').empty();
                        $('#passCnf').append("Failure in SQL INSERT");
                        $('#passCnf').attr('style', 'display:block,');
                        break;
                    default:
                        $('#passCnf').empty();
                        $('#passCnf').append("Unknown error");
                        $('#passCnf').attr('style', 'display:block,');
                        break;
                }
            },
            error: function (resp) {
                console.log("AJAX Failed:\n" + resp);
            }

        });
        //  console.log("Log SignUp\n///////////////////////\n"+
        //  "The username : "+username+"\nThe Email: "+email+"\nThe Pass: "+pass+"\n///////////////////////\nThe JSON Format:\n"+json);
    } else {
        $('#passCnf').empty();
        $('#passCnf').append("Password didn't match");
        $('#passCnf').attr('style', 'display:block,');

    }
}

//Sign in fnct

function signIn() {
    var user = $('#user-name').val();
    var pass = $('#password').val();
    var cookie = $('cookie').val();
    if (user != null && pass != null) {
        $.ajax({
            type: "POST",
            url: "db/signIn.php",
            data: {
                user: user,
                pass: pass
            },
            dataType: "text",
            success: function (response) {
                var b = response;
                var obj = JSON.parse(b);
                if (b != "") {
                    if (obj.hasOwnProperty('user_id')) {
                        console.log(b);
                        var x2 = obj.x;
                        console.log("X: " + x2);
                    } else {
                        var x = obj.x;
                        switch (x) {
                            case 1:

                                gotoHome();
                                break;
                            case 2:
                                console.log("Wrong user");
                                break;
                            case 3:
                                console.log("Wrong pass");
                                break;
                            default:
                                //unknow error;
                                console.log("Unkown Error");
                                break;
                        }
                    }
                } else
                    console.log("No Response From Server");
            },
            error: function () {
                console.log("AJAX error");
            }
        });
    }
}