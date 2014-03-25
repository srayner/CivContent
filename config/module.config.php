<?php
/**
 * Civray Software (http://www.civrays.com)
 *
 */

return array(

    /* Router config. */ 
    'router' => array(
        'routes' => array(
            'content' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/content',
                    'defaults' => array(
                        'controller' => 'CivContent\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    /* Controllers */
    'controllers' => array(
        'invokables' => array(
            'CivContent\Controller\Index' => 'CivContent\Controller\IndexController'
        ),
    ),
    
    /* View Manager */
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
   
    'civcontent' => array(
        'post_model_class'    => 'CivContent\Model\Post\Post',
    ),
    
    'service_manager' => array(
        'aliases' => array(
            'civ_zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
        ),
    ),

    
);
