<?php
include('db.php');  // Assuming you have a database connection set up

// Fetch the average ratings grouped by month
$stmt = $pdo->prepare("
    SELECT 
        DATE_FORMAT(date_submitted, '%Y-%m') AS month,  -- Format as YYYY-MM to group by month
        AVG(food_rating) AS avg_food_rating,
        AVG(service_rating) AS avg_service_rating,
        AVG(vibe_rating) AS avg_vibe_rating
    FROM feedback
    GROUP BY DATE_FORMAT(date_submitted, '%Y-%m')  -- Group by month and year
    ORDER BY DATE_FORMAT(date_submitted, '%Y-%m') ASC
");
$stmt->execute();
$feedback_data = $stmt->fetchAll();

// Prepare data for Chart.js
$months = [];
$avg_food_ratings = [];
$avg_service_ratings = [];
$avg_vibe_ratings = [];

foreach ($feedback_data as $row) {
    $months[] = $row['month'];
    $avg_food_ratings[] = $row['avg_food_rating'];
    $avg_service_ratings[] = $row['avg_service_rating'];
    $avg_vibe_ratings[] = $row['avg_vibe_rating'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

   <div style="background-color: #d62616; width:100% ; height: 300px;display: flex; justify-content: center; align-content: center; ">
        <img src="logo.png" alt="Logo" style="width: 300px; height: 300px;"/>
    </div>

    <h1>Admin Dashboard</h1>

    <!-- Bar Chart with smaller size -->
    <div style="width: 80%; max-width: 700px; margin: auto;">
        <canvas id="ratingChart" width="500" height="250"></canvas>
    </div>

    <h2>Feedback Data</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Food Rating</th>
                <th>Service Rating</th>
                <th>Vibe Rating</th>
                <th>Reaction</th>
                <th>Comments</th>
                <th>Date Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all feedback records to display in the table
            $stmt = $pdo->prepare("SELECT f.*, u.name, u.email FROM feedback f INNER JOIN users u ON f.user_id = u.user_id");
            $stmt->execute();
            $feedbacks = $stmt->fetchAll();  // Fetch all feedback records

            // Loop through all feedback records and display them in the table
            foreach ($feedbacks as $feedback) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($feedback['name']) . '</td>';
                echo '<td>' . htmlspecialchars($feedback['email']) . '</td>';
                echo '<td>' . htmlspecialchars($feedback['food_rating']) . '</td>';
                echo '<td>' . htmlspecialchars($feedback['service_rating']) . '</td>';
                echo '<td>' . htmlspecialchars($feedback['vibe_rating']) . '</td>';
                echo '<td>' . htmlspecialchars($feedback['reactions']) . '</td>';
                echo '<td>' . nl2br(htmlspecialchars($feedback['comments'])) . '</td>';
                echo '<td>' . htmlspecialchars($feedback['date_submitted']) . '</td>';
                echo '<td>';
                // Edit button (passing the feedback_id as a query parameter)
                echo '<a href="edit_feedback.php?id=' . htmlspecialchars($feedback['feedback_id']) . '">Edit</a> | ';
                // Delete button, passing the feedback_id as a hidden input
                echo '<form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="delete_feedback_id" value="' . htmlspecialchars($feedback['feedback_id']) . '">
                        <button type="submit" onclick="return confirm(\'Are you sure you want to delete this feedback?\')" style="color: red;">Delete</button>
                      </form>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <script>
        // Data from PHP passed to JavaScript
        const months = <?php echo json_encode($months); ?>;
        const avgFoodRatings = <?php echo json_encode($avg_food_ratings); ?>;
        const avgServiceRatings = <?php echo json_encode($avg_service_ratings); ?>;
        const avgVibeRatings = <?php echo json_encode($avg_vibe_ratings); ?>;

        // Create a bar chart using Chart.js
        const ctx = document.getElementById('ratingChart').getContext('2d');
        const ratingChart = new Chart(ctx, {
            type: 'bar',  // Changed to bar chart
            data: {
                labels: months,  // Months as the x-axis
                datasets: [{
                    label: 'Average Food Rating',
                    data: avgFoodRatings,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Light color for food
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }, {
                    label: 'Average Service Rating',
                    data: avgServiceRatings,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)', // Light color for service
                    borderColor: 'rgb(153, 102, 255)',
                    borderWidth: 1
                }, {
                    label: 'Average Vibe Rating',
                    data: avgVibeRatings,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)', // Light color for vibe
                    borderColor: 'rgb(255, 159, 64)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Average Rating'
                        },
                        min: 0,
                        max: 5,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
