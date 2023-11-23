<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?php echo siteUrl("assets/css/auth.css"); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="form-wrap">
        <div class="tabs">
            <h3 class="signup-tab"><a class="active" href="#signup-tab-content">Sign Up</a></h3>
            <h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
        </div><!--.tabs-->

        <div class="tabs-content">
            <div id="signup-tab-content" class="active">
                <form class="signup-form" action="<?php echo siteUrl('auth.php?action=signup'); ?>"  method="post">
                    <input name="email" type="email" class="input" id="user_email" autocomplete="off" placeholder="Email">
                    <input name="name" type="text" class="input" id="name" autocomplete="off" placeholder="name">
                    <input name="password" type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    <input type="submit" class="button" value="Sign Up">
                </form><!--.login-form-->
                <div class="help-text">
                    <p>By signing up, you agree to our</p>
                    <p><a href="#">Terms of service</a></p>
                </div><!--.help-text-->
            </div><!--.signup-tab-content-->

            <div id="login-tab-content">
                <form class="login-form" action="<?php echo siteUrl('auth.php?action=login'); ?>" method="post">
                    <input name="email" type="text" class="input" id="user_login" autocomplete="off" placeholder="Email or Username">
                    <input name="password"  type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    <!-- <input type="checkbox" class="checkbox" id="remember_me">
                    <label for="remember_me">Remember me</label> -->

                    <input type="submit" class="button" value="Login">
                </form><!--.login-form-->
                <div class="help-text">
                    <p><a href="#">Forget your password?</a></p>
                </div><!--.help-text-->
            </div><!--.login-tab-content-->
        </div><!--.tabs-content-->
    </div><!--.form-wrap-->
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        jQuery(document).ready(function($) {
            tab = $('.tabs h3 a');

            tab.on('click', function(event) {
                event.preventDefault();
                tab.removeClass('active');
                $(this).addClass('active');

                tab_content = $(this).attr('href');
                $('div[id$="tab-content"]').removeClass('active');
                $(tab_content).addClass('active');
            });
        });
    </script>
</body>

</html>