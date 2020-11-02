<?php
require 'vendor/autoload.php';
global $twig;
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array(
  'cache' => __DIR__ . '/cache',
  // 'cache' => FALSE,
  'debug' => true
));
 $twig->addExtension(new \Twig\Extension\DebugExtension());

function twig_do($do,$stack){
    global $twig;
    echo $twig -> render($do,array('stack' => $stack));
}