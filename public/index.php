<?php

  /**
   * Test writing a file
   */
  $filename = 'test.txt';
  $fp = fopen($filename, 'w');
  if (fwrite($fp, 'Hello file.') === FALSE) {
    echo "Cannot write to test file ($filename)";
    exit;
  }
  fclose($fp);
  unlink($filename);

  /**
   * Test MySQL
   */
  print_r('<div style="margin: 20px;text-align:center">');

  $link = mysqli_connect("mysql", "develop", "developpass", "example");

  if (!$link) {
      print_r("Error: Unable to connect to MySQL.");
      print_r("Debugging errno: " . mysqli_connect_errno());
      print_r("Debugging error: " . mysqli_connect_error());
      exit;
  }
  
  print_r("Success: A proper connection to MySQL was made! (" . mysqli_get_host_info($link) . ")");
  print_r('</div>');

  mysqli_close($link);

  /**
   * PHP Info
   */
  print_r('<div style="text-align:center">You got docker set up! Here are the details on PHP:</div>');

  phpinfo();
