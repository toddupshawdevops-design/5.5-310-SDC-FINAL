<?php
/**
 * Todd Upshaw
 * October 1, 2026
 * SDC310 - MVC Midterm Refactor
 * Model: Encapsulates all MySQL database connection and CRUD query execution.
 */

class AddressModel {
    private $conn;

    public function __construct() {
        $host = "localhost";
        $user = "ecpi_user";
        $password = "Password1";
        $database = "sdc310_midterm";

        $this->conn = new mysqli($host, $user, $password, $database);

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
    }

    // Retrieve all address records ordered by AddressNo
    public function getAllAddresses() {
        $sql = "SELECT * FROM addresses ORDER BY AddressNo";
        return $this->conn->query($sql);
    }

    // Fetch a single address record by primary key
    public function getAddressById($addressNo) {
        $sql = "SELECT * FROM addresses WHERE AddressNo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $addressNo);
        $stmt->execute();
        $result = $stmt->get_result();
        $record = $result->fetch_assoc();
        $stmt->close();
        return $record;
    }

    // Insert a new address into the database
    public function addAddress($first, $last, $street, $city, $state, $zip) {
        $sql = "INSERT INTO addresses (First, Last, Street, City, State, Zip) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $first, $last, $street, $city, $state, $zip);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    // Update an existing address record
    public function updateAddress($addressNo, $first, $last, $street, $city, $state, $zip) {
        $sql = "UPDATE addresses SET First = ?, Last = ?, Street = ?, City = ?, State = ?, Zip = ? WHERE AddressNo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $first, $last, $street, $city, $state, $zip, $addressNo);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    // Delete an address record by ID
    public function deleteAddress($addressNo) {
        $sql = "DELETE FROM addresses WHERE AddressNo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $addressNo);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
