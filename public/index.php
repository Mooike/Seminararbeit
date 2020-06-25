<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require 'rb.php';

//R::setup('mysql:host=localhost;dbname=dhbwvs20_rzptvw', 'dhbwvs20_dbuser1', 'dbuser1pwd');
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

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

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

$app->delete('/list/{id}', function (Request $request, Response $response, $args) {
$list = R::load('list', $args['id']);
R::trash($list);
$response->getBody()->write(json_encode($rezept));
 return $response;
});


$app->post('/addList/{title}', function (Request $request, Response $response,
$args) {
$parsedBody=$request->getParsedBody();
$list=R::dispense('list');	
$list->title=$args['title'];
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
$app->get('/tdsbylist/{listid}', function (Request $request, Response $response,
$args){
    $id = $args['listid'];
    
    $tds = R::find( 'todo', ' listid LIKE ? ', [ $id ] );
    $response->getBody()->write(json_encode ($tds));
    return $response;
});

$app->get('/tds', function (Request $request, Response $response,
$args) {
$parsedBody=json_decode((string)$request->getBody(),True);
$td = R::findAll('todo');
 $response->getBody()->write(json_encode ($td));
 return $response;
});



$app->put('/tds/{id}', function (Request $request, Response $response, $args) {
 $parsedBody = json_decode((string)$request->getBody(), true);

 $todo = R::load('todo', $args['id']);


 $todo->title = $parsedBody['title'];
 $todo->beschreibung = $parsedBody['beschreibung'];
 $todo->prio = $parsedBody['prio'];
 $todo->status = $parsedBody['status'];
 $todo->datum = $parsedBody['datum'];
 R::store($todo);

 $response->getBody()->write(json_encode($todo));
 return $response;
});

$app->get('/lists', function (Request $request, Response $response,
$args) {
$parsedBody=json_decode((string)$request->getBody(),True);
$lists =R::findAll('list');

 $response->getBody()->write(json_encode ($lists));
 return $response;
});
$app->get('/login', function (Request $request, Response $response,
$args) {
$parsedBody=json_decode((string)$request->getBody(),True);
$lists =R::findAll('user');

 $response->getBody()->write(json_encode ($lists));
 return $response;
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});
$app->run();

?>

