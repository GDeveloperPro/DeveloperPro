<?php
    /**
     * Created by DeveloperPro ®.
     * User: Gilberto Guerrero Quinayas
     * Date: 25/09/2018
     * Time: 4:32 PM
     */
    
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    header('Allow: GET, POST, OPTIONS, PUT, DELETE');
    
    $method = $_SERVER['REQUEST_METHOD'];
    
    if ($method == 'OPTIONS') {
        die();
    }
    
    $config = ['settings' => [
        'addContentLengthHeader' => false,
    ]];
    
    require '..\vendor\autoload.php';
    
    $app = new Slim\App($config);
    
    $dotEnv = new \Dotenv\Dotenv(__DIR__ . '/../');
    $dotEnv->load();
    
    # Controllers
    require '..\app\Controller\Security\SeUser.php';
    
    # Services
    require '..\app\Service\Helpers.php';
    require '..\app\Service\JwtAuth.php';
    require '..\app\Service\Connections.php';
    require '..\app\Service\EmailTemplate.php';
    
    try {
        $app->run(false);
    } catch (\Slim\Exception\MethodNotAllowedException $e) {
        var_dump($e);
    } catch (\Slim\Exception\NotFoundException $e) {
        var_dump($e);
    } catch (\UnexpectedValueException $e) {
        var_dump($e);
    } catch (\Exception $e) {
        var_dump($e);
    }