<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18/11/2017
 * Time: 22:55
 */

namespace Kode\Core;


class Router
{
    private $urlController = null;

    private $urlAction = null;

    private $urlParameter = array();

    public function __construct()
    {
        $this->splitUrl();

        if (!$this->urlController) {

            $page = new \Kode\Controller\HomeController();
            $page->index();

        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = "\\Kode\\Controller\\" . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            if (method_exists($this->urlController, $this->urlAction) &&
                is_callable(array($this->urlController, $this->urlAction))) {

                if (!empty($this->urlParameter)) {
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParameter);
                } else {
                    $this->urlController->{$this->urlAction}();
                }

            } else {
                if (strlen($this->urlAction) == 0) {
                    $this->urlController->index();
                } else {
                    header('location: ' . URL . 'error');
                }
            }
        } else {
            header('location: ' . URL . 'error');
        }
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);

            $this->urlParameter = array_values($url);

        }
    }

}