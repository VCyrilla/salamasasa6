CREATE TABLE IF NOT EXISTS region (
    regionId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastUpdated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS specialization (
    specializationId INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastUpdated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS institution (
    institutionId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255),
    description VARCHAR(255),
    longitude VARCHAR(50),
    latitude VARCHAR(50),
    regionId INT,
    domain VARCHAR(50),
    imageUrl VARCHAR(255),
    FOREIGN KEY (regionId) REFERENCES region(regionId)
);

CREATE TABLE IF NOT EXISTS doctor (
    doctorId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    emailAddress VARCHAR(255) NOT NULL,
    isApproved BOOLEAN DEFAULT FALSE,
    isConfirmed BOOLEAN DEFAULT FALSE,
    imageUrl VARCHAR(255),
    specializationId INT,
    institutionId INT,
    licenseNumber VARCHAR(100),
    phoneNumber VARCHAR(50),
    passwordHash VARCHAR(255),
    gravatarHash VARCHAR(255),
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastUpdated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (specializationId) REFERENCES specialization(specializationId),
    FOREIGN KEY (institutionId) REFERENCES institution(institutionId)
);

CREATE TABLE IF NOT EXISTS patient (
    patientId INT AUTO_INCREMENT PRIMARY KEY,
    emailAddress VARCHAR(255) NOT NULL,
    gravatarHash VARCHAR(255),
    passwordHash VARCHAR(255),
    isConfirmed BOOLEAN DEFAULT FALSE,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastUpdated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS administrator (
    administratorId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    emailAddress VARCHAR(255) NOT NULL,
    imageUrl VARCHAR(255),
    phoneNumber VARCHAR(50),
    gravatarHash VARCHAR(255),
    passwordHash VARCHAR(255),
    isApproved BOOLEAN DEFAULT FALSE,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastUpdated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointment (
    appointmentId INT AUTO_INCREMENT PRIMARY KEY,
    patientId INT NOT NULL,
    doctorId INT NOT NULL,
    startTime TIME NOT NULL,
    endTime TIME NOT NULL,
    status VARCHAR(50),
    ratings INTEGER,
    review VARCHAR(255),
    doctorComments TEXT,
    summary TEXT,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastUpdated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patientId) REFERENCES patient(patientId),
    FOREIGN KEY (doctorId) REFERENCES doctor(doctorId)
);
