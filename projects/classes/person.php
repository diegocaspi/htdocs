<?php

class Persona {
    private $name;
    private $surname;
    private $age;

    public function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }
}

class Studente extends Persona {
    private $scuola;
    private $classe;

    public function __construct($name, $surname, $age, $scuola, $classe) {
        parent::__construct($name, $surname, $age);
        $this->scuola = $scuola;
        $this->classe = $classe;
    }
}

class Lavoratore extends Persona {
    private $azienda;
    private $divisione;

    public function __construct($name, $surname, $age, $azienda, $divisione) {
        parent::__construct($name, $surname, $age);
        $this->azienda = $azienda;
        $this->divisione = $divisione;
    }
}
?>