<?php 


namespace app\core;

class Router{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    // public function __construct(\app\core\Request $request){
    public function __construct(Request $request){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;

    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path]??false;
        if($callback===false){
            // echo "Not Found"
            // ;exit;
            // Application::$app->response->setStatusCode(404);
            $this->response->setStatusCode(404);
            return "Not Found";
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return call_user_func($callback);
        // echo call_user_func($callback);
        // echo '<pre>';
        // var_dump($path);
        // echo '</pre>';
        // exit;

        // $this->request->getPath();
        
    }
    public function renderView($view)
    {  
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        // include_once __DIR__."/../views/$view.php";
        include_once Application::$ROOT_DIR."/views/$view.php";
    }
    protected function layoutContent(){
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }
    protected function renderOnlyView($view){
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

    
}