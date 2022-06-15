<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("logo.php");?>      
        <div class="app-main">
        	<!-- include navigation -->
            <?php include 'nav.php'; ?>
            <!-- end of nav -->
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div>Checklist Dashboard
                                    <div class="page-title-subheading">Every Search tokens are deducted, while every addition attracts free search tokens
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="<?php echo $_SESSION['business_type']?>" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>    
                        </div>
                    </div>            
                     <!-- DASHEBOARD -->
                    <span class="Dashboard" id="Dashboard"></span>           
                    <!-- DASHEBOARD -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Purchase Search Tokens
                                    <div class="btn-actions-pane-right">
                                        
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Phone Number</label>
                                                <input type="text" name="phonenumber" id="phonenumber" class="form-control" required placeholder="+260*****">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="mb-2">Amount</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="currency" id="currency">
                                                        <option value="ZMW">Zambian Kwacha - ZMW</option>
                                                        <option value="USD">United State of America - USD</option>
                                                        <option value="RND">South African Rand - RND</option>
                                                    </select>
                                                    <input type="number" name="amount" id="amount" class="form-control" step="any" min="10" placeholder="10" required>
                                                </div>
                                                <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email']?>">
                                                <input type="hidden" name="parent_id" id="parent_id" value="<?php echo base64_encode($_SESSION['parent_id'])?>">
                                            </div>
                                            <button type="button" class="button-34" onClick="makePayment()">Pay Now</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-between card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- FOOTER -->
                <?php include 'footer.php'; ?> 
                <!-- FOOTER END -->    
            </div>
        </div>
    </div>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script>
        
        function makePayment() {
            var parent_id   = document.getElementById('parent_id').value;
            var phonenumber = document.getElementById('phonenumber');
            var email       = document.getElementById('email').value;
            var currency    = document.getElementById('currency').value;
            var amount      = document.getElementById('amount');
            var rand        = Math.random();
            var username    = "<?php $_SESSION['fullnames']?>";

            if (phonenumber.value == "") {
                phonenumber.focus();
                errorNow("Phone Number is required");
                return false;
            }

            if (amount.value === "") {
                amount.focus();
                errorNow("Amount is required");
                return false;
            }

            if (amount.value < 10) {
                amount.focus();
                errorNow("Amount should be K10.00 or more");
                return false;
            }

            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-e5fa271a124685e29bf24120770dcdbc-X",
                tx_ref: email+phonenumber.value,
                amount: amount.value,
                currency: currency,
                country: "",
                payment_options: " ",
                redirect_url: // specified redirect URL
                'http://localhost/2remote.com/car-hiring/token-payment?parent_id='+parent_id+'&phonenumber='+phonenumber.value+'&email='+email+'&username='+username+'&currency='+currency+'&amount='+amount,
                    meta: {
                    consumer_id: rand,
                    consumer_mac: "92a3-912ba-1192a",
                },

                customer: {
                    email: email,
                    phone_number: phonenumber,
                    name: username,
                },
                callback: function (data) {
                    console.log(data);
                },

                onclose: function() {
                    // close modal
                },

                customizations: {
                    title: "Checklistr Subscription",
                    description: " Tokens",
                    logo: "https://weblister.co/images/icon_new.png",
                },
            });
        }
    </script>
</body>
</html>
