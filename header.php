<?php

require_once("LoremIpsum.php");

$maxage=0;
header("Cache-Control: no-cache, must-revalidate, s-maxage=".$maxage); //HTTP 1.1

function rand_color() {
  return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

$lipsum = new LoremIpsum();
$lipsum->words(3);
?>

<div style="border-style:dotted;  margin: 20px;" >
  <h1> <b>FRAGMENT HEADER (maxage: <?php echo $maxage ?>)</b>: <?php echo date("h:i:s"); ?> </h1>
  <div style="background-color: yellow; ?>">
    <h1>Welcome to My Web Page</h1>
    <nav>
      <ul>
        <li><a href="#about">About <?php echo $lipsum->words(3); ?></a></li>
        <li><a href="#services">Services <?php echo $lipsum->words(3); ?></a></li>
        <li><a href="#contact">Contact <?php echo $lipsum->words(3); ?></a></li>
      </ul>
    </nav>
    <?php echo $lipsum->sentences(5); ?>
  </div>
</div>

