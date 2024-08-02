<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1 {
    text-align: center;
    color: #333;
    padding: 20px 0;
}

.facility {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.facility h2 {
    color: #333;
}

.facility p {
    color: #666;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #207cca;
}

.booking-form {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
    display: none;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.booking-form h2 {
    color: #333;
}

label {
    display: block;
    margin: 10px 0;
    color: #555;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #27ae60;
}

    </style>
</head>
<body>

    <h1>Facilities</h1>

    <div class="facility">
        <h2>Private Dining Room</h2>
        <p>Our private dining room is perfect for special occasions and group events. It can accommodate up to 20 guests.</p>
        <p>Price: $200 per hour</p>
        <button onclick="showBookingForm('Private Dining Room', 'facility')">Edit</button>
    </div>

    <div class="facility">
        <h2>Outdoor Terrace</h2>
        <p>Enjoy the beautiful view from our outdoor terrace. Great for casual gatherings and parties.</p>
        <p>Price: $150 per hour</p>
        <button onclick="showBookingForm('Outdoor Terrace', 'facility')">Edit</button>
    </div>

    <div class="facility">
        <h2>Parking Facilities</h2>
        <p>We provide convenient parking facilities for our customers. Parking spaces are available on a first-come, first-served basis.</p>
        <p>Price: Free for restaurant customers</p>
        <button onclick="showBookingForm('Parking', 'parking')">Edit</button>
    </div>

    <div class="facility">
        <h2>seating capacities</h2>
        <p>We have 50 seets.</p>
        <p>Price: Free for restaurant customers</p>
        <button onclick="showBookingForm('seating capacities', 'facility')">Edit</button>
    </div>

    
</body>
</html>