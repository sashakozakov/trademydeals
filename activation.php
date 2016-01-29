<?php
include('header.php');
include("custom_function.php");


//Post activation no register user
$code = checkIsValidMd5($_GET['code']);
$type = checkIsPostType($_GET['type']);


if( $code ) {
    $result = mysql_query("UPDATE `$type` SET `status` = 1 WHERE `activation`='$code'");
    ?>

    <div class="container">
        <div class="post-activation">
            <div class="col-md-12 col-lg-12">
                <?php
                if($result) {
                    $get_post = mysql_query("SELECT `id` FROM `$type` WHERE `activation`='$code'");
                    $post_id = mysql_fetch_array($get_post);
                    $link = getPostLink($post_id['id'],$type);
                    print "<h2>Congratulations! you have successfully active your posting. Click <a href='$link'>here</a> to see your posting</h2>";
                } else {
                    print "<h2>Activation is broken</h2>";
                }
                ?>
            </div>
        </div>
    </div>


    <?php
}

include ('footer.php');


