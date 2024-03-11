$(document).ready(function () {

    $("#emailerror").hide();
    $("#txtemail").blur(function () {
        ValidateEmail();
    })

    $("#passworderror").hide();
    $("#txtpassword").blur(function () {
        ValidatePassword();
    });
});

function ValidateEmail() {

    var email = $("#txtemail").val();

    if (email == "") {
        $("#emailerror").show();
        $("#emailerror").html("Email id can't be empty");
        return false;
    }
    else if (IsEmail(email) == false) {
        $("#emailerror").show();
        $("#emailerror").html("Email id is not in a proper formate");
        return false;
    }
    else {
        $("#emailerror").hide();
        return true;
    }

    function IsEmail(email) {
        const regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        }
        else {
            return true;
        }
    }
}

function ValidatePassword() {
    var password = $("#txtpassword").val();
    // var passnum=/^([0-9])/;
    // var passchar=/^([A-Z])/;
    var specialcharacter = /^[A-Za-z0-9]+$/


    if (password == "") {
        $("#passworderror").show();
        $("#passworderror").html("Password can't be empty");
        return false;
    }
    if (password.length < 8) {
        $("#passworderror").show();
        $("#passworderror").html("Password containe minimum 8 characters");
        return false;
    }
    else if (!password.match(/[A-Z]/)) {
        $("#passworderror").show();
        $("#passworderror").html("Password containe a capital letter");
        return false;
    }
    else if (!password.match(/[0-9]/)) {
        $("#passworderror").show();
        $("#passworderror").html("Password containe a number");
        return false;
    }
    else if (password.match(specialcharacter)) {
        $("#passworderror").show();
        $("#passworderror").html("Password containe a special character");
        return false;
    }
    else {
        $("#passworderror").hide();
        return true;
    }
}