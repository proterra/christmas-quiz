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
                       <li>
                          <a href="./?year=2016" ><b>For 2016 the theme is Herbs and Spices!</b></a>
                       </li>
                   </ul>
               </div>

               <!-- /.navbar-collapse -->
           </div>
           <!-- /.container -->
       </nav>



<?php

require __DIR__ . '/vendor/autoload.php';

//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}

//set error handler
set_error_handler("customError");

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://172.17.0.1:3000/api/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);
?>

<h1>Return from REST API</h1>
<?php

$response = $client->request('GET', 'Quiz');
$body = $response->getBody();
// Implicitly cast the body to a string and echo it

$json = json_decode($body, true);
print_r($json);
?>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>