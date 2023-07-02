

<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">

                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">FANS<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <?php 
                                include('Dbcon.php');
                                $sql_subcat='select * from sub_catagory where cat_id = 1';
                                $subcat_r = mysqli_query($conn,$sql_subcat);
                                while($subcat = mysqli_fetch_array($subcat_r)){ ?>
                            
                                <a href="" class="dropdown-item"><?php echo $subcat['sub_cat_name']; ?></a>
                                <?php } ?>
                                <!-- <a href="" class="dropdown-item">Pedestal Fans</a>
                                <a href="" class="dropdown-item">Exhaust fans</a>
                                <a href="" class="dropdown-item">Box Fans</a>
                                <a href="" class="dropdown-item">Wall Fans</a>
                                <a href="" class="dropdown-item">Table Fans</a> -->
                            </div>
                        </div>

                            <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">SEWING MACHINES<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Industrial Sewing Machines</a>
                                <a href="" class="dropdown-item">Domestic Sewing Machine</a>
        
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">KITCHEN ITEMS<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Rice Cookers</a>
                                <a href="" class="dropdown-item">Mixer Grinders</a>
                                <a href="" class="dropdown-item">Cooktops</a>
                                <a href="" class="dropdown-item">Electric Kettles</a>
                                <a href="" class="dropdown-item">Sandwich Toaster</a>
        
                            </div>
                        </div>
                    </div>
                </nav>