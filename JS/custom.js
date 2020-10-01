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
