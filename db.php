<?php
    class Mydb extends sqlite3{
        function __construct(){
            $this->open('db.db');
        }
    }

    $db = new Mydb();
    ?>