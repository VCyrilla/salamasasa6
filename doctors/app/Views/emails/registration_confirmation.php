<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Salama Sasa: Please Confirm Your Registration</title>
</head>
<body>
    <p>Dear <?= $email ?>,</p>
    <p>Thank you for registering with Salama Sasa, your trusted partner in Gender-Based Violence (GBV) healthcare support.</p>
    <p>To complete your registration, please confirm your email address by clicking the link below:</p>
    <p><a href="<?= site_url('/patient/confirm/' . urlencode($email)) ?>">Confirm Your Email Address</a></p>
    <p>If you did not register for an account with Salama Sasa, please disregard this email.</p>
    <p>Why Confirm Your Email?</p>
    <ul>
        <li>Access our network of specialized GBV healthcare providers.</li>
        <li>Schedule and manage appointments easily.</li>
        <li>Ensure your privacy and data security.</li>
    </ul>
    <p>If you have any questions or need assistance, please do not hesitate to contact our support team at support@salamasasa.org.</p>
    <p>Thank you for joining Salama Sasa. Together, we can make a difference.</p>
    <p>Warm regards,</p>
    <p>The Salama Sasa Team</p>
</body>
</html>
