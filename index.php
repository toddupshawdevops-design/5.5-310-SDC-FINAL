<?php
/**
 * Todd Upshaw
 * October 1, 2026
 * SDC310 - MVC Midterm Refactor
 * Controller: Handles incoming HTTP POST/GET requests, delegates logic to Model, and renders View.
 */

require_once __DIR__ . '/models/AddressModel.php';

$model = new AddressModel();

// Handle ADD action
if (isset($_POST["add_address"])) {
    $first  = $_POST["first"];
    $last   = $_POST["last"];
    $street = $_POST["street"];
    $city   = $_POST["city"];
    $state  = $_POST["state"];
    $zip    = $_POST["zip"];

    $model->addAddress($first, $last, $street, $city, $state, $zip);

    header("Location: index.php");
    exit();
}

// Handle UPDATE action
if (isset($_POST["update_address"])) {
    $addressNo = $_POST["AddressNo"];
    $first     = $_POST["first"];
    $last      = $_POST["last"];
    $street    = $_POST["street"];
    $city      = $_POST["city"];
    $state     = $_POST["state"];
    $zip       = $_POST["zip"];

    $model->updateAddress($addressNo, $first, $last, $street, $city, $state, $zip);

    header("Location: index.php");
    exit();
}

// Handle DELETE action
if (isset($_GET["delete"])) {
    $addressNo = $_GET["delete"];
    $model->deleteAddress($addressNo);

    header("Location: index.php");
    exit();
}

// Handle EDIT record fetching
$editRecord = null;
if (isset($_GET["edit"])) {
    $addressNo = $_GET["edit"];
    $editRecord = $model->getAddressById($addressNo);
}

// Fetch all records for UI rendering
$addresses = $model->getAllAddresses();

// Render View
require_once __DIR__ . '/views/address_view.php';
