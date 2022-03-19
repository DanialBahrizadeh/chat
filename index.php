<?php include "inc/redirect.php"?>
<?php include_once "inc/header.php";?>

<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" action="post" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-detalis">

                    <div class="field">
                        <label>First name</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>

                    <div class="field">
                        <label>Last name</label>
                        <input type="text" name="lname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="field">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Email Address" required>
                </div>

                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field">
                    <label>Image</label>
                    <input type="file" name="image" placeholder="Image" required>
                </div>
                <div class="field">
                    <input type="submit" value="contiune to chat">
                </div>

            </form>
            <div class="link">Alredy signed in? <a href="login.php">Login now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>
