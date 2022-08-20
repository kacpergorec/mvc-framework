<?php


namespace App\Core;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * Route resolving method, further explanation in the comments inside
     *
     * @return array|false|string|string[]
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        //Finds a existing route by the path and method.
        $callback = $this->routes[$method][$path] ?? false;

        //When route is not found render _404
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        //When callback is a string then render a plain view from string name
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        //When callback is an array it initializes an object from a Class
        //since you cannot refer non-static methods from static Classes.
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        //Fires a method inside that object.
        return $callback($this->request);
    }

    //TODO: Separate class for rendering views.
    public function renderView($view, $params = [])
    {
        $layout = Application::$app->controller->layout ?? 'main';

        $layoutContent = $this->layoutContent($layout);
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layout = Application::$app->controller->layout;

        $layoutContent = $this->layoutContent($layout);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent($layout)
    {
        return $this->bufferView("layouts/$layout");
    }

    protected function renderOnlyView($view, $params = [])
    {
        return $this->bufferView($view, $params);
    }

    protected function bufferView($viewPath, $params = [])
    {
        //Pass the parameters to the view as simple variables
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        //Buffer the view file and return the contents
        ob_start();
        include_once Application::$ROOT_DIR . "/src/View/$viewPath.php";
        return ob_get_clean();
    }

}