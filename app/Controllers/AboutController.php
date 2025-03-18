<?php

require_once dirname(__DIR__, 2)."/app/Core/http/Response.php";

class AboutController
{
    public $title;

    protected Response $response;
    
    public $breadcrumbs = [
    'title' => "About page",
    'link' => "/about",
    ];

    public function __construct() {
        // echo $this->title;
    }

    public function index() {
        $this->title = "About page";
        $body = render('about/index', ['title'=>$this->title]);
        $this->response = new Response($body);
        $this->response->send();
    }
    //echo render('home/index', compact('title', 'breadcrumbs'));
}
