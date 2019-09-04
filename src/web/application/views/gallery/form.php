
<form enctype="multipart/form-data" action="/gallery/upload" method="POST">
<!--                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />-->
     Wybrac plik:<br>
     <input name="userfile" type="file" required/><br>
     Watermark:<br>
     <input type="text" name="watermark" required><br>
     Tytuł:<br>
     <input type="text" name="title" required><br>
     Autor:<br>
     <input type="text" name="author" value="<?php echo $login; ?>" required <?php echo $readonly; ?>><br>

    <?php if($logged): ?>
        Typ dostępu do zdjęcia:<br>
        <input type="radio" id="img_access_choice1"
               name="img_access" value="public" checked>
        <label for="img_access_choice1">Publiczne</label><br>

        <input type="radio" id="img_access_choice2"
               name="img_access" value="private">
        <label for="img_access_choice2">Prywatne</label><br>
    <?php endif; ?>

     <input type="submit" value="Wyslac" />
 </form>