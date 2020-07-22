<?php

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

    public function validate( $rules )
    {
        $errors = [];

        $validated = [];

        foreach ($rules as $key => $rule) {
            [ $success, $value, $error ] = $this->validateRule( $key, $rule );
            if ( $success ) {
                $validated[$key] = $value;
            } else {
                $errors[$key] = $error;
            }
        }

        if ( $errors ) {
            $this->parseErrors( $errors );
            die();
        }

        return $validated;
    }

    protected function parseErrors( $errors )
    {
        foreach ($errors as $error) {
            echo $error;
        }
    }

    protected function validateRule( $key, $rule )
    {
        switch ($rule) {
            case 'required':
                return $this->validateRequired( $key, $rule );
                break;

            default:
                return [ true, $this->get( $key ), 'Unknown or missing validation rule'];
                break;
        }
    }

    protected function validateRequired( $key, $rule )
    {
        $value = $this->get( $key );
        if ( ! $value ) {
            return [ false, null, 'No value for ' . $key . '<Br>'];
        }
        return [ true, $value, '' ];
    }
}