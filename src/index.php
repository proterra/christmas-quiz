<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>THE Christmas Quiz</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-width-pics.css" rel="stylesheet">

    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="css/hover-min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto|Roboto+Condensed" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

       <!-- Navigation -->

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           <div class="container">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" href="./index.php">THE Christmas Quiz</a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul class="nav navbar-nav">
                       <li>
                           <a href="#"  data-toggle="modal" data-target="#about_modal">About</a>
                       </li>
                       <li>
                           <a href="#" data-toggle="modal" data-target="#howto_modal">How to solve</a>
                       </li>
                       <li>
                           <a href="#"  data-toggle="modal" data-target="#credit_modal">Credits</a>
                       </li>
                       <!-- <li>
                          <a href="./?year=2016" ><b>For 2016 the theme is Herbs and Spices!</b></a>
                       </li> -->
                   </ul>
               </div>

               <!-- /.navbar-collapse -->
           </div>
           <!-- /.container -->
       </nav>





<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('/tmp/php.log', Logger::WARNING));

$json='';
$validYears = array('2006','2007','2009','2010','2012','2013','2014','2015','2016','2017');

if (array_key_exists("year",$_GET)){
   $year = htmlspecialchars($_GET["year"]);
   if (!in_array($year,$validYears)){
      $year = 'index';
   }
} else {
   $year = 'index';
}

$log->info('Year being display',array($year));

// load in all the data
$filename = './data/data.json';
if(!file_exists($filename)){
   $year = 'error';
} else {
   $str = file_get_contents($filename);
   $json = json_decode($str, true); // decode the JSON into an associative array
}

if ($year!='index'){
      $data = array_values(array_filter($json['quizes'], function($v, $k) use($year) {
        return $v['year'] == $year;
    }, ARRAY_FILTER_USE_BOTH))[0];
   $yearstr = $data['year'];
   $themestr = $data['theme'];
   $iconstr = $data['icon'];
   $descstr = $data['description'];
}else {
   $current = '2016';
   $yearstr = '2017';// $json[$current]['year'];
   $themestr = ' Quiz';// $json[$current]['theme'];
   $iconstr = "web-final-quiz-header.png";
   $descstr = "is now out - questions only!";//$json[$current]['description'];
}
// echo "<pre>";
// print_r($json);
// echo "</pre>";

?>

<header class="jumbotron">
   <div class="row vertical-align">
        <div class="col-md-12">
            <img class="center-block img-responsive hdr-img" <?php echo 'src="./img/png/' . $iconstr .'"'?>  alt="">
        </div>
        <!-- <div class="col-md-8 header-text ">
            <div class="hdr-title">
            <h1 class="" ><?php echo $yearstr. ' ' . $themestr;?></h1>
            <p><?php echo $descstr;?></p>
            </div >
        </div> -->

   </div>
</header>

<!-- Content Section -->
<section class="section-heading">
    <div class="container">
<?php
if ($year!='index'){
  echo "<pre>";
  echo $year;


  //  print_r($data);
   echo "</pre>";     
?>

<div class="row">
<div class="col-md-4">
   <ul class="socialbtns ">
      <li type="button" class="btn btn-primary hvr-pulse"><?php echo '<a href="./data/ChristmasQuiz' .$year .'.pdf">'; ?> Questions &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a></li>
      <li type="button" class="btn btn-primary hvr-pulse"><?php echo '<a  href="./data/ChristmasQuiz' .$year .'_Answers.pdf">'; ?> Answers &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a></li>
   </ul>
</div>

<div class="col-md-4">
   <ul class="socialbtns">
      <li type="button" id="showAll" class="btn btn-primary hvr-pulse">Show All Answers</li>
      <li type="button" id="hideAll" class="btn btn-primary hvr-pulse">Hide All Answers</li>
   </ul>
</div>

<div class="col-md-4">
   <ul class="socialbtns">
     <li type="button" class="btn"><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fproterra.me.uk%2Fquiz&t=THE%20Christmas%20Quiz" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" class="hvr-pulse" src="./img/png/facebook.png"></a></li>
     <li type="button" class="btn"><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fproterra.me.uk%2Fquiz&text=THE%20Christmas%20Quiz:%20http%3A%2F%2Fproterra.me.uk%2Fquiz&via=calanais" target="_blank" title="Tweet"><img alt="Tweet" class="hvr-pulse" src="./img/png/twitter.png"></a></li>
     <li type="button" class="btn"><a href="https://plus.google.com/share?url=http%3A%2F%2Fproterra.me.uk%2Fquiz" target="_blank" title="Share on Google+"><img alt="Share on Google+" class="hvr-pulse" src="./img/png/gplus.png"></a></li>
     <li type="button" class="btn"> <a href="mailto:?subject=THE%20Christmas%20Quiz&body=2016%20Herbs%20and%20Spices%20is%20the%20theme%20of%20this%20year's%20quiz:%20http%3A%2F%2Fproterra.me.uk%2Fquiz" target="_blank" title="Send email"><img alt="Send email" class="hvr-pulse" src="./img/png/email.png"></a></li>
   </ul>
</div>
</div>


<?php

   foreach ($data['questions'] as $field) {?>
      <div class="row qa">
         <div class="col-md-6">
            <p class="question"> <?php echo $field['q']?><i class="fa fa-eye showAnswer hvr-pulse pull-right" aria-hidden="true"></i></p>

         </div>
         <div class="col-md-6">
            <p class="answer"> <?php echo $field['a']?></p>
         </div>

      </div>

<?php
   }
} else {

   ?>

   <!-- Grid of all the quizes -->
   <div class="row">
   <?php foreach (array_reverse($json['quizes']) as $field) {  ?>
      <div class="col-md-4 portfolio-item">
           <?php echo '<a href="./?year=' . $field['year'] . '">' ;?><img class="img-responsive center hvr-pulse" <?php echo 'src="./img/png/' . $field['icon'] .'"'?> alt=""></a>
           <h3><?php echo '<a href="./?year=' . $field['year'] . '">' ;  echo $field['year']. ' '. $field['theme'];?></a></h3>
           <p><?php echo $field['description']; ?></p>
           <ul class="socialbtns">
             <!-- <img  src="./img/png/pdfmbw.png"/>-->
             <li type="button" class="btn btn-info  hvr-pulse"><?php echo '<a href="./data/ChristmasQuiz' . $field['year'] .'.pdf">'; ?> Q &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a></li>
             <li type="button" class="btn btn-info hvr-pulse"><?php echo '<a  href="./data/ChristmasQuiz' . $field['year'] .'_Answers.pdf">'; ?> A &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a></li>
           </ul>
      </div>
   <?php } ?>
   </div>

<?php
// end of the if
}
?>

