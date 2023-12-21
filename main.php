<?php

$maxage=30;

header("Cache-Control: public, s-maxage=".$maxage); 

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

?>

<div style="background-color:<?php echo rand_color(); ?>" >
  <h1> <b>FRAGMENT MAIN (maxage: <?php echo $maxage ?>)</b>: <?php echo date("h:i:s"); ?> </h1>
  <section id="about">
    <h2>About Us</h2>
    <p>We are a web development company that...</p>
  </section>
  <section id="services">
    <h2>Our Services</h2>
    <ul>
      <li>Web Design</li>
      <li>Web Development</li>
      <li>Search Engine Optimization</li>
    </ul>
  </section>
</div>