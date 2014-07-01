<?php

namespace CivContent;

use Zend\ModuleManager\ModuleManager;

class Module
{
    protected static $options;
    
    public function init(ModuleManager $moduleManager)
    {
        $moduleManager->getEventManager()->attach('loadModules.post', array($this, 'modulesLoaded'));
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'civcontent_category_form_hydrator' => 'Zend\Stdlib\Hydrator\ClassMethods',
                'civcontent_post_form_hydrator' => 'Zend\Stdlib\Hydrator\ClassMethods'
            ),
            'factories' => array(
                'civcontent_service' => function($sm) {
                    $service = new \CivContent\Service\Content;
                    $service->setCategoryMapper($sm->get('civcontent_category_mapper'));
                    $service->setPostMapper($sm->get('civcontent_post_mapper'));
                    return $service;
                },
                'civcontent_post_mapper' => function($sm) {
                    $mapper = new \CivContent\Model\Post\PostMapper;
                    $postModelClass = Module::getOption('post_model_class');
                    $mapper->setEntityPrototype(new $postModelClass);
                    $mapper->setHydrator(new \Zend\Stdlib\Hydrator\ClassMethods);
                    return $mapper;
    
                },
                'civcontent_post' => function($sm) {
                    $post = new \CivContent\Model\Post\Post;
                    return $post;
                },
                'civcontent_post_form' => function($sm) {
                    $form = new \CivContent\Form\ContentForm;
                    $form->setInputFilter(new \CivContent\Form\PostFilter());
                    return $form;
                },
                'civcontent_category_mapper' => function($sm) {
                    $mapper = new \CivContent\Model\Category\CategoryMapper;
                    $categoryModelClass = Module::getOption('category_model_class');
                    $mapper->setEntityPrototype(new $categoryModelClass);
                    $mapper->setHydrator(new \Zend\Stdlib\Hydrator\ClassMethods);
                    return $mapper;
                },
                'civcontent_category' => function($sm) {
                    $category = new\CivContent\Model\Category\Category;
                    return $category;
                },
                'civcontent_category_form' => function($sm) {
                    $form = new \CivContent\Form\CategoryForm;
                    $form->setInputFilter(new \CivContent\Form\CategoryFilter());
                    return $form;
                }
            ),
            'initializers' => array(
                function($instance, $sm){
                    if($instance instanceof Service\DbAdapterAwareInterface){
                        $dbAdapter = $sm->get('civcontent_zend_db_adapter');
                        return $instance->setDbAdapter($dbAdapter);
                    }
                },
            ),
        );
    
    }
    
    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'RenderForm' => 'CivContent\View\Helper\RenderForm'
            )
        );
    
    }
    
    public function modulesLoaded($e)
    {
        $config = $e->getConfigListener()->getMergedConfig();
        static::$options = $config['civcontent'];
    }
    
    public static function getOption($option)
    {
        if (!isset(static::$options[$option])) {
            return null;
        }
        return static::$options[$option];
    }
}