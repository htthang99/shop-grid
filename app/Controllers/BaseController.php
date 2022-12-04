<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use League\Plates\Engine;
use App\Traits\PaginatorTrait;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BaseController
{
    use PaginatorTrait;
    /**
     * URL mặc định để chuyển hướng khi không hợp lệ
     *
     * @var string
     */
    public $redirect = '/home';

    /**
     * View Engine
     *
     * @var \League\Plates\Engine;
     */
    public $view;

    /**
     * Http Request 
     *
     * @var \App\Http\Request
     */
    public $request;

    /**
     * Return response
     *
     * @var \App\Http\Response
     */
    public $response;

    /**
     * Sessions
     *
     * @var \App\Http\Session\Session
     */
    public $session;

    public function __construct()
    {
        $this->init();

        // nếu không có quyền truy xuất controller sẽ chuyển đến $redirect = '/home'
        if (!$this->authorize()) {
            redirect($this->redirect);
        }
    }

    /**
     * Phương thức dùng để kiểm tra mỗi khi controller được gọi
     *
     * @return void
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Hàm khởi tạo Controller
     *
     * @return void
     */
    public function init()
    {
        $this->request = request();
        $this->session = session();
        $this->request->setSession($this->session);
        $this->response = new Response();
        $this->view = new Engine(config('view.path'));

        // Set up a current page resolver
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return $this->getCurrentPage();
        });
    }

    /**
     * Render view
     *
     * @param [type] $view
     * @param array $data
     * @return string|mixed
     */
    public function render($view, $data = [])
    {
        $this->response->headers->set('Content-Type', 'text/html');
        $this->response->setStatusCode(Response::HTTP_OK);
        $html = $this->view->render($view, $data);
        $this->response->setContent($html);
        $this->response->prepare($this->request);

        return $this->response->send();
    }

    /**
     * Chuyển hướng đến trang khác
     *
     * @param string $route
     * @param integer $statusCode
     * @param array $headers
     * @return void
     */
    public function redirect($route, $statusCode = 302, $headers = [])
    {
        $response = new RedirectResponse($route, $statusCode, $headers);

        return $response->send();
    }

    /**
     * Trả về dữ liệu JSON trong trường hợp Ajax Request
     *
     * @param array $data
     * @param integer $status
     * @param array $headers
     * @return void
     */
    public function json($data = [], $status = 200, $headers = [])
    {
        $response = new JsonResponse($data, $status, $headers);
        return $response->send();
    }


    /**
     * Một số phương thức sử dụng Request trong Controller
     * //$name = $_GET['name'] ?? null;
     * $name = $this->request->get('name');

     * //$name = $_GET['name'] ?? 'unknown';
     * $name = $this->request->get('name', 'unknown');

     * //$name = $_POST['name'] ?? null;
     * $name = $this->request->post('name');

     * //$name = $_POST['name'] ?? 'unknown';
     * $name = $this->request->post('name', 'unknown');

     * // POST or GET
     * //$name = $_GET['name'] ?? 'unknown';  
     * //$name = $_POST['name'] ?? 'unknown';
     * $name = $this->request->all('name', 'unknown');

     * // lấy tất cả các tham số submit bởi POST + GET
     * $params = $this->request->all();
     */



    /**
     * // Lấy Cookie từ trình duyệt gởi lên
     * // Truy cập thông qua thuộc tính request

     * $name = $this->request->cookie('name');
     * $name = $this->request->cookie('name', 'unknown');

     * $allCookies = $this->request->cookies();

     * // Đặt lại cookie trên trình duyệt thông qua thuôc tính $response
     * $this->response->setCookie('name', 'some value', time() + 3600);

     * // Xoá cookie
     * $this->response->deleteCookie('name');

     * // Truy cập thông qua helper function

     *$name = cookie()->get('name');

     * // xoa cookie
     * cookie()->remove('name');

     * // Làm việc với Session

     * // lấy biến session
     * $name = $this->request->getSession()->get('name', 'unknown');

     * $name = $this->session->get('name');

     * $name = session()->get('name');

     * // đặt biết session
     * $this->request->getSession()->set('name', 'some value');
     *  $this->session->set('name', 'some value');
     * session()->set('name', 'some value');

     * // kiểm tra biến session có tồn tại
     * if ($this->session->has('name')) {
     * }

     * // lấy tất cả các biến session
     * $allSessions = $this->session->all();
      
     */
}
