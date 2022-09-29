<!DOCTYPE HTML>
<html>
<body>
    <?php
        if (!$existed){
            echo "<center>";
            echo "<b>Your required book doesn't exist.</b><br/>";
            echo "</center>";
        }
        else{
            echo "<center>";
            echo "<b>Book deleted successfully<b><br/>";
            echo "</center>";
        }
        echo "<center>";
        echo "<a href='./librarian'><button>BACK TO HOME</button></a>";
        if (!$existed){
            echo "<a href='./librarian/deleteBook'><button>RE-DELETE BOOK</button></a>";
        }
        else{
            echo "<a href='./librarian/deleteBook'><button>DELETE ANOTHER BOOK</button></a>";
        }
        echo "</center>";
    ?>
</body>
</html>