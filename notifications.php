<?php
include("header.php");

$post_id = $_GET['id'];
$post_type = checkIsPostType($_GET['type']);
$check = mysql_query( "SELECT * from {$post_type} WHERE id={$post_id} AND status=1");
?>

<div class="container">
    <div class="post-activation">
        <div class="col-md-12 col-lg-12">
            <?php
                if($check) {
                    print "<h2>An email was sent, please follow the instructions in the email to activate your posting on www.trademydeals.com </h2>";
                } else {
                    print "<h2>Post can't be found...</h2>";
                }
            ?>
        </div>
    </div>
</div>
<?php
include("footer.php");