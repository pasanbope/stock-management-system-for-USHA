

<nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        
                        <?php 
                                include('Dbcon.php');
                                $sql_cat='select * from category ';
                                $cat_r = mysqli_query($conn,$sql_cat);
                                while($cat = mysqli_fetch_array($cat_r)){ 
                                    $cat_id=$cat['cat_id'];
                                    ?>
                            <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><?php echo $cat['name']; ?> <i class="fa fa-angle-down float-right mt-1"></i></a>
                            
                            
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <?php 
                        
                                $sql_subcat="select * from sub_catagory where cat_id = $cat_id";
                                $subcat_r = mysqli_query($conn,$sql_subcat);
                                while($subcat = mysqli_fetch_array($subcat_r)){ ?>
                                 <a href="shop.php?subcat=<?php echo $subcat['subcat_id']; ?>" class="dropdown-item"><?php echo $subcat['sub_cat_name']; ?></a>
                                <?php } ?>
                            </div></div>
                            <?php } ?>
                        
                </nav>