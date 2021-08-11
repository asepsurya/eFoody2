<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/../Midtrans.php';
//Set Your server key
Config::$serverKey = "SB-Mid-server-q_E6lRDxEPyAgodOYFW5dtF9";
// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 94000, // no decimal allowed for creditcard
);
// Optional
$item_details = array (
    array(
        'id' => 'a1',
        'price' => 94000,
        'quantity' => 1,
        'name' => "Apple"
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => "Andri",
    'last_name'     => "Litani",
    'email'         => "andri@litani.com",
    'phone'         => "081122334455",
    'billing_address'  => "aasad",
    'shipping_address' => $shipping_address
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Snap::getSnapToken($transaction);
echo "snapToken = ".$snapToken;
?>
<button id="pay-button">Pay!</button>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ik5hl2jz7zCIDyol"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>');
            };
        </script>

