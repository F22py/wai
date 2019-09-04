Rejestracja
<form action="account/register/new_user" method="POST">
    <p>
        <label>Login:<br></label>
        <input name="login" type="text" size="15" maxlength="15" required>
    </p>
    <p>
        <label>E-mail:<br></label>
        <input name="email" type="text" size="15" maxlength="40" required>
    </p>
    <p>
        <label>Hasło:<br></label>
        <input name="password" type="password" size="15" maxlength="30" required>
    </p>
    <p>
        <label>Powtórz hasło:<br></label>
        <input name="pass_rep" type="password" size="15" maxlength="30" required>
    </p>
    <p>
        <input type="submit" name="submit" value="Zarejestrować się">
    </p></form>