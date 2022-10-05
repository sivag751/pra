<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "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",
  "publishable_key" => "pk_live_51KxMhCHRb2G8EKHYBwiXwHwWtfQWp9tme3G4x4a39cG3lIYUuUWiElwFQtUs9kaaSPPiYEujZ7wkUVKbC3lBVaQy00k2zuP48P"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>