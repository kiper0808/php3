<?php

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();


$container->set(\Polzagram\Hash\HashInterface::class, function (){
   $hash = new \Polzagram\Hash\Argon2i();
   return $hash;
});

$container->set(\Polzagram\Action\RegisterAction::class, function () use ($container) {
    $hash = $container->get(\Polzagram\Hash\HashInterface::class);
    $validator = $container->get('validator');
    $action = new \Polzagram\Action\RegisterAction($container->get(\Polzagram\Hash\HashInterface::class), $container->get('validator'));

   return $action;
});

// Подключаем Validator
$container->set('validator', function () use ($capsule){
    $filesystem = new Illuminate\Filesystem\Filesystem();
    $loader = new \Illuminate\Translation\FileLoader($filesystem, dirname(dirname(__FILE__)) . '/resources/lang');
    $loader->addNamespace('lang', dirname(dirname(__FILE__)) . '/resources/lang');
    $loader->load($lang = 'ru', $group = 'validation', $namespace = 'lang');

    $factory = new \Illuminate\Translation\Translator($loader, 'ru');
    $validator = new \Illuminate\Validation\Factory($factory);

    $databasePresenceVerifier = new \Illuminate\Validation\DatabasePresenceVerifier($capsule->getDatabaseManager());
    $validator->setPresenceVerifier($databasePresenceVerifier);

    return $validator;
});