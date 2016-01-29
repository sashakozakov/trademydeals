<?php
include('header.php');
$pid=$_GET['id'];
$product=$_GET['product'];
$uid=$_GET['uid'];
$select=mysql_query("SELECT * FROM $product WHERE id='$pid'");
$change=mysql_fetch_array($select);
?>
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler hidden-phone">
                    </div>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                </li>

                <li class="start active ">
                    <a href="index.php">
                        <i class="fa fa-home"></i>
						<span class="title">
							Dashboard
						</span>
						<span class="selected">
						</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
						<span class="title">
							User Account
						</span>
						<span class="arrow ">
						</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="account.php">
                                <i class="fa fa-bullhorn"></i>
                                Account
                            </a>
                        </li>
                        <li>
                            <a href="newaccount.php">
                                <i class="fa fa-shopping-cart"></i>
                                New Account
                            </a>
                        </li>
                        <li>
                            <a href="deleteaccount.php">
                                <i class="fa fa-tags"></i>
                                Delete Account
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
						<span class="title">
							Category
						</span>
						<span class="arrow ">
						</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="dealscategory.php?main_menu_id=<?php echo '1'; ?>">
                                Deals Category
                            </a>
                        </li>
                        <li>
                            <a href="couponcategory.php?main_menu_id=<?php echo '2'; ?>">
                                Coupon Category
                            </a>
                        </li>
                        <li>
                            <a href="adscategory.php?main_menu_id=<?php echo '4'; ?>">
                                Ads Category
                            </a>
                        </li>
                        <li>
                            <a href="othercategory.php?main_menu_id1=<?php echo '3'; ?>&main_menu_id2=<?php echo '5'; ?>&main_menu_id3=<?php echo '6'; ?>">
                                Other Category
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-bookmark-o"></i>
						<span class="title">
							Membership
						</span>
						<span class="arrow ">
						</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="free membership.php">
                                Free
                            </a>
                        </li>
                        <li>
                            <a href="promembership.php">
                                Pro
                            </a>
                        </li>
                        <li>
                            <a href="goldmembership.php">
                                Gold
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        View Account Details
                    </h3>

                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row profile">
                <div class="col-md-12">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom tabbable-full-width">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                    Edit
                                </a>
                            </li>

                        </ul><form action="/classes/Common.class.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                            <?php
                            $billingQuery=mysql_query("SELECT * FROM paypal_log WHERE user_id=".$uid." and id=".$pid."");
                            $billingDetail=mysql_fetch_array($billingQuery);
                            $txn_id = $billingDetail['txn_id'];
                            $paymentQuery = mysql_query("SELECT id,payer_email,payment_status,product_name FROM purchases WHERE trasaction_id='".$txn_id."'");
                            $paymentResult = mysql_fetch_array($paymentQuery);
                            $postDate = strtotime($billingDetail['posted_date']);
                            $date = date('m/d/Y',$postDate);

                            ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <input type="hidden" name="pid" value="<?php echo $pid; ?> " />
                                    <input type="hidden" name="uid" value="<?php echo $uid; ?> " />
                                  <!--  <input type="hidden" name="txn_id" value="<?php /*echo $txn_id; */?> " />-->
                                    <input type="hidden" name="payment_id" value="<?php echo $paymentResult['id']; ?> " />
                                    <input type="hidden" name="func" value="update_billing" />

                                    <div class="form-group">
                                        <label for="txn_id" class="col-sm-2 control-label">Oreder ID</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $billingDetail['txn_id']; ?>"  class="form-control" name="txn_id" id="txn_id" placeholder="Oreder ID">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_status" class="col-sm-2 control-label">Product Name</label>
                                        <div class="col-sm-6">
                                       <?php echo $paymentResult['product_name']; ?>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_status" class="col-sm-2 control-label">Payment Status</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $paymentResult['payment_status']; ?>"  class="form-control" name="payment_status" id="payment_status" placeholder="Payment Status">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="date" class="col-sm-2 control-label">Payment Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $date; ?>"  class="form-control" name="date" id="date" placeholder="Payment Date">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="payer_email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $paymentResult['payer_email']; ?>"  class="form-control" name="payer_email" id="payer_email" placeholder="Email">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-sm-2 control-label">Type</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $userdetail['status']; ?>"  class="form-control" name="status" id="status" placeholder="Type">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="payment" class="col-sm-2 control-label">Payment Method</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $billingDetail['payment']; ?>"  class="form-control" name="payment" id="payment" placeholder="Payment Method">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="col-lg-6" style="text-align:center;">
                                            <button type="submit" class="btn green btn-sm">Update</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Cancel</a>
<!--                                            <button type="reset" class="btn green btn-sm">Cancel</button>-->
                                        </div>

                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <!--END TABS-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>
<script  src="../js/jquery.maskedinput.js"></script>

<script>
    jQuery(document).ready(function() {
        $('#date').mask("99/99/9999", {placeholder: 'DD/MM/YYYY' });
        App.init();
        MapsGoogle.init();
    });
</script>

<!-- END BODY -->
</html>