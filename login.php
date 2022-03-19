<?php include "inc/redirect.php"?>
<?php include_once "inc/header.php";?>

<body>

    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">

                <div class="error-txt"></div>
                <div class="field">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your Email Address">
                </div>

                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your Password">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field">
                    <input type="submit" value="contiune to chat">
                </div>

            </form>
            <div class="link">Not yet signed up? <a href="./">Signup now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>
