
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Feedback</title>
    <link rel="stylesheet" href="../Customer/cstyle.css"> <!-- You may link to your own stylesheet -->
</head>
<body>
    <h2>Restaurant Feedback</h2>

    <form action="process_feedback.php" method="post">
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" required>

        <br>

        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required>

        <br>

        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select>

        <br>

        <label for="comments">Comments:</label>
        <textarea name="comments" id="comments" rows="4" required></textarea>

        <br>

        <input type="submit" value="Submit Feedback">
    </form>
</body>
</html>
