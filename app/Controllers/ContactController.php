<?php

namespace App\Controllers;

use App\Core\Http\Response;
// require_once dirname(__DIR__, 2)."/app/Core/http/Response.php";
// require_once dirname(__DIR__)."/Core/Database/Connection.php";

class ContactController
{
    public $title;

    protected Response $response;

    protected $connect;
    
    
    public $breadcrumbs = [
    'title' => "Contact page",
    'link' => "/contact",
    ];

    public function __construct() {
        $this->connect = Connection::connect();
    }

    public function index() {
        if ($_POST) {
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            // You need to format date like "Y-m-d H:i:s" in order to work with MySQL datetime field.
            // i.e. : date('Y-m-d H:i:s'); https://dev.mysql.com/doc/refman/5.7/en/datetime.html:
            $created_at = date('Y-m-d H:i:s');
            $sql = "INSERT INTO feedback (first_name, last_name, email, message, created_at) VALUES
            ('$first_name', '$last_name', '$email', '$message', '$created_at')";
            
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
        }    

        $sql= "SELECT * FROM feedback";
        $stmt = $this->connect->prepare($sql);
        // var_export($stmt);
        $stmt->execute();
        
        $messages = $stmt->fetchAll(PDO::FETCH_CLASS);
        // var_export($stmt);
        $this->title = "Contact page";
        $body = render('contact/index', ['title'=>$this->title, 'messages'=>$messages]);
        $this->response = new Response($body);
        $this->response->send();
        
    }
    
}
