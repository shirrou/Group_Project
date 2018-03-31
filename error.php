<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Travel Agency</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>My Travel Agency</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Travel Agency, Inc.</p>
    </footer>
</body>
</html>