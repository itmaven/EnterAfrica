
<?php require_once('Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}



mysql_select_db($database_conn, $conn);
 mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET CHARACTER SET utf8');
$query_cities = "SELECT ID, ArName FROM city";
$cities = mysql_query($query_cities, $conn) or die(mysql_error());
$row_cities = mysql_fetch_assoc($cities);
$totalRows_cities = mysql_num_rows($cities);

$colname_tourism_type = "-1";
if (isset($_GET['type'])) {
  $colname_tourism_type = $_GET['type'];
}



mysql_select_db($database_conn, $conn);
$query_tourism_type = sprintf("SELECT ID, ArTourismType FROM tourismtype WHERE ID = %s", GetSQLValueString($colname_tourism_type, "int"));
$tourism_type = mysql_query($query_tourism_type, $conn) or die(mysql_error());
$row_tourism_type = mysql_fetch_assoc($tourism_type);
$totalRows_tourism_type = mysql_num_rows($tourism_type);


$colname_id = "-1";
if (isset($_GET['id'])) {
  $colname_id = $_GET['id'];
}
 
  
mysql_select_db($database_conn, $conn);
$query_programs = "SELECT ID, ArTitle, ImageURL, TripCode, Price, DateFrom, DateTo,ArContent, SpecialOffer FROM tourismprogram WHERE ID=".GetSQLValueString($colname_id, "int");
$programs = mysql_query($query_programs, $conn) or die(mysql_error()."   ".$query_programs);
$row_programs = mysql_fetch_assoc($programs);
$totalRows_programs = mysql_num_rows($programs);


?>

<!DOCTYPE html>
<html lang="ar"><!-- InstanceBegin template="/Templates/template-ar.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<title><?php echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/styles/main-ar.css" rel="stylesheet" type="text/css" media="all">
<link href="assets/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
    <!-- Bootstrap core CSS -->
    <link href="assets/styles/bootstrap.min-cutom-ar.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
<!--[if lt IE 9]>
<link href="assets/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="assets/scripts/ie/html5shiv.min.js"></script>
<![endif]-->
	<!-- Start Banner HEAD section -->
	<link rel="stylesheet" type="text/css" href="assets/styles/banner.css" />
	<script type="text/javascript" src="assets/scripts/jquery.js"></script>
	<!-- End Banner HEAD section -->
    
        <!--  Begin Galley  -->
<script type="text/javascript" src="assets/styles/phto-gal/gal.js"></script>
<link rel="stylesheet" type="text/css" href="assets/styles/phto-gal/gal.css" />

<!--
	2) Optionally override the settings defined at the top
	of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
	hs.graphicsDir = 'assets/styles/phto-gal/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.75;

	// define the restraining box
	hs.useBox = true;
	hs.width = 640;
	hs.height = 480;

	// Add the controlbar
	hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: 1,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
</script>

    <!--  End Galley  -->
    
        	<!-- Start Side Menu HEAD section -->
	<link rel="stylesheet" type="text/css" href="assets/styles/sd-menu-ar.css" />
	<script type="text/javascript" src="assets/scripts/sd-menu.js"></script>
	<!-- End Side Menu HEAD section -->
</head>
<body class="">
<div class="wrapper row1">
  <header id="header" class="full_width clear">

    <hgroup>
        <div id="header-contact" style="direction:rtl;">
      <ul class="list none">
        <li><!--span class="icon-phone" ></span>--><img src="assets/images/hotline.png" style="width:8%;" /><strong>اتصل الأن &nbsp; &nbsp;<a class="shrt-nr" href="tel:+216976">16976</a></strong></li>
       <!--         <li>Email Us: <a href="mailto:info@interafricaegypt.com">info@interafricaegypt.com</a></li>-->
      </ul>
    </div>
    </hgroup>
 <div style="float:right;"><a href="index.html"><img src="assets/images/logo.png" /></a></div>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">

     <div class="navbar navbar-default navbar-static-top" role="navigation">
     
      <div class="container-bootstrap">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">الصفحة الرئيسية</a>
        </div>
        <div class="navbar-collapse collapse" >
          <ul class="nav navbar-nav">
