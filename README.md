# SDC310 Midterm Project: Address Book Application (MVC Architecture)

**Student Name:** Todd Upshaw  
**Course:** SDC310 - PHP Web Application Development  
**Date:** October 1, 2026  

---

## Project Overview

This web application is a refactored, object-oriented implementation of the SDC310 Address Book application using the **Model-View-Controller (MVC)** architectural pattern. The system allows users to view, create, edit, and delete address records stored in a MySQL database while maintaining strict separation between database management, application routing, and user interface design.

---

## Architecture & Structure

The codebase is structured according to traditional MVC principles:

```text
sdc310_midterm_mvc/
├── css/
│   └── style.css           # Presentation styling separated from HTML views
├── models/
│   └── AddressModel.php    # Model: Handles MySQL queries and database connectivity
├── views/
│   └── address_view.php    # View: Renders HTML forms and data tables
├── index.php               # Controller: Handles incoming GET/POST requests and routing
└── README.md               # Project documentation
