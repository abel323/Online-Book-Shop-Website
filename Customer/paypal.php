
<!DOCTYPE html>
<?php
session_start();
    $total = 0;
    if(isset($_SESSION['total'])){
        $total = $_SESSION['total'];
    }
    else{
        echo "<script>alert('Your cart is empty!');</script>";
        header('Location index.php');
    }
?>
<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AQZ0HwPAZ9_NBvRgf07PFX-T3H9W7N6lLmHJOx1H_U1seaDhGo48_pBvejisJ7-giJnwMzVp8WnzcCHy&locale=en_US"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total ?>'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
    