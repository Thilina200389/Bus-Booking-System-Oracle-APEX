# Bus Booking System (Oracle APEX & PHP)

This project is a functional bus timetable display and booking validation system. It demonstrates a full-stack approach by integrating **Oracle APEX** for backend data management and **RESTful Services** with a **PHP** frontend.

## Key Features
* **Live Bus Timetable:** Fetches today's active bus schedules via REST API and displays them in a modern interface.
* **Smart Booking Validation:** A 24-hour advance booking rule implemented via **PL/SQL Stored Procedures**.
* **RESTful API Architecture:** Secure endpoints for managing buses, customers, and bookings.

## Tech Stack
* **Database Backend:** Oracle APEX (PL/SQL, Triggers, Procedures)
* **API Layer:** Oracle REST Data Services (ORDS)
* **Frontend:** PHP (timetable.php) using Bootstrap for styling

## Setup & Installation

### 1. Database Configuration
* Import the provided SQL script into your Oracle APEX workspace.
* Ensure the **RESTful Services** are enabled for the schema.

### 2. API Integration
* Configure the REST endpoints as specified in the documentation (e.g., `/busbook/buses/`).
* Update the `$api_url` in `timetable.php` with your unique ORDS endpoint.

### 3. Execution
* Deploy the PHP file to a local server (WAMP/XAMPP) and access it via `localhost`.

## Application Preview

### Dynamic Bus Timetable (Fetched via REST API)
![Bus Timetable UI](screenshots/bus_timetable_ui.png)

---
*Developed for the Database Implementation module by Thilina Sandakelum Wijesinghe | Department of Software Technology at the University of Vocational Technology (UoVT)*
