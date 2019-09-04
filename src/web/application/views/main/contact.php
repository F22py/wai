<head>
    <script>
        $(document).ready(function() {
            $('#language').selectmenu({width : 200});
            $('#e_conf').button();
            $('#radio_sex').buttonset();
            $('#send').button();
            $('#reset').button();
            $('#firstname').button();
            $('#secondname').button();
            $('#email').button();
            $('#textarea').button();
        });
    </script>

</head>


<form action="handler" method="POST" id="contact_form">
    Imie:<br>
    <input type="text" name="firstname" id="firstname"><br>
    Nazwisko:<br>
    <input type="text" name="lastname" id="secondname"><br>
    Plec:<br>
    <div id="radio_sex">
        <input type="radio" name="sex" value="male" id="sex_male">
        <label for="sex_male">Mężczyzna</label>
        <input type="radio" name="sex" value="female" id="sex_female">
        <label for="sex_female">Kobieta</label><br>
    </div>
    E-mail:<br>
    <input type="text" name="email" id="email"><br>
    Chcę dostać potwierdzenia odwołania na e-mail:<br>
    <input type="checkbox" name="e_confirmation" id ="e_conf">
    <label for="e_conf">Tak</label><br>
    Jezyk odwołania:<br>
    <select id="language">
        <option selected value="polski">Polski</option>
        <option value="english">English</option>
        <option value="russian">Русский</option>
    </select><br>
    Tekst odwołania:<br>
    <textarea name="comment" cols="40" rows="3" id="textarea"></textarea><br>
    <p><input type="button" value="Wysłac" onclick="saveData()" id="send" />
        <input type="reset" value="Oczyscic" id="reset" onclick="resetData()"></p>
</form>
