<?php

  // Test writing a file
  $filename = 'test.txt';
  $fp = fopen($filename, 'w');
  if (fwrite($fp, 'Hello file.') === FALSE) {
    echo "Cannot write to test file ($filename)";
    exit;
  }
  fclose($fp);
  unlink($filename);

  print_r('<div style="text-align:center">You got docker set up! Here are the details on PHP:</div>');

  phpinfo();
