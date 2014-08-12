<?php
namespace CivContentTest\Controller;

use CivContentTest\Bootstrap;
use CivContent\Controller\IndexController;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->controller = new IndexController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();
        $config = $serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);

        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);
    }
    
    public function testIndexActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'index');
        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    public function testViewActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'view');
        $this->routeMatch->setParam('postid', '7');
        $result = $this->controller->dispatch($this->request);
        $responce = $this->controller->getResponse();
        $this->assertEquals(200, $responce->getStatusCode());
    }
    
    public function testViewActionCorrectlyReturns404()
    {
        $this->routeMatch->setParam('action', 'view');
        $this->routeMatch->setParam('postid', '1');
        $result = $this->controller->dispatch($this->request);
        $responce = $this->controller->getResponse();
        $this->assertEquals(404, $responce->getStatusCode());
    }
    
}