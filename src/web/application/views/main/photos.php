<head>
    <link href="../public/css/gallery.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#gallery img').each(function(i) {
                var imgFile = $(this).attr('src');
                var preloadImage = new Image();
                preloadImage.src = imgFile;
            });

            $('#gallery a').click(function(evt) {
                evt.preventDefault();
                var imgPath = $(this).attr('href');
                var oldImage = $('#photo img');
                var newImage = $('<img src="' + imgPath +'">');
                newImage.hide();
                $('#photo').prepend(newImage);
                newImage.fadeIn(1000);
                oldImage.fadeOut(1000,function(){
                    $(this).remove();
                });
            });

            $('#gallery a:first').click();
        });
    </script>
</head>


<div id="gallery">
    <a href="../public/photos/mexico/28.10.2018/1.jpg"><img src="../public/photos/mexico/28.10.2018/1.jpg" width="80" height="70" alt="Daniel Ricciardo"></a>
    <a href="../public/photos/mexico/28.10.2018/2.jpg"><img src="../public/photos/mexico/28.10.2018/2.jpg" width="80" height="70" alt="Kwalifikacjа"></a>
    <a href="../public/photos/mexico/28.10.2018/3.jpg"><img src="../public/photos/mexico/28.10.2018/4.jpg" width="80" height="70" alt="Witamy w Meksyku!"></a>
    <a href="../public/photos/mexico/28.10.2018/4.jpg"><img src="../public/photos/mexico/28.10.2018/4.jpg" width="80" height="70" alt="Lewis Hamilton"></a>
    <a href="../public/photos/mexico/28.10.2018/5.jpg"><img src="../public/photos/mexico/28.10.2018/5.jpg" width="80" height="70" alt="Wyścig"></a>
    <a href="../public/photos/mexico/28.10.2018/6.jpg"><img src="../public/photos/mexico/28.10.2018/6.jpg" width="80" height="70" alt="Iskierka"></a>
    <a href="../public/photos/mexico/28.10.2018/7.jpg"><img src="../public/photos/mexico/28.10.2018/7.jpg" width="80" height="70" alt="Red Bull Racing"></a>
    <a href="../public/photos/mexico/28.10.2018/8.jpg"><img src="../public/photos/mexico/28.10.2018/8.jpg" width="80" height="70" alt="Congratulations!"></a>
    <a href="../public/photos/mexico/28.10.2018/9.jpg"><img src="../public/photos/mexico/28.10.2018/9.jpg" width="80" height="70" alt="Sebastian Vettel"></a>
</div>

<div id="photo"></div>


