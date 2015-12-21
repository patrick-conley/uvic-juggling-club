<?php
include("functions/load_page.php");

$redirect = "index.php#meetings";
$page = new Page();
$page->set_title("Meeting times");
$page->set_redirect($redirect);
$page->set_text("
   <h2>How to Join</h2>
   <p>This page has been removed. See the <a href='$redirect'>about page</a>. </p>
");
$page->render();
?>
