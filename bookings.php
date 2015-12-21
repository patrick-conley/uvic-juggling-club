<?php
include("functions/load_page.php");

$redirect = "contact.php";
$page = new Page();
$page->set_redirect($redirect);
$page->set_text("
   <h2>Note to bookers</h2>
   <p> This page has been removed. See the <a href='$redirect'>contact page</a>.  </p>
");
$page->render();
?>
