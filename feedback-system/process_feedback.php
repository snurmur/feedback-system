<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $food_rating = $_POST['food_rating'];
    $service_rating = $_POST['service_rating'];
    $vibe_rating = $_POST['vibe_rating'];
    $reaction = $_POST['reaction'];  // Get the reaction value
    $comments = $_POST['comments'];

    // Step 1: Check if the email already exists in the 'users' table
    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        // If the user already exists, use their existing user_id
        $user_id = $existingUser['user_id'];
    } else {
        // If the user does not exist, insert a new user into the 'users' table
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $phone]);

        // Get the last inserted user ID
        $user_id = $pdo->lastInsertId();
    }

    // Step 2: Insert feedback into the 'feedback' table, linking it to the existing user
    $stmt = $pdo->prepare("INSERT INTO feedback (user_id, food_rating, service_rating, vibe_rating, reactions, comments) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $food_rating, $service_rating, $vibe_rating, $reaction, $comments]);

    // Display success message with the logo and banner style
    echo '
    <div style="background-color: #d62616; width:100% ; height: 300px;display: flex; justify-content: center; align-content: center; ">
        <img src="logo.png" alt="Logo" style="width: 300px; height: 300px;"/>
       
    </div>

    <div style=" display:flex; flex-direction:column; align-items:center; justify-content:center;">
     <h2 >Thank you for your feedback! </h2> 
     <p>Use code FREE20 on your next meal! You can submit another review anytime!</p>
     </div>';

}
?>
