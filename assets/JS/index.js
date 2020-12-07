/* DOCUMENT INFORMATION
    - Document: index.php JS imports
    - Author: Alex Megahy
    - Description: All JS component imports for index.php
------------------------------------------- */

$(document).ready(function(){
    // Display login popup
    $(".loginPopup").click(function(){
        var formContainer =  document.createElement("div");
        $(formContainer).addClass = "formContainer";

        var form = "<form class=\"loginForm\" action = \"../src/login/login.inc.php\" method = \"POST\">" +
        "<input class=\"loginInput\" type=\"text\" name=\"uid\" placeholder=\"Username or Email\">" +
        "<input class=\"loginInput\" type=\"password\" name=\"pwd\" placeholder=\"Password\">" + 
        "<button class= \"submit-btn\" type=\"submit\" name=\"submit\">Login</button>" +
        "</form>";

        $(formContainer).append(form);
        $("body").append(formContainer);
    });

    // Error handling on forms
    $('body').on('submit', '.loginForm', function(e) {
        if($(".loginInput:nth-child(1)").html() === ""){
            e.preventDefault();
            alert("Empty");
        }else{
            alert($(".loginInput:nth-child(1)").html());
        }
    });
});