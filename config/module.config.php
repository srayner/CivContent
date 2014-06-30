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
                'may_terminate' => true,
                'child_routes' => array(
                    'action' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:action[/:postid]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
                'child_routes' => array(
                    'category' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/category[/:action[/:categoryid]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'CivContent\Controller\Category',
                                'action'     => 'index'
                            ),
                        ),
                    ),
                ),
            ),
            'civ-content' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/:category/:postid',
                    'constraints' => array(
                        'category' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'postid'   => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'CivContent\Controller\Index',
                        'action'     => 'view'
                    ),
               ),
            )
        ),
    ),
    
    /* Controllers */
    'controllers' => array(
        'invokables' => array(
            'CivContent\Controller\Index'    => 'CivContent\Controller\IndexController',
            'CivContent\Controller\Category' => 'CivContent\Controller\CategoryController'
        ),
    ),
    
    /* View Manager */
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
   
    'civcontent' => array(
        'category_model_class' => 'CivContent\Model\Category\Category',
        'post_model_class'    => 'CivContent\Model\Post\Post',
    ),
    
    'service_manager' => array(
        'aliases' => array(
            'civ_zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
        ),
    ),

    
);
