# Salama Sasa

Strengthening Security and Operational Efficiency in Gender-Based Violence Healthcare Systems in Kenya

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Setup/Installation Instructions](#project-setupinstallation-instructions)
  - [Dependencies](#dependencies)
  - [Installation Steps](#installation-steps)
- [Usage Instructions](#usage-instructions)
  - [How to Run](#how-to-run)
  - [Examples](#examples)
- [Input/Output](#inputoutput)
- [Contributing](#contributing)
- [Project Structure](#projectstructure)
- [License](#license)
- [Contact](#contact)


## Introduction

Salama Sasa is the first system designed to revolutionize the way Gender-Based Violence (GBV) patients access specialist services. This system is especially crucial in the context of healthcare, where privacy is paramount. GBV patients often face infringements of their data privacy, and this project proposes a solution that allows data sharing for statistical analysis without accessing individual low-level details.

The system includes a user-friendly interface that enables GBV patients to book appointments with specialists and offers unbiased healthcare service providers. It also features anonymous but verified reviews of doctors, clinics, and services, making it an invaluable resource for providing more equitable healthcare services.

Salama Sasa focuses specifically on GBV patients, highlighting them as a realistic use case for this system. The system is expected to revolutionize the way GBV patients access specialist services, reinforce patient tracking, and provide a platform for feedback on treatments.

## Features

- **User-Friendly Interface**: Easy navigation for booking appointments and accessing services.
- **Privacy Focused**: Ensures data privacy for GBV patients.
- **Anonymous Reviews**: Verified, anonymous reviews of healthcare providers.
- **Specialist Services**: Connects patients with specialized healthcare providers.
- **Statistical Analysis**: Allows data sharing for statistical purposes without compromising individual privacy.

## Technologies Used

- **PHP**: The core programming language used for server-side scripting.
- **CodeIgniter**: A powerful PHP framework with a very small footprint.
- **JavaScript**: For client-side scripting and dynamic content.
- **MySQL**: Open-source relational database management system.
- **PHPUnit**: Testing framework for PHP.

## Project Setup/Installation Instructions

### Dependencies

The project depends on the following external libraries, frameworks, or packages:

- **PHP**: Ensure you have PHP installed on your system. You can download it from the [official PHP website](https://www.php.net/downloads).
- **Composer**: Tool for dependency management in PHP. Download it from the [official Composer website](https://getcomposer.org/download/).
- **CodeIgniter**: Download it from the [official CodeIgniter website](https://codeigniter.com/download).
- **MySQL**: Download it from the [official MySQL website](https://dev.mysql.com/downloads/).

### Installation Steps

1. **Clone the Repository**: Clone the project repository to your local machine.
    ```sh
    git clone https://github.com/VCyrilla/salamasasa5.git
    ```

2. **Install Composer**: If you haven’t installed Composer, download it from the [official website](https://getcomposer.org/download/) and follow the installation instructions.

3. **Install Dependencies**: Navigate to the project directory and run:
    ```sh
    composer install
    ```

4. **Setup CodeIgniter**: Install CodeIgniter into your project directory.
    ```sh
    composer require codeigniter/framework
    ```

5. **Setup MySQL**: Install MySQL and set up a new database for your project. Note the database name, username, and password for configuration.

6. **Configure Project**: Open the `application/config/database.php` file and set your database settings.

7. **Run Migrations**: If your project uses database migrations, run them:
    ```sh
    php index.php migrate
    ```

8. **Start the Server**: Start the PHP built-in server.
    ```sh
    php -S localhost:8080 -t public/
    ```
    Your application will be available at [http://localhost:8080](http://localhost:8080).

## Usage Instructions

### How to Run

1. **Start the Server**: Navigate to the project directory and run:
    ```sh
    php -S localhost:8080 -t public/
    ```
2. **Access the Application**: Open a web browser and navigate to [http://localhost:8080](http://localhost:8080).

### Examples

- **Booking Appointments**: Patients can book appointments with specialists through the user-friendly interface. Select the specialist, choose the date and time, and confirm the booking.
- **Reviewing Services**: Patients can leave anonymous but verified reviews of doctors, clinics, and services. Navigate to the review section, select the service used, and leave a review.

## Input/Output

- **Input**: The system expects inputs in the form of user actions, such as booking an appointment with details like the specialist’s name, date, and time.
- **Output**: The system generates outputs in the form of web pages, such as a confirmation page with appointment details after booking.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Open a Pull Request.

 ##  Project structure

└───doctors
    ├───app
    │   ├───Config
    │   │   └───Boot
    │   ├───Controllers
    │   │   ├───Admin
    │   │   ├───Auth
    │   │   ├───Doctor
    │   │   ├───Main
    │   │   └───Patient
    │   ├───Database
    │   │   ├───Migrations
    │   │   └───Seeds
    │   ├───Filters
    │   ├───Helpers
    │   ├───Language
    │   │   └───en
    │   ├───Libraries
    │   ├───Models
    │   ├───ThirdParty
    │   └───Views
    │       ├───admin
    │       │   ├───appointment
    │       │   ├───doctor
    │       │   ├───institution
    │       │   ├───region
    │       │   └───specialization
    │       ├───doctor
    │       │   └───appointment
    │       ├───emails
    │       ├───errors
    │       │   ├───cli
    │       │   └───html
    │       ├───main
    │       ├───patient
    │       │   ├───appointment
    │       │   └───doctor
    │       └───templates
    ├───assets
    │   ├───css
    │   ├───images
    │   └───js
    ├───public
    │   └───images
    ├───tests
    │   ├───database
    │   ├───session
    │   ├───unit
    │   └───_support
    │       ├───Database
    │       │   ├───Migrations
    │       │   └───Seeds
    │       ├───Libraries
    │       └───Models
    ├───vendor
    │   ├───bin
    │   ├───codeigniter4
    │   │   └───framework
    │   │       ├───app
    │   │       │   ├───Config
    │   │       │   │   └───Boot
    │   │       │   ├───Controllers
    │   │       │   ├───Database
    │   │       │   │   ├───Migrations
    │   │       │   │   └───Seeds
    │   │       │   ├───Filters
    │   │       │   ├───Helpers
    │   │       │   ├───Language
    │   │       │   │   └───en
    │   │       │   ├───Libraries
    │   │       │   ├───Models
    │   │       │   ├───ThirdParty
    │   │       │   └───Views
    │   │       │       └───errors
    │   │       │           ├───cli
    │   │       │           └───html
    │   │       ├───public
    │   │       ├───system
    │   │       │   ├───API
    │   │       │   ├───Autoloader
    │   │       │   ├───Cache
    │   │       │   │   ├───Exceptions
    │   │       │   │   ├───FactoriesCache
    │   │       │   │   └───Handlers
    │   │       │   ├───CLI
    │   │       │   │   └───Exceptions
    │   │       │   ├───Commands
    │   │       │   │   ├───Cache
    │   │       │   │   ├───Database
    │   │       │   │   ├───Encryption
    │   │       │   │   ├───Generators
    │   │       │   │   │   └───Views
    │   │       │   │   ├───Housekeeping
    │   │       │   │   ├───Server
    │   │       │   │   ├───Translation
    │   │       │   │   └───Utilities
    │   │       │   │       └───Routes
    │   │       │   │           └───AutoRouterImproved
    │   │       │   ├───Config
    │   │       │   ├───Cookie
    │   │       │   │   └───Exceptions
    │   │       │   ├───Database
    │   │       │   │   ├───Exceptions
    │   │       │   │   ├───MySQLi
    │   │       │   │   ├───OCI8
    │   │       │   │   ├───Postgre
    │   │       │   │   ├───SQLite3
    │   │       │   │   └───SQLSRV
    │   │       │   ├───DataCaster
    │   │       │   │   ├───Cast
    │   │       │   │   └───Exceptions
    │   │       │   ├───DataConverter
    │   │       │   ├───Debug
    │   │       │   │   └───Toolbar
    │   │       │   │       ├───Collectors
    │   │       │   │       └───Views
    │   │       │   ├───Email
    │   │       │   ├───Encryption
    │   │       │   │   ├───Exceptions
    │   │       │   │   └───Handlers
    │   │       │   ├───Entity
    │   │       │   │   ├───Cast
    │   │       │   │   └───Exceptions
    │   │       │   ├───Events
    │   │       │   ├───Exceptions
    │   │       │   ├───Files
    │   │       │   │   └───Exceptions
    │   │       │   ├───Filters
    │   │       │   │   └───Exceptions
    │   │       │   ├───Format
    │   │       │   │   └───Exceptions
    │   │       │   ├───Helpers
    │   │       │   │   └───Array
    │   │       │   ├───Honeypot
    │   │       │   │   └───Exceptions
    │   │       │   ├───HotReloader
    │   │       │   ├───HTTP
    │   │       │   │   ├───Exceptions
    │   │       │   │   └───Files
    │   │       │   ├───I18n
    │   │       │   │   └───Exceptions
    │   │       │   ├───Images
    │   │       │   │   ├───Exceptions
    │   │       │   │   └───Handlers
    │   │       │   ├───Language
    │   │       │   │   └───en
    │   │       │   ├───Log
    │   │       │   │   ├───Exceptions
    │   │       │   │   └───Handlers
    │   │       │   ├───Modules
    │   │       │   ├───Pager
    │   │       │   │   ├───Exceptions
    │   │       │   │   └───Views
    │   │       │   ├───Publisher
    │   │       │   │   └───Exceptions
    │   │       │   ├───RESTful
    │   │       │   ├───Router
    │   │       │   │   └───Exceptions
    │   │       │   ├───Security
    │   │       │   │   └───Exceptions
    │   │       │   ├───Session
    │   │       │   │   ├───Exceptions
    │   │       │   │   └───Handlers
    │   │       │   │       └───Database
    │   │       │   ├───Test
    │   │       │   │   ├───Constraints
    │   │       │   │   ├───Filters
    │   │       │   │   ├───Interfaces
    │   │       │   │   └───Mock
    │   │       │   ├───ThirdParty
    │   │       │   │   ├───Escaper
    │   │       │   │   │   └───Exception
    │   │       │   │   ├───Kint
    │   │       │   │   │   ├───Parser
    │   │       │   │   │   ├───Renderer
    │   │       │   │   │   │   ├───Rich
    │   │       │   │   │   │   └───Text
    │   │       │   │   │   ├───resources
    │   │       │   │   │   │   └───compiled
    │   │       │   │   │   └───Zval
    │   │       │   │   │       └───Representation
    │   │       │   │   └───PSR
    │   │       │   │       └───Log
    │   │       │   ├───Throttle
    │   │       │   ├───Traits
    │   │       │   ├───Typography
    │   │       │   ├───Validation
    │   │       │   │   ├───Exceptions
    │   │       │   │   ├───StrictRules
    │   │       │   │   └───Views
    │   │       │   └───View
    │   │       │       ├───Cells
    │   │       │       └───Exceptions
    │   │       ├───tests
    │   │       │   ├───database
    │   │       │   ├───session
    │   │       │   ├───unit
    │   │       │   └───_support
    │   │       │       ├───Database
    │   │       │       │   ├───Migrations
    │   │       │       │   └───Seeds
    │   │       │       ├───Libraries
    │   │       │       └───Models
    │   │       └───writable
    │   │           ├───cache
    │   │           ├───logs
    │   │           ├───session
    │   │           └───uploads
    │   ├───composer
    │   ├───fakerphp
    │   │   └───faker
    │   │       └───src
    │   │           └───Faker
    │   │               ├───Calculator
    │   │               ├───Container
    │   │               ├───Core
    │   │               ├───Extension
    │   │               ├───Guesser
    │   │               ├───ORM
    │   │               │   ├───CakePHP
    │   │               │   ├───Doctrine
    │   │               │   ├───Mandango
    │   │               │   ├───Propel
    │   │               │   ├───Propel2
    │   │               │   └───Spot
    │   │               └───Provider
    │   │                   ├───ar_EG
    │   │                   ├───ar_JO
    │   │                   ├───ar_SA
    │   │                   ├───at_AT
    │   │                   ├───bg_BG
    │   │                   ├───bn_BD
    │   │                   ├───cs_CZ
    │   │                   ├───da_DK
    │   │                   ├───de_AT
    │   │                   ├───de_CH
    │   │                   ├───de_DE
    │   │                   ├───el_CY
    │   │                   ├───el_GR
    │   │                   ├───en_AU
    │   │                   ├───en_CA
    │   │                   ├───en_GB
    │   │                   ├───en_HK
    │   │                   ├───en_IN
    │   │                   ├───en_NG
    │   │                   ├───en_NZ
    │   │                   ├───en_PH
    │   │                   ├───en_SG
    │   │                   ├───en_UG
    │   │                   ├───en_US
    │   │                   ├───en_ZA
    │   │                   ├───es_AR
    │   │                   ├───es_ES
    │   │                   ├───es_PE
    │   │                   ├───es_VE
    │   │                   ├───et_EE
    │   │                   ├───fa_IR
    │   │                   ├───fi_FI
    │   │                   ├───fr_BE
    │   │                   ├───fr_CA
    │   │                   ├───fr_CH
    │   │                   ├───fr_FR
    │   │                   ├───he_IL
    │   │                   ├───hr_HR
    │   │                   ├───hu_HU
    │   │                   ├───hy_AM
    │   │                   ├───id_ID
    │   │                   ├───is_IS
    │   │                   ├───it_CH
    │   │                   ├───it_IT
    │   │                   ├───ja_JP
    │   │                   ├───ka_GE
    │   │                   ├───kk_KZ
    │   │                   ├───ko_KR
    │   │                   ├───lt_LT
    │   │                   ├───lv_LV
    │   │                   ├───me_ME
    │   │                   ├───mn_MN
    │   │                   ├───ms_MY
    │   │                   ├───nb_NO
    │   │                   ├───ne_NP
    │   │                   ├───nl_BE
    │   │                   ├───nl_NL
    │   │                   ├───pl_PL
    │   │                   ├───pt_BR
    │   │                   ├───pt_PT
    │   │                   ├───ro_MD
    │   │                   ├───ro_RO
    │   │                   ├───ru_RU
    │   │                   ├───sk_SK
    │   │                   ├───sl_SI
    │   │                   ├───sr_Cyrl_RS
    │   │                   ├───sr_Latn_RS
    │   │                   ├───sr_RS
    │   │                   ├───sv_SE
    │   │                   ├───th_TH
    │   │                   ├───tr_TR
    │   │                   ├───uk_UA
    │   │                   ├───vi_VN
    │   │                   ├───zh_CN
    │   │                   └───zh_TW
    │   ├───laminas
    │   │   └───laminas-escaper
    │   │       └───src
    │   │           └───Exception
    │   ├───mikey179
    │   │   └───vfsstream
    │   │       └───src
    │   │           ├───main
    │   │           │   └───php
    │   │           │       └───org
    │   │           │           └───bovigo
    │   │           │               └───vfs
    │   │           │                   ├───content
    │   │           │                   └───visitor
    │   │           └───test
    │   │               ├───patches
    │   │               ├───php
    │   │               │   └───org
    │   │               │       └───bovigo
    │   │               │           └───vfs
    │   │               │               ├───content
    │   │               │               ├───proxy
    │   │               │               └───visitor
    │   │               ├───phpt
    │   │               └───resources
    │   │                   └───filesystemcopy
    │   │                       ├───emptyFolder
    │   │                       └───withSubfolders
    │   │                           ├───subfolder1
    │   │                           └───subfolder2
    │   ├───myclabs
    │   │   └───deep-copy
    │   │       └───src
    │   │           └───DeepCopy
    │   │               ├───Exception
    │   │               ├───Filter
    │   │               │   └───Doctrine
    │   │               ├───Matcher
    │   │               │   └───Doctrine
    │   │               ├───Reflection
    │   │               ├───TypeFilter
    │   │               │   ├───Date
    │   │               │   └───Spl
    │   │               └───TypeMatcher
    │   ├───nikic
    │   │   └───php-parser
    │   │       ├───bin
    │   │       └───lib
    │   │           └───PhpParser
    │   │               ├───Builder
    │   │               ├───Comment
    │   │               ├───ErrorHandler
    │   │               ├───Internal
    │   │               ├───Lexer
    │   │               │   └───TokenEmulator
    │   │               ├───Node
    │   │               │   ├───Expr
    │   │               │   │   ├───AssignOp
    │   │               │   │   ├───BinaryOp
    │   │               │   │   └───Cast
    │   │               │   ├───Name
    │   │               │   ├───Scalar
    │   │               │   │   └───MagicConst
    │   │               │   └───Stmt
    │   │               │       └───TraitUseAdaptation
    │   │               ├───NodeVisitor
    │   │               ├───Parser
    │   │               └───PrettyPrinter
    │   ├───phar-io
    │   │   ├───manifest
    │   │   │   ├───src
    │   │   │   │   ├───exceptions
    │   │   │   │   ├───values
    │   │   │   │   └───xml
    │   │   │   └───tools
    │   │   │       └───php-cs-fixer.d
    │   │   └───version
    │   │       └───src
    │   │           ├───constraints
    │   │           └───exceptions
    │   ├───phpunit
    │   │   ├───php-code-coverage
    │   │   │   └───src
    │   │   │       ├───Data
    │   │   │       ├───Driver
    │   │   │       ├───Exception
    │   │   │       ├───Node
    │   │   │       ├───Report
    │   │   │       │   ├───Html
    │   │   │       │   │   └───Renderer
    │   │   │       │   │       └───Template
    │   │   │       │   │           ├───css
    │   │   │       │   │           ├───icons
    │   │   │       │   │           └───js
    │   │   │       │   └───Xml
    │   │   │       ├───StaticAnalysis
    │   │   │       ├───TestSize
    │   │   │       ├───TestStatus
    │   │   │       └───Util
    │   │   ├───php-file-iterator
    │   │   │   └───src
    │   │   ├───php-invoker
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   ├───php-text-template
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   ├───php-timer
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   └───phpunit
    │   │       ├───schema
    │   │       └───src
    │   │           ├───Event
    │   │           │   ├───Dispatcher
    │   │           │   ├───Emitter
    │   │           │   ├───Events
    │   │           │   │   ├───Application
    │   │           │   │   ├───Test
    │   │           │   │   │   ├───Assertion
    │   │           │   │   │   ├───HookMethod
    │   │           │   │   │   ├───Issue
    │   │           │   │   │   ├───Lifecycle
    │   │           │   │   │   ├───Outcome
    │   │           │   │   │   └───TestDouble
    │   │           │   │   ├───TestRunner
    │   │           │   │   └───TestSuite
    │   │           │   ├───Exception
    │   │           │   └───Value
    │   │           │       ├───Runtime
    │   │           │       ├───Telemetry
    │   │           │       ├───Test
    │   │           │       │   └───TestData
    │   │           │       └───TestSuite
    │   │           ├───Framework
    │   │           │   ├───Assert
    │   │           │   ├───Attributes
    │   │           │   ├───Constraint
    │   │           │   │   ├───Boolean
    │   │           │   │   ├───Cardinality
    │   │           │   │   ├───Equality
    │   │           │   │   ├───Exception
    │   │           │   │   ├───Filesystem
    │   │           │   │   ├───Math
    │   │           │   │   ├───Object
    │   │           │   │   ├───Operator
    │   │           │   │   ├───String
    │   │           │   │   ├───Traversable
    │   │           │   │   └───Type
    │   │           │   ├───Exception
    │   │           │   │   ├───Incomplete
    │   │           │   │   ├───ObjectEquals
    │   │           │   │   └───Skipped
    │   │           │   ├───MockObject
    │   │           │   │   ├───Exception
    │   │           │   │   ├───Generator
    │   │           │   │   │   ├───Exception
    │   │           │   │   │   └───templates
    │   │           │   │   └───Runtime
    │   │           │   │       ├───Api
    │   │           │   │       ├───Builder
    │   │           │   │       ├───Interface
    │   │           │   │       ├───Rule
    │   │           │   │       └───Stub
    │   │           │   ├───TestSize
    │   │           │   └───TestStatus
    │   │           ├───Logging
    │   │           │   ├───JUnit
    │   │           │   │   └───Subscriber
    │   │           │   ├───TeamCity
    │   │           │   │   └───Subscriber
    │   │           │   └───TestDox
    │   │           │       └───TestResult
    │   │           │           └───Subscriber
    │   │           ├───Metadata
    │   │           │   ├───Api
    │   │           │   ├───Exception
    │   │           │   ├───Parser
    │   │           │   │   └───Annotation
    │   │           │   └───Version
    │   │           ├───Runner
    │   │           │   ├───Baseline
    │   │           │   │   ├───Exception
    │   │           │   │   └───Subscriber
    │   │           │   ├───Exception
    │   │           │   ├───Extension
    │   │           │   ├───Filter
    │   │           │   ├───GarbageCollection
    │   │           │   │   └───Subscriber
    │   │           │   ├───ResultCache
    │   │           │   │   └───Subscriber
    │   │           │   └───TestResult
    │   │           │       └───Subscriber
    │   │           ├───TextUI
    │   │           │   ├───Command
    │   │           │   │   └───Commands
    │   │           │   ├───Configuration
    │   │           │   │   ├───Cli
    │   │           │   │   ├───Exception
    │   │           │   │   ├───Value
    │   │           │   │   └───Xml
    │   │           │   │       ├───CodeCoverage
    │   │           │   │       │   └───Report
    │   │           │   │       ├───Logging
    │   │           │   │       │   └───TestDox
    │   │           │   │       ├───Migration
    │   │           │   │       │   └───Migrations
    │   │           │   │       ├───SchemaDetector
    │   │           │   │       └───Validator
    │   │           │   ├───Exception
    │   │           │   └───Output
    │   │           │       ├───Default
    │   │           │       │   └───ProgressPrinter
    │   │           │       │       └───Subscriber
    │   │           │       ├───Printer
    │   │           │       └───TestDox
    │   │           └───Util
    │   │               ├───Exception
    │   │               ├───PHP
    │   │               │   └───Template
    │   │               └───Xml
    │   ├───psr
    │   │   ├───container
    │   │   │   └───src
    │   │   └───log
    │   │       └───src
    │   ├───sebastian
    │   │   ├───cli-parser
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   ├───code-unit
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   ├───code-unit-reverse-lookup
    │   │   │   └───src
    │   │   ├───comparator
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   ├───complexity
    │   │   │   └───src
    │   │   │       ├───Complexity
    │   │   │       ├───Exception
    │   │   │       └───Visitor
    │   │   ├───diff
    │   │   │   └───src
    │   │   │       ├───Exception
    │   │   │       └───Output
    │   │   ├───environment
    │   │   │   └───src
    │   │   ├───exporter
    │   │   │   └───src
    │   │   ├───global-state
    │   │   │   └───src
    │   │   │       └───exceptions
    │   │   ├───lines-of-code
    │   │   │   └───src
    │   │   │       └───Exception
    │   │   ├───object-enumerator
    │   │   │   └───src
    │   │   ├───object-reflector
    │   │   │   └───src
    │   │   ├───recursion-context
    │   │   │   └───src
    │   │   ├───type
    │   │   │   └───src
    │   │   │       ├───exception
    │   │   │       └───type
    │   │   └───version
    │   │       └───src
    │   ├───symfony
    │   │   └───deprecation-contracts
    │   └───theseer
    │       └───tokenizer
    │           └───src
    └───writable
        ├───cache
        ├───debugbar
        ├───logs
        ├───session
        └───uploads

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.


## Contact

For questions or inquiries, please contact the project maintainer at [mona.marima@strathmore.edu]OR at (mailto:vanessa.cyrilla@strathmore.edu).
