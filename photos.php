<?php
include("functions/load_page.php");
$page = new Page();
$page->set_file("photos.php");
$page->set_title("Photos");
$page->add_stylesheet("photos/main.css");
$page->render();
?>