</div>
<!-- /.container -->
</section>

<!-- Modal -->
<div class="modal fade" id="about_modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">About these quizes</h4>
      </div>
      <div class="modal-body">
        <p>A Christmas (cryptic) quiz was a tradition in my wife's family for many years; many years ago we took up the mantle of producing the quz. Or rather my wife did and I did the 'produciton side'</p>
        <p>They have also proved very popular with work collegues over the Christmas dinners - a useful conversation topic when you realise that all you can't think of anything to say that isn't work related. </p>
        <p>Please take these and use them for your own enterainment - there are PDF versions available for printing. Please link back if you can!  Thankyou</p>
        <p><a href="twitter.com/calanais"><img alt="Tweet" width="32px" src="./img/png/twitter.png">  @calanais</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="howto_modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">How to solve them...</h4>
      </div>
      <div class="modal-body">
        <p>Sorry can't help you there... because I don't know how. They are crytpic and I'm too literal to be able to get them. Though the logic makes sense after I've had it explained to me. But that's just me. </p>
       <!-- <p>If there's a <i class="fa fa-lightbulb-o" aria-hidden="true"></i> next to a clue, it will give you a pop-up with some info on the approach to the clue. </p>-->
        <p>The <i class="fa fa-eye showAnswer" aria-hidden="true"></i> will highlight the answer for a short period.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="credit_modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Credit</h4>
      </div>
      <div class="modal-body">
        <p>Firstly credit goes to my wife for the brilliance behind the clues. </p>
        <p>This site is written using the Bootstrap framework, with the line icons by Font Awesome</p>
        <p> Using the Start Bootstrap - Full Width Pics (http://startbootstrap.com/) template as a base</p>
      <p>Icons are designed by Freepik from <a href="flaticon.com">Flaticon flaticon.com</a> (Snowglobe from Madebyoliver, merged with one from Freepik. PDF from PixelBudha. All others Freepick)</p>
      <p> Background bokeh lights is my <a href="mh-white.com">photography</a></p></p>
      <p> <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Footer -->
<footer>
    <hr/>
    <div class="container jumbotron">
      <div class="row vertical-align">
       <div class="col-sm-2">
           <img class="center-block img-responsive hdr-img" src="./img/png/snow-globe.png" alt="">
        </div>

            <div class="col-sm-10">
               <p class="smalltext">Please read the <a href="#"  data-toggle="modal" data-target="#credit_modal">Credits</a> for the details of the license. My contribution is Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License.
Icons from Flaticons (various authors), and Font Awesome.</p>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88840614-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
   $("#hideAll").attr('disabled', true);
$(document).ready(function(){



  $("#showAll").click(function(){
     $(".answer").show("slow");
        $("#hideAll").attr('disabled', false);
        $("#showAll").attr('disabled', true);
        $(".showAnswer").hide();
 } );

 $("#hideAll").click(function(){
    $(".answer").fadeOut();
    $("#hideAll").attr('disabled', true);
   $("#showAll").attr('disabled', false);
   $(".showAnswer").show();
} );

  $(".showAnswer").click(function() {
     $(this).closest(".qa").find(".answer").show("slow").delay(3000).fadeOut();;
  });

});
</script>

</body>
</html>
