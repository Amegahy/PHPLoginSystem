/* DOCUMENT INFORMATION
    - Document: index.php JS imports
    - Author: Alex Megahy
    - Description: All JS component imports for index.php
------------------------------------------- */

$(document).ready(function(){
    // Display login popup
    $(".loginPopup").click(function(){
        var form = "<form id=\"loginForm\" class=\"submitForm\">" +
        "<input class=\"loginInput\" type=\"text\" id=\"username\" placeholder=\"Username or Email\">" +
        "<input class=\"loginInput\" type=\"password\" id=\"password\" placeholder=\"Password\">" + 
        "<p class=\formError\"></p>" +
        "<button class= \"submit-btn\" type=\"submit\">Login</button>" +
        "</form>";

        createFormPopup(form);
    });

    // Display Signup Popup
    $(".signupPopup").click(function(){
        var form = "<form id=\"signupForm\" class=\"submitForm\">" +
        "<input class=\"signupInput\" type=\"text\" id=\"first\" placeholder=\"First name\">" +
        "<input class=\"signupInput\" type=\"text\" id=\"last\" placeholder=\"Last name\">" +
        "<input class=\"signupInput\" type=\"text\" id=\"email\" placeholder=\"Email\">" +
        "<input class=\"signupInput\" type=\"text\" id=\"username\" placeholder=\"Username\">" +
        "<input class=\"signupInput\" type=\"password\" id=\"password\" placeholder=\"Password\">" +
        "<p class=\"formError\"></p>" +
        "<button class= \"submit-btn\" type=\"submit\">Sign Up</button>" +
        "</form>";

        createFormPopup(form);
    });


    // Error handling on login form
    $('body').on('submit', '#loginForm', function(e) {
        e.preventDefault();
        var username = $(".loginInput:nth-of-type(1)");
        var password = $(".loginInput:nth-of-type(2)");

        // Send data to php file after empty check
        if(emptyCheck([username, password]) == true){
            $.ajax({
                url:'../src/login/login.inc.php',
                type:'post',
                data:{
                    username:$(username).val(),
                    password:$(password).val()
                },
                success:function(response) {
                    handleResponse("login",response);
                }
            });
        }
    });

    // Error handling on sign up form
    $('body').on('submit', '#signupForm', function(e) {
        e.preventDefault();
        var firstName = $(".signupInput:nth-of-type(1)");
        var lastName = $(".signupInput:nth-of-type(2)");
        var email = $(".signupInput:nth-of-type(3)");
        var username = $(".signupInput:nth-of-type(4)");
        var password = $(".signupInput:nth-of-type(5)");

        // Send data to php file
        if(emptyCheck([firstName, lastName, email, username, password]) == true){
            $.ajax({
                url:'../src/login/signup.inc.php',
                type:'post',
                data:{
                    firstName:$(firstName).val(), 
                    lastName:$(lastName).val(), 
                    email:$(email).val(), 
                    username:$(username).val(), 
                    password:$(password).val()
                },
                success:function(response) {
                    handleResponse("signup",response);
                }
            });
        }
    });

    // Close popup form
    $('body').on('click', '.closeButton', function() {
        $(".popup").remove();
    });
});

// Handle the login form result
function handleResponse(form, response){
    if(response == "Incorrect" && form === "login"){
        $(".formError").html("Your username or password is incorrect");
    }else if(response == "Incorrect" && form === "signup"){
        $(".formError").html("Oops, something went wrong. It is possibile this user already exists");
    }else{
        alert("Success");
    }
}

// Create popup for form
function createFormPopup(form){
    var formPopup =  document.createElement("div");
    var formContainer =  document.createElement("div");
    var closeButton =  document.createElement("button");

    $(formPopup).addClass("popup");        
    $(formContainer).addClass("formContainer");
    $(closeButton).addClass("closeButton");

    $(closeButton).html("X");
    
    $(formContainer).append(closeButton);
    $(formContainer).append(form);
    $(formPopup).append(formContainer);
    $("body").append(formPopup);
}

// Empty check
function emptyCheck(inputs){
    // Used for customised error messages
    var id;
    var check = true;

    $.each(inputs, function(index, input){
        if(input.val() === ""){
            if(input.attr("id") == "first"){
                id = "first name";
            }
            else if (input.attr("id") == "last"){
                id = "last name";
            }
            else {
                id = input.attr("id")
            }
            input.attr("placeholder", "Please enter valid " + id);
            check = false;
        }
    });

    return check;
}