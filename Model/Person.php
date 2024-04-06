<?php

class Person {

    private $full_name, $cpf, $birth_date, $street_address, $street_number, $complement, $neighborhood, $city, $state, $zip_code, $cell_phone, $telephone, $email;

    public function getFullName() {
        return $this->full_name;
    }

    public function setFullName($full_name) {
        $this->full_name = $full_name;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

    public function getBirthDate() {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date) {
        $this->birth_date = $birth_date;
    }

    public function getStreetAddress() {
        return $this->street_address;
    }

    public function setStreetAddress($street_address) {
        $this->street_address = $street_address;
    }

    public function getStreetNumber() {
        return $this->street_number;
    }

    public function setStreetNumber($street_number) {
        $this->street_number = $street_number;
    }

    public function getComplement() {
        return $this->complement;
    }

    public function setComplement($complement) {
        $this->complement = $complement;
    }

    public function getNeighborhood() {
        return $this->neighborhood;
    }

    public function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getZipCode() {
        return $this->zip_code;
    }

    public function setZipCode($zip_code) {
        $this->zip_code = $zip_code;
    }

    public function getCellPhone() {
        return $this->cell_phone;
    }

    public function setCellPhone($cell_phone) {
        $this->cell_phone = $cell_phone;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
}


interface PersonDaoInterface {

    public function create(Person $p);
    public function read();
    public function update(Person $p);
    public function delete($cpf);
    public function findByCpf($cpf);
    public function search($search);

}