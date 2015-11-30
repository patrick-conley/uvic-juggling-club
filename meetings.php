<?php
include("functions/load_page.php");

$redirect = "index.php#meetings";
(new Page())->set_title("Meeting times")->set_redirect($redirect)->set_text("
   <h2>How to Join</h2>
   <p>This page has been removed. See the <a href='$redirect'>about page</a>. </p>
")->render();
?>
