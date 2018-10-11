<?php
    /**
     * Created by DeveloperPro ®.
     * User: Gilberto Guerrero Quinayas
     * Date: 10/10/2018
     * Time: 5:26 PM
     */
    
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    use Service\Helpers;
    use Service\Connections;
    
    $app->group('/api-security/', function () {
        $this->group('lmQuestions/', function () {
            $this->post('new', function (Request $request, Response $response, array $args) {
                $helper = new Helpers();
                $connection = new Connections();
                
                $data = array(
                    'code' => '1005',
                    'msg' => 'Invalid password'
                );
                
                $data = $helper->jsonEncodeDecode($data);
                
                return $helper->checkCode($data);
            });
        });
    });