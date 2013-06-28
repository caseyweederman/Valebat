<?php snippet( 'header' ); ?>

<?php
    if( $site->page()->action() ) {
        $ret = $site->page()->return();
        $status = a::get( $ret, 'status' );
        $msg = a::get( $ret, 'msg' );
    }
?>

        <h1>Home Page</h1>

        <?php if( $site->page()->action() ) : ?>
            <h2><?php echo str::ucfirst( $status ); ?></h2>
            <p><?php echo $msg; ?></p>
        <?php endif; ?>

        <h2>Login</h2>
        <form action="home?action=login" method="post">
            <label>Username</label>
            <input type="text" name="username" />
            <label>Password</label>
            <input type="password" name="password" />
            <input type="submit" value="Submit" />
        </form>

        <h2>Register</h2>
        <form action="home?action=register" method="post">
            <label>Username</label>
            <input type="text" name="username" />
            <label>Password</label>
            <input type="password" name="password" />
            <label>Email</label>
            <input type="text" name="email" />
            <input type="submit" value="Submit" />
        </form>

<?php snippet( 'footer' ); ?>