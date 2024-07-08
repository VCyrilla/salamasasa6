# Salama Sasa: Strengthening Security and Operational Efficiency in Gender-Based Violence Healthcare Systems in Kenya

**Salama Sasa** is the first system designed to revolutionize the way GBV patients access specialist services. This system is especially crucial in the context of healthcare, where privacy is paramount. GBV patients often face infringements of their data privacy, and this project proposes a solution that allows data sharing for statistical analysis without accessing individual low-level details.

The system includes a user-friendly interface that enables GBV patients to book appointments with specialists and offers unbiased healthcare service providers. It also features anonymous but verified reviews of doctors, clinics, and services, making it an invaluable resource for providing more equitable healthcare services.

Salama Sasa will be implemented using the PHP framework, borrowing heavily from some JavaScript,  with MySQL for the database system and testing tools such as PHPUnit.

Salama Sasa focuses specifically on GBV patients highlighting them as a realistic use case for this system. The system is expected to revolutionize the way GBV patients access specialist services, reinforce patient tracking, and provide a platform for feedback on treatments.

## Project Setup/Installation Instructions

### Dependencies

The project depends on the following external libraries, frameworks, or packages:

- **PHP**: Ensure you have PHP installed on your system. You can download it from the official PHP website.
- **Composer**: This is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you. You can download it from the official Composer website.
- **CodeIgniter**: This is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications. You can download it from the official CodeIgniter website.
- **MySQL**: This is an open-source relational database management system. You can download it from the official MySQL website.

### Installation Steps

Follow these steps to set up the project environment and run the code:

1. **Clone the Repository**: Clone the project repository to your local machine using the command `git clone <https://github.com/VCyrilla/salamasasa5>` in Git Bash.
2. **Install Composer**: If you haven’t installed Composer, download it from the official website and follow the installation instructions.
3. **Install Dependencies**: Navigate to the project directory in your Command Prompt and run `composer install`. This will install all the necessary dependencies for the project.
4. **Setup CodeIgniter**: Download and install CodeIgniter into your project directory. You can do this by running `composer require codeigniter/framework`.
5. **Setup MySQL**: Install MySQL and set up a new database for your project. Make sure to note the database name, username, and password as you will need these details to configure your project.
6. **Configure Project**: Open the `application/config/database.php` file with a text editor and set your database settings.
7. **Run Migrations**: If your project uses database migrations, run them using the command `php index.php migrate`.
8. **Start the Server**: You can start the server using the command `php -S localhost:8080 -t public/`. Your application will be available at `http://localhost:8080`.

## Usage Instructions

### How to Run

- **Start the Server**: Navigate to the project directory in your Command Prompt and run the command `php -S localhost:8080 -t public/`. This will start the server and your application will be available at `http://localhost:8080`.
- **Access the Application**: Open a web browser and navigate to `http://localhost:8080` to access the application.

### Examples

Here are some examples of how to use different features or functionalities of your project:

- **Booking Appointments**: Patients can book appointments with specialists through the user-friendly interface. They just need to select the specialist, choose the date and time, and confirm the booking.
- **Reviewing Services**: Patients can leave anonymous but verified reviews of doctors, clinics, and services. They just need to navigate to the review section, select the service they used, and leave a review.

### Input/Output

The expected input format and the type of output the project generates are as follows:

- **Input**: The system expects inputs in the form of user actions. For example, when booking an appointment, the patient will need to provide details such as the specialist’s name, date, and time.
- **Output**: The system generates outputs in the form of web pages. For example, after booking an appointment, the system will display a confirmation page with the details of the appointment.
