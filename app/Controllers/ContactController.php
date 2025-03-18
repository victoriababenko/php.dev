<?php

require_once dirname(__DIR__, 2)."/app/Core/http/Response.php";

class ContactController
{
    public $title;

    protected Response $response;
    
    public $breadcrumbs = [
    'title' => "Contact page",
    'link' => "/contact",
    ];

    public function __construct() {
        // echo $this->title;
    }

    public function index() {
        $this->title = "Contact page";
        $body = render('contact/index', ['title'=>$this->title]);
        $this->response = new Response($body);
        $this->response->send();
    }
    //echo render('home/index', compact('title', 'breadcrumbs'));
}
