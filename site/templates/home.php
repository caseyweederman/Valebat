<?php snippet( 'header' ); ?>

<?php
    if( $site->page()->action() ) {
        $ret = $site->page()->return();
        $status = a::get( $ret, 'status' );
        $msg = a::get( $ret, 'msg' );
    }
?>

        <h1 class="banner">Valebat</h1>

        <?php if( $site->page()->action() ) : ?>
            <h2><?php echo str::ucfirst( $status ); ?></h2>
            <p><?php echo $msg; ?></p>
        <?php endif; ?>

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

        </div>

<script type="text/javascript">
// Hide the register box
document.getElementById("registerbox").style.display = 'none';

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