<?php

class URL {

    protected $base_url;

    protected $endpoint;

    protected $params = [];

    public function __construct( $endpoint = '', $params = [] )
    {
        $this->base_url = 'http://localhost/Gray-savings/';
        $this->endpoint = $endpoint;
        $this->params = $params;
        $this->params['page'] = $this->endpoint;
        return $this;
    }

    public function get()
    {
        return 'index.php?' . http_build_query( $this->params );
    }

    public function redirect()
    {
        header( 'Location: ' . $this->get() );
        exit;
    }

    public function __toString()
    {
        return $this->get();
    }
}