<?php include '../view/header.php'; ?>

<!DOCTYPE html>
 <html>
    <!--the head section --> 
    <head>
        <title>Zippy Used Auto</title> 
        <link rel="stylesheet" type="text/css" href="../view/css/style.css"> 
    </head>
    <!--the body section --> 
    <body> 
    <main>
        <?php if ($error_message !== null): ?>
        <h1>Database Error</h1>
        <p><?php echo $error_message; ?></p>   
        <?php else: ?>
        <h1>Success</h1>
        <p>The database connection was successful.</p>
        <?php endif; ?>
    </main> 
    </body>
</html> 

<?php include '../view/footer.php'; ?>