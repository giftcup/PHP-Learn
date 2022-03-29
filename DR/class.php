<?php

    class Person {
        public $name;
        public $dob;
        public $height;
        private $nidn;
        
        function __construct($name, $age, $height) {
            $this->name = $name;
            $this->age = $age;
            $this->height = $height;
        }

        function set_nidn($snidn) {
            $this->nidn = $snidn;
        }

        function get_nidn() {
            return $this->nidn;
        }

        function get_person_info() {
            $person = compact($this->name, $this->age, $this->height, $this->nidn);
            print_r ($person);
            // return $person;
        }
    }

    class Student extends Person{
        protected $matricule;
        private $email;
        private $tel;
        
        function __construct($name, $age, $height, $smatricule, $semail, $stel) {
            parent::__construct($name, $age, $height);      //calling the parent construct
            $this->matricule = $smatricule;
            $this->email = $semail;
            $this->tel = $stel;
        }

        function set_email($semail) {
            $this->email = $semail;
        }

        function get_email() {
            return $this->email;
        }
    }

    $esther = new Person("Esther", "12", "1.37");
    $esther->set_nidn("ni1391cm3010");
    echo $esther->get_nidn()."\n";

    // echo $esther->get_person_info();

    // print_r($esther->get_person_info());


    $first = new Student("Salome", 19, 1.97, "fe20a109", "salometambe@gmail.com", 679205101);
    $second = new Student("Ruth Zita", 21, 1.65, "123", "ruthita@gmail.com", 678190198);
    
    $second->set_email("ruthzita@gmail.com");
    echo $second->get_email()."\n";
    echo $second->height."\n";

    echo $first->age."\n";