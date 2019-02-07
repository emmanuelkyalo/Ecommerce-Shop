<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">
            <?php
            $query0 = "select * from categories";
            $result0 = mysqli_query($conn, $query0);
            while ($row0 = mysqli_fetch_array($result0)) {
                ?>



                <div class="input-checkbox">

                    <label for="category-1">
                        <span></span>
                        <a href="filter_query.php?keyword='<?php echo $row0["category_name"]; ?>'"><?php echo $row0["category_name"]; ?></a>
                        <small></small>
                    </label>
                </div>


            <?php } ?>

        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->

    <!-- /aside Widget -->

    <!-- aside Widget -->
  
    <!-- /aside Widget -->

    <!-- aside Widget -->

    <!-- /aside Widget -->
</div>