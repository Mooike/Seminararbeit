<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';
require "rb.php";
R::setup('mysql:host=localhost;dbname=login', 'root', '');
$app = AppFactory::create();
$app->setBasePath((function () {
 $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
 $uri = (string) parse_url('http://a' . $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
 if (stripos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
 return $_SERVER['SCRIPT_NAME'];
 }
 if ($scriptDir !== '/' && stripos($uri, $scriptDir) === 0) {
 return $scriptDir;
 }
 return '';
})());

$app->get('/getlists', function (Request $request, Response $response,
$args) {
$list =R::findAll("list");
 $response->getBody()->write(json_encode (R::exportAll($list,True)));
 return $response;
});

$app->get('/getlistsbyuid', function (Request $request, Response $response,
$args) {
$list =R::findAll('list','userid =:uid', [':uid'=>$request->getQueryParams()['uid']]);
 $response->getBody()->write(json_encode (R::exportAll($list,True)));
 return $response;
});

$app->get('/getlistsbyid', function (Request $request, Response $response,
$args) {
$list =R::findAll('list','id =:lid', [':lid'=>$request->getQueryParams()['lid']]);
 $response->getBody()->write(json_encode (R::exportAll($list,True)));
 return $response;
});

$app->delete('/getlistsbyid/{id}', function (Request $request, Response $response,
$args) {
$list =R::load('list',$args['id']);
R::trash($list);
 $response->getBody()->write(json_encode ($list));
 return $response;
});

$app->post('/createlist', function (Request $request, Response $response,
$args) {
$parsedBody=$request->getParsedBody();
$list=R::dispense('list');
$list->userid=$parsedBody['uid'];
$list->title=$parsedBody['title'];
$id=R::store($list);
 $response->getBody()->write(json_encode ($list));
 return $response;
});

$app->put('/changelist', function (Request $request, Response $response,
$args) {
$parsedBody=json_decode((string)$request->getBody(),True);
$list =R::load('list',$parsedBody['id']);
$list->userid=$parsedBody['uid'];
$list->title=$parsedBody['title'];
R::store($list);
 $response->getBody()->write(json_encode ($list));
 return $response;
});


$app->run();
?>
