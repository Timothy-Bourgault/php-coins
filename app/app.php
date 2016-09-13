<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Coins.php";

    //Add symfony debug component and turn it on.
    use Symfony\Component\Debug\Debug;
    Debug::enable();

    // Initialize application
    $app = new Silex\Application();

    // Set Silex debug mode in $app object
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('form.html.twig');
    });

    $app->get("/view_change", function() use($app) {
       $money_amount= $_GET['change'];
       $coinage_T = $_GET['coinageType'];
       $my_change_calculator =  new ChangeCalculator;
       $test = $my_change_calculator->calculateChange($money_amount, $coinage_T);

        return $app['twig']->render('change.html.twig', array('results' => $test, 'coinz'=>$coinage_T));
   });
   return $app
 ?>
