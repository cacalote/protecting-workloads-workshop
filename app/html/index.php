<?php
// set utc time
date_default_timezone_set('UTC');

// Include the SDK using the Composer autoloader
require('../vendor/autoload.php');

// include output module
require('modules/output.php');

// start a session
session_start();

// output variables
$output = array();
$template = '';

// try/catch
try {
  // include header logic
  require('_header.php');

	// get template and replace placeholders
	$template .= file_get_contents('includes/index.html');

  // include footer logic
  require('_footer.php');

  // render content
	outputContent($template, $output);
} catch (Exception $ex) {
  // render error
  outputError($ex->getMessage());
}
