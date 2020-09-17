<?php


namespace app\engine;

use app\models\repositories\BasketRepository;
use app\models\repositories\ProductsRepository;
use app\models\repositories\OrdersRepository;
use app\models\repositories\UsersRepository;
use app\engine\Db;
use app\traits\Tsingletone;

/**
 * ClassApp
 * @property Request $request
 * @property BasketRepository $basketRepository
 * @property ProductRepository $productRepository
 * @property OrderRepository $orderRepository
 * @property UserRepository $userRepository
 * @property Db $db
 * @property Session $session
 */

class App
{
    use TSingletone;
    public $config;

    /** @var  Storage */
    //хранилище компонентов-объектов
    private $components;

    private $controller;
    private $action;

    /**
     * @return static
     */
    public static function call()
    {
        return static::getInstance();
    }

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new TwigRender());
            $controller->runAction($this->action);
        } else {
            echo "Не правильный контроллер";
        }
    }

    //создание компонента при обращении, возвращает объект для хранилища
    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                //воспользуемся библиотекой ReflectionClass для создания класса
                //просто return new $class нельзя
                // т.к. не будут переданы параметры для конструктора
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    //Чтобы обращаться к компонентам как к свойствам, переопределим геттер
    function __get($name)
    {
        return $this->components->get($name);
    }
}
