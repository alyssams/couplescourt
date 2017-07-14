<?php
$state = $_GET['state'];

require_once('include/DbConnector.php');
$connector = new DbConnector();



$thesql="select * from station_guide_dev where state ='".$state."' and station != ''";
$result=$connector->query($thesql);


/** @var String $dayTimeKey Key for the Days and Times column */
$dayTimeKey = "daytime"; // Set this to the database column name that contains the days and time data and you should be good to go.

while ($rs=$connector->fetchArray($result)) {
        //if ($rs['url'] == '') {
            $list .= "<li class='row'>
                                    <div class='col-sm-3 col-lg-3 city'><span class='title city-heading'>".$rs['market']."</span></div>
                                    <div class='col-sm-3 col-lg-3 station'><span class='station station-heading'>".((!empty($rs['url']))?"<a href='".$rs['url']."' target='_new'>".$rs['station']."</a>":$rs['station'])."</span></div>
                                    <div class='col-sm-6 col-lg-6 times'><span class='times times-heading'>".((!empty($rs['timeperiod']))?$rs['timeperiod']:"Coming Soon")."</span></div>
                                </li>";
            //$list .=  "<li class='clearfix'><span class='city'>".$rs['market']."</span><span class='station'></span></li>\n";
        /*} else {
            $list .=  "<li class='clearfix'><span class='city'></span><span class='station'><a href='".$rs['url']."' target='_new'>".$rs['station']."</a></span></li>\n";
        }*/
}

if ($list == "") {
      $list = "<li class='row'>
        <div class='col-sm-12 col-lg-12 city'>Sorry, this program is not available in your area at the moment</div>
    </li>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Paternity Court - Local Listings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/responsive.css" rel="stylesheet" media="screen">
    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" media="screen">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if lte IE 8]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <meta name="description" content="Join Judge Lauren Lake as she hears testimony from people involved in paternity disputes ranging from dead-beat dads to cheating spouses, from grandparents fighting for visitation rights to a boy they believe is their grandchild, to a man trying to prove he's part of a family he's never met. If it involves paternity – this show's got it covered." />
    <meta name="keywords" content="Paternity,Paternity Court,Paternity Test,Court Show,Lauren Lake" />
</head>
<body class='station-finder local-listing'>
<div class='wrapper'>
<div id='primary' class='clearfix'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>
                <nav id='top-navigation'>
                        <?php include 'header.php'?>
                </nav>
            </div>
        </div>
        <div class='row visible-sm' style='margin-top:22px;'>
            <div class='col-lg-12'>
                <img src='img/pat-small.jpg'  style='width:100%;'/>
            </div>
        </div>

        <div class='hidden-sm banner-extender'></div>
        <div class='row hidden-sm' style='margin-top:12px;position:relative;'>
            <div class='col-lg-12' id='primary-logo'>
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <h1 class='title'>Local Listings</h1>
                <h2 class='sub'>Watch Paternity Court in your area.</h2>
                <h3 class='state-name'><?php echo $state; ?></h3>
                <div class='listing-provider'>
                    <div class='row hidden-sm big-bar'>
                        <div class='col-sm-2 col-sm-offset-2 col-lg-2 col-lg-offset-2 heading city'><span class='title city-heading'>City</span></div>
                        <div class='col-sm-2 col-lg-2 heading station'><span class='station station-heading'>Station</span></div>
                        <div class='col-sm-4 col-lg-4 heading times'><span class='section-break'></span><span class='times times-heading'>Days And Times</span></div>
                    </div>
                    <div class='row visible-sm'>
                        <div class='col-sm-12 heading'><span>City, Station, Days and Times</span></div>
                    </div>

                    <div class='row'>
                        <div class='listings content col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2'>
                            <ul class='clearfix'>
                                <?php echo $list; ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
                        <?php include 'footer.php'?>

<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type='text/javascript'>
    $(".listings").mCustomScrollbar({
        scrollInertia: 0
    });
</script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-40730226-1', 'paternitycourt.tv');
        ga('send', 'pageview');

    </script>
</body>
</html>
