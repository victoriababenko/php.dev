<?php

declare(strict_types=1); 

namespace App\Controllers;

use App\Core\Http\Response;
use App\Core\Render\View;


class AboutController
{
    public $title;

    protected Response $response;
    
    public $breadcrumbs = [
    'title' => "About page",
    'link' => "/about",
    ];

    private View $view;
    
    public function __construct() {
        $this->view = new View();
    }

    public function index() {
        $this->title = "About page";
        // $body = render('about/index', ['title'=>$this->title]);
        $body = $this->view->render('home/index', ['title'=>$this->title]);
        
        $this->response = new Response($body);
        $this->response->send();
    }
    }
