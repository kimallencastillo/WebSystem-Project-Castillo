<?php 
  // The file path
  $file = "uploads/cyberCert.pdf"; 
    
  // Header Content Type
  header("Content-type: application/pdf"); 
    
  header("Content-Length: " . filesize($file)); 
    
  // Send the file to the browser.
  readfile($file); 
?>