<?php

namespace CRUD\Helper;

use CRUD\Model\Person;

class PersonHelper
{
    public function insert(Person $person)
    {
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "INSERT INTO person (first_name, last_name, username) VALUES ('" . $person->getFirstName() . "', '" . $person->getLastName() . "', '" . $person->getUsername() . "')";
        if ($dbHelper->execQuery($sql)) {
            echo "Record added successfully";
        } else {
            echo "An Error Occurred";
        }
    }

    public function fetch(int $id)
    {
        $person = new Person();
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $result = $dbHelper->execQuery("SELECT * FROM person WHERE id =" . $id);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $person->setId($row[0]['id']);
        $person->setUsername($row[0]['username']);
        $person->setFirstName($row[0]['first_name']);
        $person->setLastName($row[0]['last_name']);

        return $person;
    }

    public function fetchAll()
    {
        $persons = [];
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $result = $dbHelper->execQuery("SELECT * FROM person ORDER BY ID");
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {
            $person = new Person();
            $person->setId($row['id']);
            $person->setUsername($row['username']);
            $person->setFirstName($row['first_name']);
            $person->setLastName($row['last_name']);
            $persons[] = $person;
        }
        return $persons;
    }

    public function update(Person $person)
    {
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "UPDATE person SET first_name = '".$person->getFirstName()."', last_name = '".$person->getLastName()."' WHERE username = '".$person->getUsername()."'";
        if ($dbHelper->execQuery($sql)) {
            echo "Record updated successfully";
        } else {
            echo "An Error Occurred";
        }
    }

    public function delete($username)
    {
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "DELETE FROM person WHERE username = '".$username."'";
        if ($dbHelper->execQuery($sql)) {
            echo "Record deleted successfully";
        } else {
            echo "An Error Occurred";
        }
    }

}