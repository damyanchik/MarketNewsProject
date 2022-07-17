<?php

class View {
    private object $db;

    public function render($page, $param) : void
    {
        require_once ('temporary/layout.php');
    }

    private function newsOrder($tag) : int
    {
        if (count($tag) <= 3) {
            $a = 0;
        } else {
            $a = count($tag) - 3;
        }
        return $a;
    }

    public function __construct($db)
    {
        $this->db = $db;
    }
}