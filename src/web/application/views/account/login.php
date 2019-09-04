<?php if(!$logged): ?>

    Autoryzacja
    <form action="account/login_check" method="POST">
        <p>
            <label>Login:<br></label>
            <input name="login" type="text" size="15" maxlength="15">
        </p>

        <p>
            <label>Hasło:<br></label>
            <input name="password" type="password" size="15" maxlength="15">
        </p>

        <p>
            <input type="submit" name="submit" value="Log in">
            <br>
            <a href="account/register">Zarejestrować się</a>
        </p>
    </form>

<?php endif;
echo $message; ?><br>
    <a href="account/my_gallery">Moja galeria</a><br>
<?php if ($logged): ?>
    <a href="account/my_images">Moje prywatne zdjęcia</a><br>
    <a href="account/logout">Wyjść</a><br>
<?php endif?>







