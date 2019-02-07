<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container center-block" style="text-align: center">
            <ul class="header-links center-block">
                <li><a href="#"><i class="fa fa-phone"></i> 0751328495</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> mwaniakyalo@gmail.com</a></li>
                
            </ul>

        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <h2 style="color: white">Brainchild</h2>
                            <p style="color:white">Shaking the Tech World</p>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-4">
							<div class="header-search">
                            <form>
									
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-5 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="index.php">
                   

                            <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                           
                        </div>
                        <div>
                            <a href="store.php">
                   

                            <i class="fa fa-shopping-basket"></i>
                                <span>Shop</span>
                            </a>
                           
                        </div>
                        <div>
                        <a href="cart.php"class="" >
                        <i class="fa fa-shopping-cart"></i>
                                

                                <span>Cart</span>
                                <div class="qty"><?php echo $_SESSION['itemsincart']; ?></div>

                            </a>

                           
                        </div
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="">
                            <a href="checkout.php"class="" >
                                <i class="fa fa-credit-card"></i>
                                

                                <span>Checkout</span>
                                

                            </a>


                        </div>
                       
                       
                           

                        

                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                         
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>