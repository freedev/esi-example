<?php

$maxage=10;

header("Cache-Control: public, s-maxage=".$maxage); 

function rand_color() {
  return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

?>

<div style="border-style:dotted;  margin: 20px;" >
  <h1> <b>FRAGMENT FOOTER (maxage: <?php echo $maxage ?>)</b>: <?php echo date("h:i:s"); ?> </h1>
  <div style="background-color: red; ?>">
  <section id="footer" >
        <p>&copy; 2021 My Web Page. All rights reserved. <?php echo date("h:i:s"); ?></p>
        <address>Milan, Italy<br>
          Phone: (123) 456-7890<br>
          Email: info@mywebpage.com
        </address>
  </section>
</div>
</div>
