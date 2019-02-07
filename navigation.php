<nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                          <?php
            $query0 = "select * from categories";
            $result0 = mysqli_query($conn, $query0);
            while ($row0 = mysqli_fetch_array($result0)) {
                ?>
            <li><a href="filter_query.php?keyword='<?php echo $row0["category_name"]; ?>'"><?php echo $row0["category_name"]; ?></a></li>
            <?php } ?>
                    
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>