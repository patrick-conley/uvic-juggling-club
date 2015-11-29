<?php
$redirect = "index.php#meetings";
include("functions/load_page.php");
loadPage("", "Meeting times", "
   <h2>How to Join</h2>
   <p>This page has been removed. See the <a href='$redirect'>about page</a>. </p>
", $redirect);
?>
