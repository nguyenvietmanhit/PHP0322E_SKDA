<!--views/layouts/main.php-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title><?php echo $this->page_title; ?></title>
        <link href="assets/css/style.css" rel="stylesheet" />
        <script src="assets/js/script.js"></script>
    </head>
    <body>
        <header>Đây là header</header>
        <main>
            <h3 style="color: red">
                <?php echo $this->error; ?>
            </h3>
            <?php echo $this->content; ?>
        </main>
        <footer>Đây là footer</footer>
    </body>
</html>
