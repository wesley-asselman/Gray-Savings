<?php
trait Connectable {

protected $dbh;

    public function __construct( Database $dbh )
    {
        $this->dbh = $dbh;
    }

}