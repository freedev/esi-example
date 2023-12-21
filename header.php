<?php

$maxage=0;
header("Cache-Control: no-cache, must-revalidate, s-maxage=".$maxage); //HTTP 1.1

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

?>

<div style="background-color:<?php echo rand_color(); ?>" >
  <h1> <b>FRAGMENT HEADER (maxage: <?php echo $maxage ?>)</b>: <?php echo date("h:i:s"); ?> </h1>
  <h1>Welcome to My Web Page</h1>
  <nav>
    <ul>
      <li><a href="#about">About</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>
</div>

