<?php
$page='deals';
include('header.php');
?>
    <style>
        .slider, .high{
            height:230px;
        }
        .btn5{
            margin-bottom:0px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <div class="content">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-9">
                    <div class="col-lg-12">
                        <div class="col-lg-10" style="width:100%">
                            <div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                                <h4>Featured deals</h4>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12" style="display:<?php echo $none_all_ads;?>;">

                        <div class="col-lg-12">
                            <?php
                            $filename = "deals.php"; // name of this file
                            $option = array (5, 10, 25, 50, 100, 200);
                            $default = 12; // default number of records per page
                            $action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename
                            //$search=isset($_REQUEST['search'])? $_REQUEST['search']:'';
                            // $search=isset($_GET['search'])? $_GET['search']:'';


                            /*$query = "SELECT * FROM `deals` where  promote_deals = 'high' ORDER BY date_time desc ";*/
                            $query = "(SELECT * FROM `deals` where  (promote_deals = 'high' or promote_deals = '') and payment_status = '1' ORDER BY promote_deals DESC, date_time desc )";

                            /*echo $query = "(SELECT * FROM `deals` where  promote_deals = 'high' and payment_status = '1' ORDER BY promote_deals desc, date_time desc ) UNION
                                        (SELECT * FROM `deals` where  promote_deals = '' and payment_status = '1' ORDER BY date_time desc )";*/

                            // database query. Enter your query here
                            // end config---------------------------------

                            $opt_cnt = count ($option);
                            $go=isset($_GET['go'])? $_GET['go']:'';

                            // paranoid
                            if ($go == "") {
                                $go = $default;
                            }
                            elseif (!in_array ($go, $option)) {
                                $go = $default;
                            }
                            elseif (!is_numeric ($go)) {
                                $go = $default;
                            }
                            $nol = $go;
                            $start = (isset($_GET['offset']) && $_GET['offset'] != '') ? (($_GET['offset']-1)*$default) : 0;

                            $limit = "$start, $nol";
                            $count = 1;



                            $sql = mysql_query ("$query LIMIT $limit") or die ("Error in query: $sql".mysql_error());

                            while ($row= mysql_fetch_object($sql)) {
                            ?>
                            <div class="col-lg-4">
                                <?php
                                if ($row->promote_deals == 'high') {
                                    echo "<div class='high'>";
                                }
                                else{
                                    echo "<div class='slider'>";
                                }
                                ?>

                                <img src="img/<?php echo get_post_image($row->id,'deals');?>" class="img-responsive">
                                <a href="getdeals.php?id=<?php echo $row->id; ?>"><h3><?php echo get_post_tile_string($row->deals_title); ?></h3>
                                    <p><?php echo substr($row->description,0,15).'...'; ?></p>
                                    <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                </a> </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>

            </div>


<?php
include('footer.php');
?>