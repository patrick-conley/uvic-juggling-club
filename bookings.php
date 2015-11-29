<?php
$redirect = "contact.php";
include("functions/load_page.php");
loadPage("", "", "
   <h2>Note to bookers</h2>
   <p> This page has been removed. See the <a href='$redirect'>contact page</a>.  </p>
", $redirect);
?>
