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
        $(formPopup).addClass("popup");        
        $(formContainer).addClass("formContainer");

        var form = "<form class=\"submitForm\" action = \"../src/login/login.inc.php\" method = \"POST\">" +
        "<input class=\"loginInput\" type=\"text\" name=\"uid\" placeholder=\"Username or Email\">" +
        "<input class=\"loginInput\" type=\"password\" name=\"pwd\" placeholder=\"Password\">" + 
        "<button class= \"submit-btn\" type=\"submit\" name=\"submit\">Login</button>" +
        "</form>";

        $(formContainer).append(form);
        $(formPopup).append(formContainer);
        $("body").append(formPopup);
    });

    // Error handling on forms
    $('body').on('submit', '.loginForm', function(e) {
        e.preventDefault();
        if($(".loginInput:nth-of-type(1)").val() === ""){
        }else{
            $.ajax({
                type: 'POST',
                url: '../src/components/login.inc.php',
                data: $('form').serialize(),
                success: function () {
                  alert('form was submitted');
                }
            });
        }
    });
});