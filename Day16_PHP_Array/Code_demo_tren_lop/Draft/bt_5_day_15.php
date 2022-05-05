<!--bt_5_day15.php-->
<!DOCTYPE html>
<html>
    <head>
        <title>Chữa bài tập 5 ngày 15</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $name = 'Nguyen Viet Manh';
        $email = 'nguyenvietmanhit@gmail.com';
        $phone = '0987599921';
        $message = 'This is a message';
        ?>
        <form action="" method="GET" id="form" class="container">
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Name *</label>
                    <input type="text" id="name" placeholder="<?php echo $name; ?>" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="email">Email *</label>
                    <input type="email" id="email" placeholder="<?php echo $email; ?>" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="phone">Phone *</label>
<!--                    (+84) 0987555-->
                    <input type="text" id="phone" placeholder="<?php echo $phone; ?>" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="message">Message *</label>
                <textarea class="form-control" id="message" placeholder="<?php echo $message; ?>"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send message" class="btn btn-danger" />
            </div>
        </form>
        <h3 style="color: blue" id="result"></h3>
        <script type="text/javascript">
            // Lấy obj form
            var obj_form = document.querySelector('#form');
            // Gắn sự kiện submit cho obj trên
            obj_form.addEventListener('submit', function() {
                // alert('submit!');
                // Lấy giá trị các input form
                var name = document.querySelector('#name').value;
                var email = document.querySelector('#email').value;
                var phone = document.querySelector('#phone').value;
                var message = document.querySelector('#message').value;
                // Hiển thị lên html dạng chờ sẵn
                var result = "Name: " + name + "<br />";
                result += "Email: " + email + " <br />";
                result += "Phone: " + phone + " <br />";
                result += "Message: " + message;
                document.querySelector('#result').innerHTML = result;
                // NGăn ngừa hành vi submit form để trang ko bị tải lại
                event.preventDefault();
            })
        </script>
    </body>
</html>
