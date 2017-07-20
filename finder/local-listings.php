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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Couple Court with The Cutlers Finder Station</title>
        <!-- Bootstrap core CSS -->
        <link href="./../media/css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="./../media/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Custom styles for this template -->
        <link href="./../media/css/carousel.css" rel="stylesheet">
        <link href="./../media/css/style.css" rel="stylesheet">
    </head>
    <!-- NAVBAR
    ================================================== -->
    <body class="station-finder">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <img class="navbar-brand" src="./../media/images/cc_logo.png" alt="">
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/bio">Bio</a></li>
                        <li class="active"><a href="/finder">Station Finder</a></li>
                        <li><a href="https://www.beoncouplescourt.tv" target="_blank">Be On Show</a></li>
                        <li class="social pull-right">
                            <ul>
                                <li class='twitter'><a href='https://twitter.com/CouplesCourt_TV' target="_blank">Follow the Cutlers on Twitter</a></li>
                                <li class='facebook'><a href='https://www.facebook.com/CouplesCourt' target="_blank">Follow the Cutlers on Facebook</a></li>
                                <li class='instagram'><a href='http://instagram.com/CouplesCourt' target="_blank">Follow the Cutlers on Instagram</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid finderbg">
            <div class="us-bg"></div>
        </div>
        <img class="logo-bio" src="./../media/images/cc_logo.png" alt="Couples Court with the Cutlers">
        <div class="row">
            <div class='row station-container'>
                <div class='col-lg-4 col-lg-offset-4'>
                    <h2 class='state-name'><?php echo $state; ?></h2>
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
                        <h1 class='title'>Local Listings</h1>
                        <h2 class='sub'>Watch Couple Court With The Cutlers in your area.</h2>
                    </div>
                    <h1>Local Listings</h1>
                    <h2 class='sub'>Watch Couples Court With The Cutlers in your area.</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid info">
        <div class="jumbotron footer">
        M &amp; &copy; Orion TV Productions, Inc. All Rights Reserved. Advertisements Do No Constitute Endorsement By Orion Television Or By Any Person(s) Pictured On This Page. Use Of This Site Constitutes Your Acceptance Of These Terms Of Use And Privacy Policy. <img src="./../media/images/orion.jpg" alt="Orion">
      </div>
      </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="./../media/js/jquery.min.js"><\/script>')</script>
<script src="./../media/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./../media/js/ie10-viewport-bug-workaround.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="./../media/js/main.js"></script>
<script src="http://www.paternitycourt.tv/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type='text/javascript'>
$(".listings").mCustomScrollbar({
scrollInertia: 0
});
</script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-102187534-1', 'auto');
ga('send', 'pageview');

</script>
</body>
</html>