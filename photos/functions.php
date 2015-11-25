<?php

/* Function: readAlbumList() {{{1
 * Purpose:  get a list of lists of album information
 * Purpose: make arrays of album information from photos/albumlist. The album 
 *    numbers will be sorted in display order, the rest will be in associative 
 *    arrays sorted by album number
 * Argument: N/A
 * Return: $caption[], $title[], $img[], $album[]
 */
function readAlbumList()
{

   $albumNumber[-1] = 0;

   if( file_exists( "photos/albumlist" ) )
   {

      /* Open the file containing the index information for each album
       */
      $albumlist = fopen( "photos/albumlist", "r" );

      while( !feof( $albumlist ) )
      {

         $record = fgets( $albumlist );

         /* Extract the album number, title, album image, and caption
          */
         if ( preg_match( '/albumNumber="([^"]*)"/', $record, $matches ) )
         {
            array_push( $albumNumber, $matches[1] );
            $thisAlbum = $matches[1];
         }
    
         if ( preg_match( '/title="([^"]*)"/', $record, $matches ) )
            $title[$thisAlbum] = $matches[1];
    
         if ( preg_match( '/img="([^"]*)"/', $record, $matches ) )
            $img[$thisAlbum] = $matches[1];
    
         if ( preg_match( '/caption="([^"]*)"/', $record, $matches ) )
            $caption[$thisAlbum] = $matches[1];

         if ( preg_match( '/size="([^"]*)"/', $record, $matches ) )
            $size[$thisAlbum] = $matches[1];

      }

   }

   /* Return the entries
    */
   return array( $albumNumber, $title, $img, $caption, $size );

}

/* Function: makeIndex() {{{1
 * Purpose: generate content for photos.php showing all albums
 * Argument: none; data from photos/albumlist
 * Return: $caption[], $title[]
 */
function makeIndex()
{
?>

<h2>Photos and videos</h2>

<p>
If you have any pictures or videos of club members, please send them to
<a href="mailto:juggling@uvic.ca">juggling@uvic.ca</a> or
<a href="mailto:pconley@uvic.ca">Patrick</a>.
</p>

<?php

   # Get album information from the data file
   list( $albumNumber, $title, $img, $caption, $size ) = readAlbumList();

   # Display album information
   for ( $iAlbum = 0; $iAlbum < count( $albumNumber ); $iAlbum++ )
   {

      $thisAlbum = $albumNumber[$iAlbum];

      if ( $thisAlbum != "" && $img[$thisAlbum] != "" )
      {

         echo '<div class="photo_index_item">';

         echo '<h3>' . $title[$thisAlbum] . '</h3>';
         echo '<a href="photos.php?album=' . $thisAlbum . '#body"><img src="photos/' . $thisAlbum . '/' . $img[$thisAlbum] . '" alt="' . $title[$thisAlbum] . '"></a>';

         echo '<p>' . $caption[$thisAlbum] . '</p>';

         echo '</div>';

      }

   }

   echo '<br style="clear:left">';

}

/* Function: makeAlbumIndex() {{{1
 * Purpose: generate content for photos.php showing the contents of one album
 * Arguments: album number
 * Return: none
 */
function makeAlbumIndex( $album )
{
   list( $albumNumber, $title, $img, $caption, $size ) = readAlbumList();

   echo '<div id="horizontal_linklist">
      <h2><a href="./photos.php#body"><span class="linklist horizontal_linklist">Photos and videos</span></a> &lArr; ' . $title[$album] . ' </h2> </div>';

   echo "<hr>" . $caption[$album] . "<hr>";

   for ( $iPhoto = 1; $iPhoto <= $size[$album]; $iPhoto++ )
   {

      $image = sprintf( "%04d", $iPhoto );

      echo '<div class="album_index_item"><a href="photos.php?album=' . $album . '&image=' . $image . '#body"> <img class="album" src="photos/' . $album . '/Thumbnails/' . $image . '.jpg" alt="' . $image . '.jpg"> </a></div>';

   }

   echo '<br style="clear:left">';

}

/* Function: makeImage( $album, $image ) {{{1
 * Purpose: display an image; find the next and previous images
 * Arguments: album number
 *            image number
 * Return:    N/A
 */
function makeImage( $album, $image )
{
   list( $albumNumber, $title, $img, $caption, $size ) = readAlbumList();

   # Header
   echo '<div id="horizontal_linklist">
      <h2><a href="./photos.php#body"><span class="linklist horizontal_linklist">Photos and videos </span></a>&lArr;
   <a href="./photos.php?album=' . $album . '#body"><span class="linklist horizontal_linklist"> ' .  $title[$album] . '</span></a></h2>
      </div>';

   $image_num = sprintf( "%d", $image );

   # Find the previous and next images
   $prev = $image_num > 1 ? $image_num - 1 : $size[$album];
   $next = $image_num < $size[$album] ? $image_num + 1 : 1;

   # handy variables
   $image_file = "photos/$album/$image.jpg";
   $club_URL = 'http://web.uvic.ca/~juggling/';

   # Print the photo
   echo '<div id="photo">';
   echo '<table class="header"><tr>';
   echo '<td><a href="photos.php?album=' . $album 
      . '&image=' . sprintf( "%04d", $prev ) . '#body">&larr;</a></td>';
   echo '<td>Photo ' . $image_num . ' of ' . $size[$album] . '</td>';
   echo '<td><a href="photos.php?album=' . $album
      . '&image=' . sprintf( "%04d", $next ) . '#body">&rarr;</a></td>';
   echo '</tr></table>';

   echo '<img class="photo" src="' . $image_file . '">';
   echo '<p>Direct link: <a href="' . $club_URL . $image_file . '">' . $club_URL . $image_file . '</a></p>';
   echo '</div>';

}

# }}}1
        
?>
