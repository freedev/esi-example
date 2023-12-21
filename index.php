<?php 
$maxage=4;

header("Cache-Control: public, s-maxage=".$maxage);

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

?>
<html>
<style>

.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
  width: 400px;
  border: 3px solid green;
}

</style>
<body style="background-color:<?php echo rand_color(); ?>">
  <H1> <b>BODY HTML (maxage: <?php echo $maxage ?>):</b>  <?php echo date("h:i:s"); ?> </h1>

  <header>
    <esi:include src="/esi-test/header.php" />
  </header>


  <main>
    <esi:include src="/esi-test/main.php" />
  </main>

  <footer>
    <esi:include src="/esi-test/footer.php" />
  </footer>

</body>
</html>
