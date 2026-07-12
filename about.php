<?php $pageTitle = 'About SuperLand'; ?>
<?php
$pageTitle = $pageTitle ?? 'SuperLand';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/Superland.css">
    <style>
        .simple-page { max-width: 1000px; margin: 40px auto; padding: 30px; line-height: 1.7; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,.08); }
        .simple-page h1 { margin-bottom: 15px; }
        .simple-page a { color: inherit; font-weight: 600; }
        .simple-page ul { margin-left: 20px; }
    </style>
</head>
<body>
    <main class="simple-page">
        <h1>About SuperLand</h1>
        <p>SuperLand is an academic PHP and MySQL e-commerce web application. It demonstrates common online store features such as product browsing, categories, cart handling, checkout, user profiles, and admin-side management.</p>
        <p>The project is intended for learning, portfolio presentation, and local development practice.</p>

        <p><a href="index.php">Back to Home</a></p>
    </main>
</body>
</html>
