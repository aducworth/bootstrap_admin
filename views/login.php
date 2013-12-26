<h1>Login</h1>

<form action='/login' method='post'>

<?=$form->textbox( 'email', array( 'label' => 'Email' ) ) ?>
<?=$form->password( 'password', array( 'label' => 'Password' ) ) ?>

<p><input type='submit' value='Login' class='btn'/></p>

</form>