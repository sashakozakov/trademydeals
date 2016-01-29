<?php
include('header.php');
$membership = $_GET['membership'];
$amount = $_GET['amount'];
?>

    <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>




    <div class="content">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-9">
                    <div class="col-lg-12">
                        <div class="deals_content">
                            <h4>Sign Up</h4>
                            <!--                                action="signup_process.php?membership=--><?php //echo $membership; ?><!--&amount=--><?php //echo $amount; ?><!--"-->
                            <form
                                 action="signup_new.php"
                                method="post">
                                <div class="deals_form">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3">
                                            <p>Email Address:<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                        </div>
                                        <div class="col-lg-7">
                                            <input required type="text" name="email" class="form-control">
                                            <input type="hidden" name="membership" value="<?php echo $membership; ?>">
                                            <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top:20px;">
                                        <div class="col-lg-3">
                                            <p>Password(atleast 6 Characters):<i
                                                    style="margin-left:10px; color:#CC0000;">*</i></p>
                                        </div>
                                        <div class="col-lg-7">
                                            <input required type="password" name="password" class="form-control">
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top:20px;">
                                        <div class="col-lg-3">
                                            <p>Re-type password:<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                        </div>
                                        <div class="col-lg-7">
                                            <input required type="password" name="repassword" class="form-control">
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top:20px;">
                                        <div class="col-lg-3">
                                            <p>Nickname(optional):<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" name="nickname" class="form-control">
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top:20px;">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-7">
                                        <div class="g-recaptcha" data-sitekey="6LdefRETAAAAAL8kSwswVXiLbOECQ1rdGVTj4-O2"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top:20px;">
                                        <div class="col-lg-3"><p style="margin-left:30px; margin-top:30px;"></p></div>
                                        <div class="col-lg-7">
                                            <input type="submit" class="btn btn btn-primary pull-right btn6"
                                                   style="border-top-left-radius:10px; border-top-right-radius:10px;border-bottom-left-radius:10px; padding:12px 28px; border-bottom-right-radius:10px;"
                                                   value="Register"/>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
<?php if ($_SERVER['REMOTE_ADDR']=='77.120.168.216'){
    if(!empty($_GET['error'])){
        foreach($_GET['error'] as $eror){
           echo '<h3 style="color:#F00; alignment-adjust:middle">'.$eror.'</h3>';
        }
    }

} ?>

                    <?php $id = $_GET['id'];
                    if ($id == 1) {
                        ?>

                        <h3 style="color:#F00; alignment-adjust:middle"> Password is Not Matched</h3>
                    <?php }
                    if ($id == 2) { ?>
                        <h3 style="color:#063; alignment-adjust:middle">Email Address Already Registered</h3>

                    <?php }
                    if ($id == 3) { ?>
                        <h3 style="color:#063; alignment-adjust:middle"> Register Not Successfully </h3>

                    <?php }
                    if ($id == 21) { ?>
                        <h3 style="color:#063; alignment-adjust:middle"> successfully Registered </h3>

                    <?php } ?>
                </div>
<?php
include('footer.php');
?>