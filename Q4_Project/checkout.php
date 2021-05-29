<?php
$cust_name = isset($_POST['cust_name'])?$_POST['cust_name']:"<i>Nothing passed</i>";
$cust_addr = isset($_POST['cust_addr'])?$_POST['cust_addr']:"<i>Nothing passed</i>";
$cust_email = isset($_POST['cust_email'])?$_POST['cust_email']:"<i>Nothing passed</i>";
$cust_order = isset($_POST['cust_order'])?$_POST['cust_order']:"";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Checkout Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Checkout Page</h1>
                <p>This page fulfills the order from your online shopping page by confirming the received data.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-3">Delivery Details</h3>
                    <h5><?php echo $cust_name; ?><br><small class="text-muted">Name</small></h5>
                    <h5><?php echo $cust_email; ?><br><small class="text-muted">Email</small></h5>
                    <h5><?php echo $cust_addr; ?><br><small class="text-muted">Address</small></h5>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3">Online Cart</h3>
                    <div class="card">
                        <ul id="pageCart" class="list-group list-group-flush">
                            
                        </ul>
                        <div class="card-footer">
                            <strong>Total</strong>: Php <span id="pageTotal">0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var custOrderString = '<?php echo $cust_order;?>';
            console.log(custOrderString);
            if(custOrderString != "") {
                var custOrder = JSON.parse(custOrderString);
                var cartTotal = 0;
                    for(var i=0; i<custOrder.length; i++) {
                        document.getElementById('pageCart').innerHTML += "<li class='list-group-item'><strong>" + custOrder[i].prod_name + "</strong><br>" + custOrder[i].prod_price + "</li>";
                        cartTotal += custOrder[i].prod_price;
                    }
                    document.getElementById('pageTotal').innerHTML = cartTotal;
            } else {
                document.getElementById('pageCart').innerHTML = '<li class="list-group-item"><em>Nothing passed</em></li>';
            }
        </script>
    </body>
</html>