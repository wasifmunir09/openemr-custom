<?php
/**
 * This script sets the custom landing page as default after login
 */

require_once(__DIR__ . "/../../../globals.php");

// Update the globals to set custom landing page
$sql = "UPDATE globals SET gl_value = '/interface/modules/custom_modules/custom_landing/public/landing.php' 
        WHERE gl_name = 'default_top_pane'";
sqlStatement($sql);

echo "Custom landing page set as default!";
?>
