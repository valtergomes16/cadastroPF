<?php

require_once("Model/Person.php");
require_once("connection.php");

class PersonDao implements PersonDaoInterface {

    public function create(Person $p) {

        $sql = "INSERT INTO people(full_name, cpf, birth_date, street_address, street_number, complement, neighborhood, city, state, zip_code, cell_phone, telephone, email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(1, $p->getFullName());
        $stmt->bindValue(2, $p->getCpf());
        $stmt->bindValue(3, $p->getBirthDate());
        $stmt->bindValue(4, $p->getStreetAddress());
        $stmt->bindValue(5, $p->getStreetNumber());
        $stmt->bindValue(6, $p->getComplement());
        $stmt->bindValue(7, $p->getNeighborhood());
        $stmt->bindValue(8, $p->getCity());
        $stmt->bindValue(9, $p->getState());
        $stmt->bindValue(10, $p->getZipCode());
        $stmt->bindValue(11, $p->getCellPhone());
        $stmt->bindValue(12, $p->getTelephone());
        $stmt->bindValue(13, $p->getEmail());

        $stmt->execute();

    }
    
    public function read() {
        
        $sql = "SELECT * FROM people";

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;

    }

    public function update(Person $p) {

        $sql = "UPDATE people SET full_name=?, birth_date=?, street_address=?, street_number=?, complement=?, neighborhood=?, city=?, state=?, zip_code=?, cell_phone=?, telephone=?, email=? WHERE cpf=?";


        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(1, $p->getFullName());
        $stmt->bindValue(2, $p->getBirthDate());
        $stmt->bindValue(3, $p->getStreetAddress());
        $stmt->bindValue(4, $p->getStreetNumber());
        $stmt->bindValue(5, $p->getComplement());
        $stmt->bindValue(6, $p->getNeighborhood());
        $stmt->bindValue(7, $p->getCity());
        $stmt->bindValue(8, $p->getState());
        $stmt->bindValue(9, $p->getZipCode());
        $stmt->bindValue(10, $p->getCellPhone());
        $stmt->bindValue(11, $p->getTelephone());
        $stmt->bindValue(12, $p->getEmail());
        $stmt->bindValue(13, $p->getCpf());

        $stmt->execute();

    }

    public function delete($cpf) {
        
        $sql = "DELETE FROM people WHERE cpf=?";

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();

    }

    public function findByCpf($cpf) {

        $sql = "SELECT * FROM people WHERE cpf=?";

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->execute([$cpf]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result):
            $person = new Person();
            $person->setFullName($result['full_name']);
            $person->setCpf($result['cpf']);
            $person->setBirthDate($result['birth_date']);
            $person->setStreetAddress($result['street_address']);
            $person->setStreetNumber($result['street_number']);
            $person->setComplement($result['complement']);
            $person->setNeighborhood($result['neighborhood']);
            $person->setCity($result['city']);
            $person->setState($result['state']);
            $person->setZipCode($result['zip_code']);
            $person->setCellPhone($result['cell_phone']);
            $person->setTelephone($result['telephone']);
            $person->setEmail($result['email']);

            return $person;
        else:
            return null;
        endif;

    }

    public function search($search) {
        // Limpar a palavra-chave de entrada para evitar injeção de SQL
        $search = '%' . $search . '%'; // Adiciona wildcards para corresponder a qualquer parte do nome
        
        // Consultar o banco de dados para recuperar os registros que correspondem à palavra-chave
        $sql = "SELECT * FROM sua_tabela WHERE full_name LIKE :search OR cpf LIKE :search";
        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindParam(':search', $search, \PDO::PARAM_STR);
        $stmt->execute();
        
        // Retornar os resultados da consulta
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

}