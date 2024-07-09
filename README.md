# Salama Sasa
# Strengthening Security and Operational Efficiency in Gender-Based Violence Healthcare Systems in Kenya

Table of Contents
Introduction
Features
Technologies Used
Project Setup/Installation Instructions
Dependencies
Installation Steps
Usage Instructions
How to Run
Examples
Input/Output
Contributing
License
Contact
# Introduction
Salama Sasa is the first system designed to revolutionize the way Gender-Based Violence (GBV) patients access specialist services. This system is especially crucial in the context of healthcare, where privacy is paramount. GBV patients often face infringements of their data privacy, and this project proposes a solution that allows data sharing for statistical analysis without accessing individual low-level details.

The system includes a user-friendly interface that enables GBV patients to book appointments with specialists and offers unbiased healthcare service providers. It also features anonymous but verified reviews of doctors, clinics, and services, making it an invaluable resource for providing more equitable healthcare services.

Salama Sasa focuses specifically on GBV patients, highlighting them as a realistic use case for this system. The system is expected to revolutionize the way GBV patients access specialist services, reinforce patient tracking, and provide a platform for feedback on treatments.

# Features
User-Friendly Interface: Easy navigation for booking appointments and accessing services.
Privacy Focused: Ensures data privacy for GBV patients.
Anonymous Reviews: Verified, anonymous reviews of healthcare providers.
Specialist Services: Connects patients with specialized healthcare providers.
Statistical Analysis: Allows data sharing for statistical purposes without compromising individual privacy.
# Technologies Used
PHP: The core programming language used for server-side scripting.
CodeIgniter: A powerful PHP framework with a very small footprint.
JavaScript: For client-side scripting and dynamic content.
MySQL: Open-source relational database management system.
PHPUnit: Testing framework for PHP.
Project Setup/Installation Instructions
# Dependencies
The project depends on the following external libraries, frameworks, or packages:

PHP: Ensure you have PHP installed on your system. You can download it from the official PHP website.
Composer: Tool for dependency management in PHP. Download it from the official Composer website.
CodeIgniter: Download it from the official CodeIgniter website.
MySQL: Download it from the official MySQL website.
# Installation Steps
Clone the Repository: Clone the project repository to your local machine.

git clone https://github.com/VCyrilla/salamasasa5.git
Install Composer: If you haven’t installed Composer, download it from the official website and follow the installation instructions.

Install Dependencies: Navigate to the project directory and run:

composer install
Setup CodeIgniter: Install CodeIgniter into your project directory.

composer require codeigniter/framework
Setup MySQL: Install MySQL and set up a new database for your project. Note the database name, username, and password for configuration.

Configure Project: Open the application/config/database.php file and set your database settings.

Run Migrations: If your project uses database migrations, run them:

php index.php migrate
Start the Server: Start the PHP built-in server.

php -S localhost:8080 -t public/
Your application will be available at http://localhost:8080.

# Usage Instructions
How to Run
Start the Server: Navigate to the project directory and run:
php -S localhost:8080 -t public/
Access the Application: Open a web browser and navigate to http://localhost:8080.
Examples
Booking Appointments: Patients can book appointments with specialists through the user-friendly interface. Select the specialist, choose the date and time, and confirm the booking.
Reviewing Services: Patients can leave anonymous but verified reviews of doctors, clinics, and services. Navigate to the review section, select the service used, and leave a review.
# Input/Output
Input: The system expects inputs in the form of user actions, such as booking an appointment with details like the specialist’s name, date, and time.
Output: The system generates outputs in the form of web pages, such as a confirmation page with appointment details after booking.
# Contributing
Contributions are welcome! Please follow these steps to contribute:

Fork the repository.
Create a new branch (git checkout -b feature-branch).
Make your changes.
Commit your changes (git commit -m 'Add new feature').
Push to the branch (git push origin feature-branch).
Open a Pull Request.
# License
This project is licensed under the MIT License. See the LICENSE file for details.

# Contact
For questions or inquiries, please contact the project maintainer at [mona.marima@strathmore.edu]OR at (mailto:vanessa.cyrilla@strathmore.edu).
