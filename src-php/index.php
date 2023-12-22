<?php 
$maxage=3600;

header("Cache-Control: public, s-maxage=".$maxage);

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
<body>
  <H1> <b>BODY HTML (maxage: <?php echo $maxage ?>):</b>  <?php echo date("h:i:s"); ?> </h1>

  <header>
    <esi:include src="header.php" />
  </header>


  <main>
    <esi:include src="main.php" />
  </main>

  <footer>
    <esi:include src="footer.php" />
  </footer>

</body>
</html>
