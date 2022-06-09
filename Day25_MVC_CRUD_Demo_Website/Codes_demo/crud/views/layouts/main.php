<!--views/layouts/main.php-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title><?php echo $this->page_title; ?></title>
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="assets/js/script.js"></script>
    </head>
    <body>
        <header>Đây là header</header>
        <main>
           <h3 style="color: red">
               <?php echo $this->error; ?>
               <?php
               if (isset($_SESSION['error'])) {
                   echo $_SESSION['error'];
                   unset($_SESSION['error']);
               }
               ?>
           </h3>
            <h3 style="color: green">
                <?php
                if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
                ?>
            </h3>
           <?php echo $this->content; ?>
        </main>
        <footer>Đây là footer</footer>
    </body>
</html>