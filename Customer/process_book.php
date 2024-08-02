<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Processing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .confirmation {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1>Booking Processing</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bookingType = isset($_POST["bookingType"]) ? $_POST["bookingType"] : "";
        $facilityName = isset($_POST["facilityName"]) ? $_POST["facilityName"] : "";
        $customerName = isset($_POST["customerName"]) ? $_POST["customerName"] : "";
        $bookingDate = isset($_POST["bookingDate"]) ? $_POST["bookingDate"] : "";
        $bookingTime = isset($_POST["bookingTime"]) ? $_POST["bookingTime"] : "";

        
        $to = "your-email@example.com";  
        $subject = "Booking Confirmation";
        $message = "Dear $customerName,\n\nThank you for your booking!\n\nBooking Details:\nType: $bookingType\nFacility: $facilityName\nDate: $bookingDate\nTime: $bookingTime\n\nWe look forward to serving you!";
        $headers = "From: webmaster@example.com";  

        
        $imagePath = "https://example.com/path/to/confirmation_image.jpg";

        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="confirmation">';
            echo '<p>Booking successful!</p>';
            echo '<p>A confirmation email has been sent to your email address.</p>';
            echo '<img src="' . $imagePath . '" alt="Booking Confirmation" style="max-width: 100%;">';
            echo '</div>';
        } else {
            echo '<p>There was an error processing your booking. Please try again later.</p>';
        }
    } else {
        echo '<p>Invalid request.</p>';
    }
    ?>

</body>
</html>