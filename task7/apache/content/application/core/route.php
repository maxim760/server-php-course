<?php
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = '';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $name = explode("?", $routes[1])[0];
            $controller_name = str_ends_with($name, ".php") ? substr($name, 0, -4) : $name;
        }


        // добавляем префиксы
        $model_name = $controller_name;
        $controller_class_name = ucfirst($controller_name).'Controller';

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include $model_path;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path)) {
            include $controller_path;
        } else {
            Route::ErrorPage404();
            return;
        }

        // создаем контроллер
        $controller = new $controller_class_name;
        $controller->start();

    }

    static function ErrorPage404()
    {
        echo "error 404";
        echo "<br>";
        echo "<a href='index.html'>на главную</a>";
    }
}