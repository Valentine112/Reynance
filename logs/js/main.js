(function($) {

	"use strict";


})(jQuery);

function submitForm() {
    ssubmitMSG(false, "");
    // initiate variables with form content
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var uname = $("#uname").val();
    var email = $("#semail").val();
    var password = $("#spassword").val();

    if(fname != "" && uname != "" && email != "" && password != ""){

        var url = window.location.href
        var params = (new URL(url)).searchParams
        var referred = params.get('referred')

        if(referred === null) {
            referred = ""
        }

        var url = "action=signupprocess&fname=" + fname + "&lname=" + lname + "&uname=" + uname + "&email=" + email + "&password=" + password + "&referred=" + referred

        var ajx = new XMLHttpRequest()
        ajx.addEventListener("load", completeHandler, false)
        ajx.open("POST", "PHP/signupform-process.php");
        ajx.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        ajx.send(url)

        function completeHandler(ev) {
            console.log(ev.target.responseText)
            var text = ev.target.responseText

            if (text == "success") {
                ssubmitMSG(true, "Successful. . . Redirection");
                window.location = "login.php"
            } else {
                if(text == "error 1") {
                    ssubmitMSG(false, "please fill out the forms");
                }else if(text == "error 2") {
                    ssubmitMSG(false, "Email already in use");
                }else if(text == "error 3") {
                    ssubmitMSG(false, "Username already in use");
                }else{
                    ssubmitMSG(false, "Unknown errror");
                }
            }
        }
    }else{
        ssubmitMSG(false, "Please fill out the forms");
    }
}

function loginForm() {
    // initiate variables with form content
    var email = $("#lemail").val();
    var password = $("#lpassword").val();

    if(password.length > 1 && email.length > 1) {
        $.ajax({
            type: "POST",
            url: "php/loginform-process.php",
            data: "action=loginprocess&email=" + email + "&password=" + password, 
            success: function(text) {
                console.log(text)
                if (text == "set") {
                    ssubmitMSG(true, "Successful... Redirecting");
                    window.location = "../user/index.php"
                } else {
                    ssubmitMSG(false, "Incorrect username or password");
                }
            }
        });
    }else{
        ssubmitMSG(false, "Please fill the forms");
    }
}

function forgotForm() {
    var email = $("#lemail").val();
    if(email != "" || email.length > 0){
        $.ajax({
            type: "POST",
            url: "php/forgot.php",
            data: "action=forgot&email=" + email, 
            success: function(text) {
                console.log(text)
                if (text == "set") {
                    window.location = "new-pass.php"
                } else {
                    ssubmitMSG(false, "Email does not exist here");
                }
            }
        });
    }else{
        ssubmitMSG(false, "Please fill all fields")
    }
}

function newPassForm() {
    var email = $("#lpassword").val();
    var token = $("#token").val();
    if(email != "" || email.length > 0 && token != ""){
        $.ajax({
            type: "POST",
            url: "php/new-pass.php",
            data: "action=change&pass=" + email + "&token=" + token,
            success: function(text) {
                console.log(text)
                if (text == "set") {
                    ssubmitMSG(true, "Password has been changed successfully")
                    setTimeout(() => {
                        window.location = "login.php"
                    }, 2000);
                } else {
                    ssubmitMSG(false, "Failed to update password");
                }
            }
        });
    }else{
        ssubmitMSG(false, "Please fill all fields")
    }
}

function ssubmitMSG(valid, msg) {
	if (valid) {
		var msgClasses = "h6 text-center text-success tada animated";
	} else {
		var msgClasses = "h6 text-danger text-center";
	}
	$("#smsgSubmit").removeClass().addClass(msgClasses).text(msg);
}

function sformSuccess() {
    $("#signUpForm")[0].reset();
    ssubmitMSG(true, "Successful!");
    $("input").removeClass('notEmpty'); // resets the field label after submission
    window.location = "login.php"
}