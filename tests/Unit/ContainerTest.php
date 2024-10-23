<?php
/**
 * @throws Exception
 */
test('Container Test', function (){
    $container = new \Core\Container();

    $container->bind('key', function (){
        return 'value';
    });

    $result = $container->resolve('key');

    expect($result)->toBe('value');
});