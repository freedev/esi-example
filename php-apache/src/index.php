<?php 
$maxage=3600;

header("Cache-Control: public, s-maxage=".$maxage." cache-maxage=".$maxage);
// header("Edge-Control: public, s-maxage=".$maxage." cache-maxage=".$maxage);
// header("CDN-Cache-Control: max-age=".$maxage);
// header("AKAMAI-Cache-Control: max-age=".$maxage);

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
  <H1> <b>BODY HTML (s-maxage: <?php echo $maxage ?>):</b>  <?php echo date("h:i:s"); ?> </h1>

  <header>
    <!-- esi:include src="http://ec2-44-217-110-182.compute-1.amazonaws.com/header.php" / -->
    <esi:include src="header.php" ttl="5s" no-store="off" />
  </header>


  <main>
    <esi:include src="main.php" ttl="30s" no-store="off" />
  </main>

  <footer>
    <esi:include src="footer.php" ttl="10s" no-store="off" />
  </footer>

</body>
</html>
