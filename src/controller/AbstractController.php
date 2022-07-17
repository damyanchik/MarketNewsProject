<?php

abstract class AbstractController {

    public object $db;
    protected array $get;
    protected array $post;

    private const DEFAULT_ACTION = 'news';
    private const DEFAULT_ADMINPANEL = 'home';

    public function route() : void
    {
        $action = $this->get['action'] ?? self::DEFAULT_ACTION;
        $admin = $this->get['adminpanel'] ?? self::DEFAULT_ADMINPANEL;

        switch ($action) {
            case 'list':
                $page = ['action' => 'list', 'section'];
                $param = ['display' => 'block'];
                break;
            case 'article':
                $page = ['action' => 'article', 'article'];
                $param = ['display' => 'block'];
                break;
            case 'auth':
                $page = ['action' => 'auth'];
                $param = ['display' => 'none'];
                break;
            case 'registration':
                $page = ['action' => 'registration'];
                $param = ['display' => 'none'];
                break;
            case 'search':
                $page = ['action' => 'search'];
                $param = ['display' => 'none'];
                break;
            case 'logout':
                $page = ['action' => 'logout'];
                $param = ['display' => 'none'];
                break;
            case 'settings':
                if ($_SESSION['person'] === 'User' || $_SESSION['person'] === 'Admin') {
                    $page = ['action' => 'settings'];
                    $param = ['display' => 'none'];
                } else {
                    echo 'Błąd';
                }
                break;
            case 'admin':
                if ($_SESSION['person'] === 'Admin') {
                    switch ($admin) {
                        case 'articles':
                            $page = ['action' => 'admin', 'adminpanel' => 'articles'];
                            break;
                        case 'reports':
                            $page = ['action' => 'admin', 'adminpanel' => 'reports'];
                            break;
                        case 'users':
                            $page = ['action' => 'admin', 'adminpanel' => 'users'];
                            break;
                        default:
                            $page = ['action' => 'admin', 'adminpanel' => 'home'];
                            break;
                    };
                    $param = ['display' => 'none'];
                } else {
                    echo 'Błąd';
                }
                break;
            default:
                $page = ['action' => 'news'];
                $param = ['display' => 'block'];
                break;
        }
        $view = new View($this->db);
        $view->render($page, $param);
    }

    public function __construct($post, $get, $db)
    {
        $this->get = $get;
        $this->post = $post;
        $this->db = new DatabaseController($db);
        $this->route();
    }

}