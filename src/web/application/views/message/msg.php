<?php echo $message;
    if ($message == 'Incorrect data. Try again to login!'
        || $message == 'You are not logged in!'
        || $message=='You have successfully registered.'){
        header('refresh: 1;url=/account/login');
    }
?>
<form>
    <input type="button" value="Go back!" onclick="history.back()">
</form>