<!--           <li class="active"><a href="#">About Us</a></li>-->
           <li><a href="aboutus-ar.php">عن الشركة</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">السياحة الداخلية<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="main-section-ar.php">معلومات سياحية</a></li>
                <li><a href="programs-main-ar.php">برامج السياحة الداخلية</a></li>
                <li><a href="phto-gallery-main-ar.php">مكتبة الصور</a></li>
                <li><a href="vid-gallery-main-ar.php">مكتبة الفيديو</a></li>
                <li><a href="#">صمم رحلتك</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">سياحة خارجية<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="main-section-ar.php">معلومات سياحية</a></li>
                <li><a href="programs-main-ar.php">برامج السياحة الداخلية</a></li>
                <li><a href="phto-gallery-main-ar.php">مكتبة الصور</a></li>
                <li><a href="vid-gallery-main-ar.php">مكتبة الفيديو</a></li>
                <li><a href="#">صمم رحلتك</a></li>
              </ul>
            </li>			
            <li class="dropdown">
              <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">الحج والعمرة<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header" style="font-size:1.5em;">الحج</li>
                <li><a href="internal-nomenu-ar.php">الأوراق المطلوبة</a></li>
                <li><a href="haj-program-main-ar.php">برامج الحج</a></li>
                <li><a href="phto-gallery-main-ar.php">مكتبة الصور</a></li>
                <li><a href="vid-gallery-main-ar.php">مكتبة الفيديو</a></li>
                <li class="divider"></li>
                <li class="dropdown-header" style="font-size:1.5em;">العمرة</li>				
                <li><a href="internal-nomenu-ar.php">الأوراق المطلوبة</a></li>
                <li><a href="haj-program-main-ar.php">برامج العمرة</a></li>
                <li><a href="phto-gallery-main-ar.php">مكتبة الصور</a></li>
                <li><a href="vid-gallery-main-ar.php">مكتبة الفيديو</a></li>
                </ul>
                </li>

            <li><a href="#">حجز تذاكر طيران</a></li>
            <li><a href="main-section-ar.php">حجز فنادق</a></li>
            <li><a href="#">النقل السياحي</a></li>					
            <li><a href="contact-ar.php">اتصل بنا</a></li>
            <li><a href="index-eng.php">English</a></li>
          </ul>
        </div>
</div>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <!-- InstanceBeginEditable name="EditRegion" --> 
    
    <br/>
    <div id="sidebar_1" class="sidebar one_quarter first">
      <aside>
        <!-- ########################################################################################## -->
        <h2>
        <?php echo $row_tourism_type['ArTourismType'];  ?>
        </h2>
<nav>
<ul id="sd-nav">
 
   
    <?php do { ?>
      <li><a href="ar_programs.php?type=<?php echo  $_REQUEST['type']; ?>&city=<?php echo $row_cities['ID']; ?>"> <?php echo $row_cities['ArName']; ?> </a></li>
       
      <?php } while ($row_cities = mysql_fetch_assoc($cities)); ?>
 
</ul>
</nav>
        <!-- /nav -->
        <!-- ########################################################################################## -->
      </aside>
    </div>
    <!-- ################################################################################################ -->
    
  
     <div id="portfolio" class="three_quarter">
    <figure class="post-image"><img alt="" src="<?php echo $row_programs['ImageURL']; ?>" /></figure>
    <section class="clear">
    <br/>
      <h1 class="H1-shadow center"><?php echo $row_programs['ArTitle']; ?></h1>
          <br/>
     
   <h2>تفاصيل الرحلة:</h2><br>

      <p><?php echo $row_programs['ArContent']; ?></p>
      <h2>كود الرحلة: &nbsp;<?php echo $row_programs['TripCode']; ?></h2><br>
           <h1>السعر :<?php echo $row_programs['Price']; ?></h1>
           <h2>
           <?php if($row_programs['SpecialOffer'] == 1) { ?>
              عرض خاص!
              <?php }else{?>
              &nbsp;
              <?php }?>
           
           </h2>
           <P><strong>العرض ساري من  <?php echo $row_programs['DateFrom']; ?> الي  <?php echo $row_programs['DateTo']; ?></strong></P>           
    </section>
<br/>
 <section>
      <h2>استعرض الصور</h2>
      <ul class="nospace clear">
        <li class="one_quarter first">
          <figure class="team-member"><a href="assets/images/demo/gallery.jpg" class="highslide" onclick="return hs.expand(this)">
	<img src="assets/images/demo/gallery.jpg" alt="Gallery Image" title="Click to enlarge" /></a>       
          </figure>
        </li>
    
        </ul>
    
    </div>
    
    <!-- InstanceEndEditable --><!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- Footer -->
