<?php

// Product.php

class Product implements ResourceInterface {

    use Connectable;
    use Templatable;

    public function index()
    {
        $this->template->render( 'dashboard', [ 'products' => $this->getAll() ] );
    }

    public function get( $id )
    {
        // return product with id $id
    }

    public function add( $request )
    {
        if ( ! isset( $request['name'] ) ) {
            die( 'Geen naam in addProduct request');
        }

        if ( ! isset( $request['link'] ) ) {
            die( 'Geen link in addProduct request');
        }

        if ( ! isset( $request['price'] ) ) {
            die( 'Geen price in addProduct request');
        }

        return $this->store( $request['name'], $request['link'], $request['price'] );

    }

    protected function store( $name, $link, $price )
    {
        // Add product to database
    }

    protected function getAll()
    {
        $data = $this->db->selectWhere('*', 'products', 'userId', $_SESSION['userId']);
        return $data;
    }
}

// User.php

class User implements ResourceInterface {

    use Connectable;

    public function add( $request )
    {
        if ( ! isset( $request->get('name') ) ) {
            die( 'Geen naam in addUser request');
        }

        if ( ! isset( $request->get('email') ) ) {
            die( 'Geen email in addUser request');
        }

        if ( ! isset( $request->get('password') ) ) {
            die( 'Geen password in addUser request');
        }

        $this->store( $request->get('name'), $request->get('email'), $request->get('password') );

    }

    protected function store( $name, $link, $price )
    {
        // Add product to database
    }

}

// Template.php

class Template {
    public function render( $view, $data = [] )
    {
        extract( $data );
        require_once '/includes/' . $view . '.inc.php';
    }
}

// ConnectableTrait.php

trait Connectable {

    protected $db;

    public function __construct( Database $db )
    {
        $this->db = $db;
    }

}

// TemplatableTrait.php

trait Templatable {

    protected $template;

    public function __construct()
    {
        $this->template = new Template();
    }

}

// ResourceInterface.php

interface ResourceInterface {
    public function add( $request );
}

// Database.php

class Database {
    // Database connection
}

// Request.php

class Request {
    protected $raw_data = [];

    public function __construct( $raw_data )
    {
        $this->raw_data = $raw_data;
    }

    public function get( $key )
    {
        return htmlspecialchars( $this->raw_data[$key] );
    }
}

// routes.php
// POST app.test/index.php?action=products&name=Wesley&link=www.google.nl&price=1
// GET  app.test/index.php?action=products
// HTACCESS REWRITE app.test/addProduct?name=Wesley&link=www.google.nl&price=1
// HTACCESS REWRITE app.test/products

require_once 'autoload.php';

if ( ! isset( $_REQUEST['action'] ) ) {
    die( 'Geen action!!!' );
}

$database = new Database();
$request = new Request( $_REQUEST );

$action = $request->get( 'action' );
$method = $_SERVER['REQUEST_METHOD'];

if ( 'products' === $action && 'GET' === $method ) {
    $product = new Product( $database );
    $product->index();
}

if ( 'products' === $action && 'POST' === $method ) {
    $product = new Product( $database );
    $product->add( $request );
}

if ( 'users' === $action && 'POST' === $method ) {
    $user = new User( $database );
    $user->add( $request );
}

