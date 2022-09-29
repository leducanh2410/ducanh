<!DOCTYPE HTML>
<html>
<body>
    <?php
    if (!$existed){
        echo "<center>";
        echo "<b>Your required book doesn't exist.</b><br/>";
        echo "<a href='./librarian'><button>BACK TO HOME</button></a>";
        echo "<a href='./librarian/updateBook'><button>RE-UPDATE BOOK</button></a>";
        echo "</center>";
    }
    else{
        echo '<center><h2>UPDATE A BOOK</h2></center>';
        echo '<form action="./librarian/updateBook3" method="post"<br/>';
        echo '<table border="2" align="center" cellpadding="5" cellspacing="5">';
        echo '<tr>';
        echo '<td></td>';
        echo '<td>Old</td>';
        echo '<td>New</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td> Title:</td>';
        echo '<td colspan="2"> <input type="text" name="title" value="' . $title . '" readonly> </td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td> ISBN:</td>';
        echo '<td>' . $old_isbn . '</td>';
        echo '<td> <input type="number" name="isbn" min="1" oninput="validity.valid||(value=\'\');" required placeholder="only number"> </td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td> Author:</td>';
        echo '<td>' . $old_author . '</td>';
        echo '<td>';
        echo '<input list="authors" name="author" required>';
        echo '<datalist id="authors">';
        for($i = 0; $i < count($authors); $i++){
            echo "<option value='$authors[$i]'>";
        }
        echo '</datalist>';
        echo '</tr>';
        echo '<tr>';
        echo '<td> Category:</td>';
        echo '<td>' . $old_category . '</td>';
        echo '<td>';
        echo '<select name="category">';
        for($i = 0; $i < count($categories); $i++){
            echo "<option value='$categories[$i]'>$categories[$i]</option>";
        }
        echo '<option value="Other" selected>Other</option>';
        echo '</select>';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td> Publisher: </td>';
        echo '<td>' . $old_publisher . '</td>';
        echo '<td>';
        echo '<input list="publishers" name="publisher" required>';
        echo '<datalist id="publishers">';
        for($i = 0; $i < count($publishers); $i++){
            echo "<option value='$publishers[$i]'>";
        }
        echo '</datalist>';
        echo '</tr>';
        echo '<tr>';
        echo '<td> Number of copies:</td>';
        echo '<td>' . $old_copies . '</td>';
        echo '<td> <input type="number" name="copies" min="1" oninput="validity.valid||(value=\'\');" required placeholder="only number"> </td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td></td>';
        echo '<td colspan="2">';
        echo '<input type="submit" value="UPDATE">';
        echo '<input type="reset" value="RESET">';
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</form>';
        echo '<center><a href=\'./librarian\'><button>BACK TO HOME</button></a></center>';
    }
    ?>
</body>
</html>