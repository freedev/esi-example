<?php

require_once("LoremIpsum.php");

$maxage=30;

header("Cache-Control: public, s-maxage=".$maxage); 

function rand_color() {
  // return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
  return 'grey';
}

$lipsum = new LoremIpsum();

?>
<div style="border-style:dotted; margin: 20px;" >
  <h1> <b>FRAGMENT MAIN (s-maxage: <?php echo $maxage ?>)</b>: <?php echo date("h:i:s"); ?> </h1>
  <div style="background-color:<?php echo rand_color(); ?>">
    <section id="about" >
      <h2>About Us</h2>
      <p>We are a web development company that...</p>
    </section>
    <section id="services" >
      <h2>Our Services</h2>
      <ul>
        <li>Web Design <?php echo $lipsum->words(3); ?></li>
        <li>Web Developmen <?php echo $lipsum->words(3); ?>t</li>
        <li>Search Engine Optimization  <?php echo $lipsum->words(3); ?></li>
      </ul>
    </section>
    <?php echo $lipsum->sentences(5); ?>
  </div>
</div>