<?php
$page='resumes';
include('header.php');
?>
    <style>
        .slider{
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
                            <div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-15px;">
                                <h4>Feautured resumes</h4>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12" style="display:<?php echo $none_all_ads;?>;">

                        <div class="col-lg-12">
                            <?php
                            $filename = "resumes.php"; // name of this file
                            $option = array (5, 10, 25, 50, 100, 200);
                            $default = 6; // default number of records per page
                            $action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename
                            //$search=isset($_REQUEST['search'])? $_REQUEST['search']:'';
                            // $search=isset($_GET['search'])? $_GET['search']:'';


                            // $query = "SELECT * FROM `resumes` where  promote_resumes = 'high'	 ORDER BY id desc";
                            $query = "(SELECT * FROM `resumes` where  (promote_resumes = 'high' or promote_resumes = '') and payment_status = '1' ORDER BY promote_resumes DESC, date_time desc )";

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
                            $limit = "0, $nol";
                            $count = 1;


  $sql = mysql_query ("$query LIMIT $limit") or die ("Error in query: $sql".mysql_error());

                        while ($row= mysql_fetch_object($sql)) {

                            ?>
                            <div class="col-lg-4">
                                <?php
                                if ($row->promote_resumes == 'high') {
                                    echo "<div class='high'>";
                                }
                                else{
                                    echo "<div class='slider'>";
                                }
                                ?>

                                <img src="img/<?php echo get_post_image($row->id,'resumes');?>" style="max-height: 100px;"  height="100px">
                                <a href="getresumes.php?id=<?php echo $row->id; ?>"><h3 style="margin-left:20px;"><?php echo get_post_tile_string($row->resumes_title); ?></h3>
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