<div class="wrapper row2">
  <div id="footer" class="clear">

<div class="one_quarter first">
      <h2 class="footer_title">كن علي اتصال بنا</h2>
      <div class="tweet-container" style="background:#EFEFEF;">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com/facebook%2FFacebook&amp;width=120&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:290px;" allowTransparency="true"></iframe>
      </div>
    </div>

    
    <div class="one_quarter">
      <h2 class="footer_title">إتصل بنا</h2>
      <form class="rnd5" action="#" method="post">
        <div class="form-input clear">
          <label for="ft_author">الإسم<span class="required">*</span><br>
            <input type="text" name="ft_author" id="ft_author" value="" size="22">
          </label>
          <label for="ft_email">البريد الإلكتروني<span class="required">*</span><br>
            <input type="text" name="ft_email" id="ft_email" value="" size="22">
          </label>
        </div>
        <div class="form-message">
          <textarea name="ft_message" id="ft_message" cols="25" rows="10"></textarea>
        </div>
        <p>
          <input type="reset" value="اعادة" class="button small grey">
          &nbsp;
           <input type="submit" value="ارسل" class="button small orange">
        </p>
      </form>
    </div>
  
 <div class="one_quarter">
      <h2 class="footer_title">مكتبة الصور</h2>
      <ul id="ft_gallery" class="nospace spacing clear">
        <li class="one_third first"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third first"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third first"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="assets/images/demo/80x80.gif" alt=""></a></li>
      </ul>
    </div>   
    

    <div class="one_quarter">
      <h2 class="footer_title">روابط سريعة</h2>
      <nav class="footer_nav">
        <ul class="nospace">
          <li><a href="#">الصفحة الرئيسية</a></li>
          <li><a href="#">برامج السياحة الداخلية</a></li>
          <li><a href="#">برامج السياحة الخارجية</a></li>
          <li><a href="#">برامج العمرة</a></li>
          <li><a href="#">برامج الحج</a></li>
          <li><a href="#">حجز فنادق</a></li>
          <li><a href="#">حجز تذاكر طيران</a></li>
        </ul>
      </nav>
    </div>
    
  </div>
</div>
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <div class="copyright_p">جميع الحقوق محفوظة &copy; 2014 <a href="#" style="color:#F95355;">انتر افريكا للسياحة</a></div>
            <div class="social_float"><a href="http://www.facebook.com/interafricaegypt" target="_blank"><img class="social-icons" src="assets/images/facebook-icon.png" /></a><a href="http://www.twitter.com/interafricaegypt" target="_blank"><img class="social-icons" src="assets/images/twitter-icon.png" /></a><a href="http://www.youtube.com/interafricaegypt" target="_blank"><img class="social-icons" src="assets/images/youtube-icon.png" /></a></div>

      <div class="itmaven">تم تطوير الموقع بواسطة: <a href="http://itmaven.net" target="_blank" style="text-decoration:underline;">IT Maven Egypt</a></div>
   </div>
</div>

<!-- Start Bootstrap menu scripts  -->

  <!-- latest jQuery, Boostrap JS and hover dropdown plugin 
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->
  <script src="assets/scripts/bootstrap-hover-dropdown.js"></script>
  <script>
      // very simple to use!
      $(document).ready(function () {
          $('.js-activated').dropdownHover().dropdown();
      });
  </script>
  
  <!-- End Bootstrap menu scripts  -->
      
  <!-- start Back to top script  -->
  
   </script>
<a href="#" class="back-to-top">العودة للأعلي</a>
    
        <script>
            jQuery(document).ready(function () {
                var offset = 220;
                var duration = 500;
                jQuery(window).scroll(function () {
                    if (jQuery(this).scrollTop() > offset) {
                        jQuery('.back-to-top').fadeIn(duration);
                    } else {
                        jQuery('.back-to-top').fadeOut(duration);
                    }
                });

                jQuery('.back-to-top').click(function (event) {
                    event.preventDefault();
                    jQuery('html, body').animate({ scrollTop: 0 }, duration);
                    return false;
                })
            });
		</script>
        
  <!-- end Back to top script  -->
</body>
<!-- InstanceEnd --></html>