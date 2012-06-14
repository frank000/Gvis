<?php

class Default_IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    /**
* URL Helper
*
* @param array $urlOptions
* @param string $name
* @param bool $reset
* @param bool $encode
*/
    public function url($urlOptions = array(), $name = null, $reset = false, $encode = true)
    {
        $frontController = $this->getFrontController();
        $router = $frontController->getRouter();
        if (!$router instanceof Zend_Controller_Router_Rewrite) {
            throw new Exception('This url helper utility function only works when the router is of type Zend_Controller_Router_Rewrite');
        }
        if (count($router->getRoutes()) == 0) {
            $router->addDefaultRoutes();
        }
        return $router->assemble($urlOptions, $name, $reset, $encode);
    }
public function urlizeOptions($urlOptions, $actionControllerModuleOnly = true)
    {
        $ccToDash = new Zend_Filter_Word_CamelCaseToDash();
        foreach ($urlOptions as $n => $v) {
            if (in_array($n, array('action', 'controller', 'module'))) {
                $urlOptions[$n] = $ccToDash->filter($v);
            }
        }
        return $urlOptions;
    }
    public function testIndexAction()
    {
        $params = array('action' => 'index', 'controller' => 'Index', 'module' => 'default');
        $urlParams = $this->urlizeOptions($params);
        $url = $this->url($urlParams);
        $this->dispatch($url);
        
        // assertions
        $this->assertModule($urlParams['module']);
        $this->assertController($urlParams['controller']);
        $this->assertAction($urlParams['action']);
        $this->assertQueryContentContains("div#welcome h3", "This is your project's main page");
    }


}



