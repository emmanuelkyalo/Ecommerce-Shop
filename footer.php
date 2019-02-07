
        <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Sign Up for our<strong> AMAZING OFFER ALERTS</strong></p>
                            <form method="post" >
                                <input class="input" type="email" name="email" placeholder="Enter Your Email">
                                <button class="newsletter-btn" name="newsletter1" type="submit"><i class="fa fa-envelope"></i> Subscribe</button>
                            </form>
                            <?php 
                            if (isset($_POST["newsletter1"])) {
                                $mail = mysqli_real_escape_string($conn, $_POST["email"]);
                                $sql = "insert into emails (email) values('$mail')";
                                $row = mysqli_query($conn, $sql);
                                ?>
                            <script type="text/javascript">

alert("Subscription Successful!");
    history.back();



</script> 
                            <?php

                        }

                        ?>
                            <ul class="newsletter-follow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-telegram"></i></a>
                                </li>
                                 <li>
                                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /NEWSLETTER -->

        <!-- FOOTER -->
        <footer id="footer">
            <!-- top footer -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="" style="text-align: center">
                            <div class="footer">
                                <h3 class="footer-title">Contact Us</h3>
                                <p> For enquiries,suggestions and complains,visit us or contact us</p>
                                <ul class="footer-links">
                                    <li><a href="admin/login.php"><i class="fa fa-map-marker"></i>Park Road</a></li>
                                    <li><a><i class="fa fa-phone"></i>0751 328 495</a></li>
                                    <li><a href=""><i class="fa fa-envelope-o"></i>mwaniakyalo@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>

                       
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /top footer -->

            <!-- bottom footer -->
            <div id="bottom-footer" class="section">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="footer-payments">
                                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                            </ul>
                      
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /bottom footer -->
        </footer>
        <!-- /FOOTER -->

        <!-- jQuery Plugins -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/nouislider.min.js"></script>
        <script src="js/jquery.zoom.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>