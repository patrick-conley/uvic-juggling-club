<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

   <!-- The document body starts at line 40. Don't change anything before or after this -->

   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <meta http-equiv="Content-Style-Type" content="text/css">
      <link rel="stylesheet" type="text/css" href="./stylesheet.css">
      <link rel="shortcut icon" href="http://web.uvic.ca/~juggling/images/favicon.ico">

      <title>Tickets | VJFF 2016</title>
   </head>

   <body>

      <!-- top content -->
      <div id="banner-topcontent">
         <!-- content for this section is automatically generated and unchanged between pages-->
         <?php include("topmenu.php"); ?>
      </div>

      <div id="body">

         <!-- left content -->
         <div id="leftcontent">
            <!-- content for this section is automatically generated and unchanged between pages-->
            <?php include("leftmenu.php"); ?>
         </div>

         <div id="maincontent">

            <!-- BODY -->
            <h2>Prices and tickets</h2>


            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
               <input type="hidden" name="cmd" value="_s-xclick">
               <input type="hidden" name="hosted_button_id" value="5LH6LYYDNRLZU">
               <table>
                  <tr><td><input type="hidden" name="on0" value="Ticket Type">Ticket Type</td></tr>
                  <tr><td><select name="os0">
                     <option value="Full Weekend Pass (includes show)">Full Weekend Pass (includes show) $40.00 CAD</option>
                     <option value="UVic Student (with I.D)">UVic Student (with I.D) $30.00 CAD</option>
                     <option value="Festival T-Shirt (pre-orders only)">Festival T-Shirt (pre-orders only) $10.00 CAD</option>
                  </select> </td></tr>
                  <tr><td><input type="hidden" name="on1" value="UVic Student ID:">UVic Student ID:</td></tr>
                  <tr><td><input type="text" name="os1" maxlength="200"></td></tr>
               </table>
               <input type="hidden" name="currency_code" value="CAD">
               <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
               <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>


            <p>
            All tickets are given in Canadian dollars. Tickets will be
            available at the door (at UVic) starting 4pm Friday, or at the
            Equimalt High theatre prior to the show.  We can only accept cash.
            </p>

            <hr>

            <dl>
               <dt>Full pass (includes all three days and both shows)</dt>
               <dd> <table>
                  <tr>
                     <td width="250px">General</td>
                     <td>$40 ($34.50 until Jan 15)</td>
                     </tr><tr>
                     <td>UVic students (with ID)</td>
                     <td>$30</td>
                  </tr>
               </table> </dd>

               <dt>Day pass</dt>
               <dd> <table>
                  <tr>
                     <td width="250px">Everyone</td>
                     <td>$10</td>
                  </tr>
                  <tr>
                     <td>Children under 12</td>
                     <td>Free</td>
                  </tr>
               </table> </dd>

               <dt>Public show</dt>
               <dd> <table>
                  <tr>
                     <td width="250px">Adults</td>
                     <td>$20</td>
                  </tr>
                  <tr>
                     <td>Students/Seniors/Youth</td>
                     <td>$15</td>
                  </tr>
                  <tr>
                     <td>With full pass</td>
                     <td>Free</td>
                  </tr>
               </table> </dd>
            </dl>

         </div>

         <!-- right content -->
         <div id="rightcontent">
            <?php include("rightmenu.php"); ?>
         </div>

      </div>

      <!-- bottom content -->
      <div id="bottomcontent">
         <!-- content for this section is automatically generated and unchanged between pages-->
         <?php include("bottommenu.php"); ?>
      </div>

   </body>
</html>
