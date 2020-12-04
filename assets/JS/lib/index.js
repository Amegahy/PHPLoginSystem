/* DOCUMENT INFORMATION
    - Document: index.php JS imports
    - Author: Alex Megahy
    - Description: All JS component imports for index.php
------------------------------------------- */

$(document).ready(function(){
    // Display login popup
    $(".loginPopup").click(function(){
        $.getScript('../assets/JS/lib/display-login-popup.js');
    });
});