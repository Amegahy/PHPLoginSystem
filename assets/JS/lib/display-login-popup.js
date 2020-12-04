/* DOCUMENT INFORMATION
    - Document: index.php JS imports
    - Author: Alex Megahy
    - Description: All JS component imports for index.php
------------------------------------------- */

/* Create and display login form */
function displayLoginPopup(container){

var form = "<form action = \"includes/login/login.inc.php\" method = \"POST\">" +
"<input class=\"loginInput\" type=\"text\" name=\"uid\" placeholder=\"'.$uidErrorMsg.'\">" +
"<input class=\"loginInput\" type=\"password\" name=\"pwd\" placeholder=\"'.$pwdErrorMsg.'\">" + 
"<button class= \"submit-btn\" type=\"submit\" name=\"submit\">Login</button>" +
"</form>";

}