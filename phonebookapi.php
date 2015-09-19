<?php 

// GET  /{resource}/{id}    Show
$app->get('/api/todos/{id}', function ($id) use ($app) {
    $todo =  $app['paris']->getModel('Todo')->find_one($id);

    return new Response(json_encode($todo->as_array()), 200, array('Content-Type' => 'application/json'));
});

$app->get('/phonebookapi', function ($id) use ($app) {

    $file = "js/phonebook2.json";

    $json = json_decode(file_get_contents($file));

    $todo =  $app['paris']->getModel('Todo')->find_one($id);

    return new Response(json_encode($todo->as_array()), 200, array('Content-Type' => 'application/json'));
});

// POST     /{resource}     Create
$app->post('/api/todos', function (Request $request) use ($app) {
    $data = json_decode($request->getContent());

    $todo =  $app['paris']->getModel('Todo')->create();
    $todo->title = $data->title;
    $todo->save();

    return new Response(json_encode($todo->as_array()), 200, array('Content-Type' => 'application/json'));
});

// PUT  /{resource}/{id}    Update
$app->put('/api/todos/{id}', function ($id, Request $request) use ($app) {
    $data = json_decode($request->getContent());

    $todo =  $app['paris']->getModel('Todo')->find_one($id);
    $todo->title = $data->title;
    $todo->save();

    return new Response('Todo updated', 200);
});

// DELETE   /{resource}/{id}    Destroy
$app->delete('/api/todos/{id}', function ($id) use ($app) {
    $todo =  $app['paris']->getModel('Todo')->find_one($id);
    $todo->delete(); 

    return new Response('Todo deleted', 200);
});

?>