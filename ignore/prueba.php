<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <?php
      for ($i = 0; $i < 2; $i++) {
    ?>
    <select id="select<?php echo $i; ?>"
    onchange="x('<?php echo $i; ?>')">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
    <br>
    <br>
    <?php
      }
    ?>
    <script src="prueba.js"></script>
  </body>
</html>
