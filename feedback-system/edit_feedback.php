<?php
include('db.php');

if (isset($_GET['id'])) {
    $feedback_id = $_GET['id'];

    // Fetch the feedback data to populate the form
    $stmt = $pdo->prepare("SELECT feedback_id, rating, comments FROM feedback WHERE feedback_id = ?");
    $stmt->execute([$feedback_id]);
    $feedback = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update feedback in the database
        $rating = $_POST['rating'];
        $comments = $_POST['comments'];

        $stmt = $pdo->prepare("UPDATE feedback SET rating = ?, comments = ? WHERE feedback_id = ?");
        $stmt->execute([$rating, $comments, $feedback_id]);

        echo "Feedback updated successfully!";
    }
} else {
    echo "No feedback ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Feedback</h1>
    <form action="edit_feedback.php?id=<?php echo $feedback['feedback_id']; ?>" method="POST">
        <label for="rating">Rating (1-5):</label>
        <select id="rating" name="rating" required>
            <option value="1" <?php echo $feedback['rating'] == 1 ? 'selected' : ''; ?>>1</option>
            <option value="2" <?php echo $feedback['rating'] == 2 ? 'selected' : ''; ?>>2</option>
            <option value="3" <?php echo $feedback['rating'] == 3 ? 'selected' : ''; ?>>3</option>
            <option value="4" <?php echo $feedback['rating'] == 4 ? 'selected' : ''; ?>>4</option>
            <option value="5" <?php echo $feedback['rating'] == 5 ? 'selected' : ''; ?>>5</option>
        </select><br><br>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" required><?php echo htmlspecialchars($feedback['comments']); ?></textarea><br><br>

        <input type="submit" value="Update Feedback">
    </form>
</body>
</html>
