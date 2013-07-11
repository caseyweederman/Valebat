<?php snippet( 'header' ); ?>

<?php
    if( $site->page()->action() ) {
        $ret = $site->page()->return();
        $status = a::get( $ret, 'status' );
        $msg = a::get( $ret, 'msg' );
    }
?>

        <h1 class="banner">Valebat</h1>

        <div class="login-container">

            <div id="loginbox" class="login-box">
                <h2>Login</h2>
                <form action="home?action=login" method="post">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" value="Submit" />
                </form>
                <a href="#" id="register" class="button">Register</a>
            </div>

            <div id="registerbox" class="login-box">
                <h2>Register</h2>
                <form action="home?action=register" method="post">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="submit" value="Submit" />
                </form>
                <a href="#" id="login" class="button">Login</a>
            </div>

            <?php if( $site->page()->action() ) : ?>
                <div class="login-alert <?php echo $status; ?>">
                    <h2><?php echo str::ucfirst( $status ); ?></h2>
                    <p><?php echo $msg; ?></p>
                </div>
            <?php endif; ?>

        </div>

<script type="text/javascript">
<?php if( $site->page()->action() == 'register' ) : ?>
    // Hide the login box
    document.getElementById("loginbox").style.display = 'none';
<?php else : ?>
    // Hide the register box
    document.getElementById("registerbox").style.display = 'none';
<?php endif; ?>

    document.getElementById("register").addEventListener( "click", function() {
        document.getElementById("loginbox").style.display = 'none';
        document.getElementById("registerbox").style.display = '';
    } );

    document.getElementById("login").addEventListener( "click", function() {
        document.getElementById("registerbox").style.display = 'none';
        document.getElementById("loginbox").style.display = '';
    } );
</script>

<?php snippet( 'footer' ); ?>