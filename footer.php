<?php

$maxage=10;

header("Cache-Control: public, s-maxage=".$maxage); 

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

?>

<div style="background-color:<?php echo rand_color(); ?>" >
  <h1> <b>FRAGMENT FOOTER (maxage: <?php echo $maxage ?>)</b>: <?php echo date("h:i:s"); ?> </h1>
      <p>&copy; 2021 My Web Page. All rights reserved.</p>
      <address>Milan, Italy<br>
        Phone: (123) 456-7890<br>
        Email: info@mywebpage.com
      </address>
</div>