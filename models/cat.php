<?php 
    class Cat {
        public $id;
        public $name;
        public $dob;
        public $colour;
        public $favFood; 

        function __construct($id, $name, $dob, $colour, $favFood) {
            $this->id = $id;
            $this->name = $name;
            $this->dob = $dob;
            $this->colour = $colour;
            $this->favFood = $favFood;
        }

    }

?>
