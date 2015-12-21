<?php

include("photos/functions.php");

/* If the script hasn't been told to load an album, it should create an index of
 * all of them.
 * Note this intentionally creates an index when it's been given a photo but 
 * not its album.
 */
if ( ! isset( $_GET['album'] ) )
   makeIndex();

/* If it has an album but no photo, it should create an index of the album
 */
else if ( ! isset( $_GET['image'] ) )
   makeAlbumIndex( $_GET['album'] );

/* If it has an album and photo, it should open up the image
 */
else
   makeImage( $_GET['album'], $_GET['image'] );

?>
