#!/usr/bin/perl

# Translate the instructor biographies from LibreOffice's HTML export of
# Karina's spreadsheet into the format I use. They require some manual
# tweaking afterwards.

use strict;
use warnings;
use utf8;

my $fin = "bios-raw.html";
my $line = undef;
my $indent = "            ";

open( my $fh, "<", $fin ) or die( "Can't open $fin" );

while ( $line = <$fh> ) 
{
   if ( $line =~ "<TR>" )
   {
      # Instructors {{{1

      # Get the name
      <$fh> =~ m!\s*<TD[^>]*><B>(.*)</B></TD>!;
      my $instructor = $1;

      # Skip ahead of this isn't a real instructor
      next if ( ! defined $instructor  || $instructor eq "<BR>" );

      # Process
      $instructor =~ s/\s*\(Posted\)//i;
      $instructor =~ m!^(\w*)!;

      print "$indent<a name='$1'></a>\n";
      print "$indent<h2>$instructor</h2>\n";

      # Bio {{{1

      # Get the bio
      <$fh> =~ m!\s*<TD[^>]*>(.*)</TD>!;
      my $bio = $1;

      if ( defined $bio && $bio ne "<BR>" )
      {
         $bio =~ s!(</?FONT[^>]*>|</?B>)!!g;
         $bio = "$indent<p>$bio\n";
         print $bio;
      }

      # Workshops {{{1
      print "$indent<ul>\n";

      for my $i ( 1..2 )
      {
         <$fh> =~ m!\s*<TD[^>]*>(.*)</TD>!;
         my $workshop = $1;

         if ( defined $workshop && $workshop ne "<BR>" )
         {
            $workshop =~ s!</?(FONT)[^>]*>!!g;
            $workshop =~ s!(<BR>)+$!!g;
            $workshop =~ s!(<BR>)(<BR>)*!$1!g;
            print "$indent   <li>$workshop</li>\n";
         }
      }
      print "$indent</ul>\n";

      # }}}1

      print "\n";
   }
}


