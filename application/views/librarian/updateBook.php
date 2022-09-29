<link rel="stylesheet" href="./public/css/librarian.css" type="text/css">
<center>
<h2>UPDATE A BOOK</h2>
<form action="./librarian/updateBook2" method="post">
    <table class="librarian" border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <td> Title:</td>
        <td>
            <input list="titles" name="title" required>
            <datalist id="titles">
                <?php
                    for($i = 0; $i < count($titles); $i++){
                        echo "<option value='$titles[$i]'>";
                    }
                ?>
            </datalist>
        </td>
        <tr>
        <td></td>
        <td>
        <input type="submit" value="UPDATE">
        <input type="reset" value="RESET">
        </td>
        </tr>
    </table>
</form>
<a href='./librarian'><button class="button">BACK TO HOME</button></a>
</center>