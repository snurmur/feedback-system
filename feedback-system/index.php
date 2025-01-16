<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner"><img src="logo.png" alt="Logo" style="widht: 300px; height: 300px;"/></div>
    
    <h1>Tell Us About Your Experience!</h1>
    <p>Help us improve, and get a dessert on the house next time you visit!</p>

    <form action="process_feedback.php" method="POST">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Your Phone Number:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="food_rating">Food Rating (1-5):</label>
    <select id="food_rating" name="food_rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br><br>

    <label for="service_rating">Waiter Service Rating (1-5):</label>
    <select id="service_rating" name="service_rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br><br>

    <label for="vibe_rating">Vibe of the Place (1-5):</label>
    <select id="vibe_rating" name="vibe_rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br><br>
    <label for="reaction">Choose your reaction:</label>
    <div class="emoji-box">
   <br>
    <label class="emoji"><input type="radio" name="reaction" value="😊" required> 😊</label>
    <label class="emoji"><input type="radio" name="reaction" value="😋" required> 😋</label>
    <label class="emoji"><input type="radio" name="reaction" value="🤩" required> 🤩</label>
    <label class="emoji"><input type="radio" name="reaction" value="😢" required> 😢</label>
    <label class="emoji"><input type="radio" name="reaction" value="😡" required> 😡</label><br><br>
</div>
    <label for="comments">Your Feedback:</label>
    <textarea id="comments" name="comments" required></textarea><br><br>

    <input class="button" type="submit" value="Submit Feedback">
</form>
</body>
