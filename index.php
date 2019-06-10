<?php

  $title = '글글글';

  ob_start();

  include __DIR__ . './template/home.html.php';

  $output = ob_get_clean();

  include __DIR__ . './template/layout.html.php';


 ?>
