<?php

  $title = '글글글';

  ob_start();

  include './template/home.html.php';

  $output = ob_get_clean();

  include './template/layout.html.php';


 ?>
