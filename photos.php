<?php
include("functions/load_page.php");
(new Page())->set_file("photos.php")->set_title("Photos")->add_stylesheet("photos/main.css")->render();
?>
