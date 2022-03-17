<?php

    class Book {
        public $title;
        public $author;
        public $pages;

        function set_title($title) {
            $this->title = $title;
        }
        function set_author($author) {
            $this->author = $author;
        }
    }

    $mindset = new Book();
    $mindset->set_title("Mindset: The New Psychology");
    $mindset->set_author("Tambe Salome!");
    $mindset->pages = 589;

    foreach($mindset as $prop => $value) {
        echo $value."<br>";
    }