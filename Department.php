<?php
class Department {
    public $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $website;
    public $head_of_dep;

    function __construct($_id, $_name)
    {
        $this->id = $_id;
        $this->name = $_name;
    }

    public function setInfo($_address, $_phone, $_email, $_website, $_head_of_dep) {
        $this->address = $_address;
        $this->phone = $_phone;
        $this->email = $_email;
        $this->website = $_website;
        $this->head_of_dep = $_head_of_dep;
    }

    public function getInfo() {
        return [
            "address" => $this->address,
            "phone" => $this->phone,
            "email" => $this->email,
            "website" => $this->website,
            "head_of_department" => $this->head_of_dep
        ];
    }
}