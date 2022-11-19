(function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

})(jQuery);


function submitForm(self, action) {
  var data

  var response = document.getElementById("response")
  response.innerText = ""
  if(action == "signup") {
    data = {
      part: 'signup',
      action: "verify",
      val: {}
    }

    var name = document.getElementById("name")
    var email = document.getElementById("email")
    var phone = document.getElementById("phone")
    var password = document.getElementById("password")

    var form = new Form()
    response.classList.remove("responseError", "responseSuccess")
    response.classList.add("responseError")

    if(!form.validate(name.value, "name")){
      response.innerText = "Name should only contain letters"

      //return
    }
    else if(!form.validate(email.value, "email")){
      response.innerText = "Email should be in format John****@***.com"

      //return
    }

    else if(!form.validate(password.value, "password")) {
      response.innerText = "Password should contain both letters and numbers and should be greater than 7"

      //return
    }

    else if(phone.value.length < 1) {
      response.innerText = "Please put down your phone number"

      //return
    }
    
    else{
      data['val']['fullname'] = name.value
      data['val']['phone'] = phone.value
      data['val']['email'] = email.value
      data['val']['password'] = password.value
    }

  }

  if(action == "login") {
    var email = document.getElementById("email")
    var password = document.getElementById("password")

    if(email.value.length < 1) {
      response.innerText = "Please fill the forms"

      return
    }else if(password.value.length < 1) {
      response.innerText = "Please fill the forms"

      return
    }else{
      data = {
        part: 'login',
        action: "verify",
        val: {
            email: email.value,
            password: password.value 
        }
      }

    }
  }

  data = JSON.stringify(data)

  new Func().request('../controller/Request.php', data, 'json')
  .then(val => {
    console.log(val)
  })

}