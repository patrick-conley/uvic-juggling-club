<?php
include("functions/load_page.php");

$redirect = "contact.php";
(new Page())->set_redirect($redirect)->set_text("
   <h2>Note to bookers</h2>
   <p> This page has been removed. See the <a href='$redirect'>contact page</a>.  </p>
")->render();
?>
