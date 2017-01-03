<?php

    class Hello
    {
        private $name;

        /**
         * @return mixed
         */
        public function __construct($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

    }

    $mec = new Hello('manu');
    echo $mec->getName();