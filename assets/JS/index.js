/* DOCUMENT INFORMATION
    - Document: index.php JS imports
    - Author: Alex Megahy
    - Description: All JS component imports for index.php
------------------------------------------- */

$(document).ready(function(){
    // Display login popup
    $(".loginPopup").click(function(){
        var formPopup =  document.createElement("div");
        var formContainer =  document.createElement("div");
        var closeButton =  document.createElement("button");

        $(formPopup).addClass("popup");        
        $(formContainer).addClass("formContainer");
        $(closeButton).addClass("closeButton");

        $(closeButton).html("X");

        var form = "<form class=\"submitForm\">" +
        "<input class=\"loginInput\" type=\"text\" name=\"uid\" placeholder=\"Username or Email\">" +
        "<input class=\"loginInput\" type=\"password\" name=\"pwd\" placeholder=\"Password\">" + 
        "<p class=\"loginError\"></p>" +
        "<button class= \"submit-btn\" type=\"submit\" name=\"submit\">Login</button>" +
        "</form>";

        $(formContainer).append(closeButton);
        $(formContainer).append(form);
        $(formPopup).append(formContainer);
        $("body").append(formPopup);
    });

    // Error handling on forms
    $('body').on('submit', '.submitForm', function(e) {
        e.preventDefault();
        var username = $(".loginInput:nth-of-type(1)");
        var password = $(".loginInput:nth-of-type(2)");

        // Empty check
        if($(username).val() === ""){
            $(username).val("");
            $(username).attr("placeholder", "Please enter a username");
        }
        if($(password).val() === ""){
            $(password).val("");
            $(password).attr("placeholder", "Please enter a password");
        }
        // Send data to php file
        else{
            $.ajax({
                url:'../src/login/login.inc.php',
                type:'post',
                data:{username:$(username).val(),password:$(password).val()},
                success:function(response) {
                    handleResponse(response, username, password);
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
function handleResponse(response, username, password){
    if(response == "Incorrect"){
        $(".loginError").html("Your username or password is incorrect");
    }else {
        //success
    }
}