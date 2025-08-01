<?php
// dashboard.php
// Main dashboard page for the Inventory Demand Forecasting system.

require_once 'functions.php'; // Include functions for session check, etc.
require_once 'config.php';   // Include database connection if needed later

// Start a secure session
start_secure_session();

// Check if the user is logged in. If not, redirect to login page.
if (!is_logged_in()) {
    redirect('login.php');
}

// Get user information from session (set during login)
$logged_in_user_id = $_SESSION['user_id'];
$logged_in_user_name = $_SESSION['user_name'] ?? 'User'; // Fallback if name not set

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Demand Forecasting</title>
    <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Navigation Bar with Logo -->
    <nav class="navbar">
        <ul>
            <li class="navbar-brand">
                <img src="logo.jpg" alt="Inventory Forecast Logo" class="navbar-logo">
                
                <span class="brand-text">Inventory Forecast</span>
            </li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="upload_data.php">Upload Data</a></li>
            <li><a href="results.php">View Results</a></li>
            <li class="logout"><a href="logout.php">Logout (<?php echo htmlspecialchars($logged_in_user_name); ?>)</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="welcome-section">
            <h1>Welcome, <?php echo htmlspecialchars($logged_in_user_name); ?>!</h1>
            <p>Utilize this system to accurately forecast your inventory demand by analyzing historical data and recent sales trends,
               helping you maintain optimal stock levels and avoid overstocking or shortages.</p>
        </div>

        <!-- Business Image Section -->
        <div class="image-section" style="text-align: center; margin: 20px 0;">
            <img src="business.jpeg" alt="Business Illustration" width="445" height="160" style="max-width: 100%; height: auto; border-radius: 10px;">
        </div>

        <div class="card-grid">
            <div class="card feature-card">
                <div class="card-body">
                    <h3 class="card-title">Upload Sales Data</h3>
                    <p class="card-text">Upload your most recent monthly sales data (CSV format) to generate forecasts.</p>
                    <a href="upload_data.php" class="btn btn-primary">Upload CSV</a>
                </div>
            </div>

            <div class="card feature-card">
                <div class="card-body">
                    <h3 class="card-title">View Forecasts</h3>
                    <p class="card-text">See the predicted demand for your products for the upcoming month.</p>
                    <a href="results.php" class="btn btn-primary">View Results</a>
                </div>
            </div>

            <div class="card feature-card">
                <div class="card-body">
                    <h3 class="card-title">Compare Models</h3>
                    <p class="card-text">Analyze the performance of Linear Regression and Random Forest models using MAE, RMSE, and R².</p>
                    <a href="results.php" class="btn btn-primary">See Metrics</a>
                </div>
            </div>

            <div class="card feature-card">
                <div class="card-body">
                    <h3 class="card-title">Manage Account</h3>
                    <p class="card-text">View your upload history and account details (future feature).</p>
                    <a href="#" class="btn btn-secondary" onclick="alert('Account management features coming soon!'); return false;">Manage</a>
                </div>
            </div>
        </div>

        <div class="footer-note">
            <p>This system uses machine learning to predict inventory needs. Ensure your uploaded data is accurate for best results.</p>
        </div>
    </div>

</body>
</html>
