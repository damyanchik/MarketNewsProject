<?php

class DatabaseController
{
    public object $conn;

    public function __construct(array $config)
    {
        $this->validateConfig($config);
        $this->createConn($config);;
    }

    private function createConn(array $config): void
    {
        $this->conn = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['database'], $config['user'], $config['password']);
    }

    private function validateConfig(array $config): void
    {
        if (empty($config['host'])
            || empty($config['database'])
            || empty($config['user']))
            //|| empty($config['password']))
            echo 'Błąd w konfiguracji bazy danych';
    }

    public function getRecords(string $tableName, string $columnName = null, string $recordName = null): array
    {
        if ($columnName !== null && $recordName !== null) {
            $sql = "SELECT * FROM " . $tableName . " WHERE " . $columnName . " = " . '"' . $recordName . '"';
        } else {
            $sql = "SELECT * FROM " . $tableName;
        }
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createRecord(string $tableName, array $columnNames, array $newRecords): void
    {
        if (count($columnNames) === count($newRecords)) {
            $q = '?';
            if (count($columnNames) > 1) {
                for ($i = (count($columnNames)); $i > 1; $i--) {
                    $q = $q . ', ?';
                }
            }
            $columns = implode(", ", $columnNames);
            $sql = "INSERT INTO " . $tableName . " ( " . $columns . " ) " . " VALUES (" . $q . ")";
            $statement = $this->conn->prepare($sql);
            $statement->execute($newRecords);
        }
    }

    public function deleteRecord(string $tableName, string $columnIdName, int $recordID): void
    {
        $sql = "DELETE FROM " . $tableName . " WHERE " . $columnIdName . " = ? ";
        $statement = $this->conn->prepare($sql);
        $statement->execute([$recordID]);
    }

    public function editRecord(string $tableName, array $columnNames, array $editRecords, string $columnIdName, int $recordID): void
    {
        if (count($columnNames) === count($editRecords)) {
            $colsAndRecs = $columnNames[0] . '=' . '"' . $editRecords[0] . '"';
            for ($i = (count($columnNames) - 1); $i > 0; $i--) {
                $colsAndRecs = $colsAndRecs . ', ' . $columnNames[$i] . '=' . '"' . $editRecords[$i] . '"';
            }
            $sql = "UPDATE $tableName SET $colsAndRecs WHERE $columnIdName = $recordID";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        }
    }
}