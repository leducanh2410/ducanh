<!DOCTYPE HTML>
<html>
<!-- <link rel="stylesheet" href="./public/css/librarian.css" type="text/css"> -->

<body>
    <?php
        if ($existed){
            echo "<center>";
            echo "<b>Book added unsuccessfully</b><br/>";
            echo "<b>Book has already existed</b><br/>";
            echo "</center>";
        }
        else{
            echo "<center>";
            echo "<b>Book added successfully<b><br/>";
            echo "</center>";
        }
        echo "<center>";
        echo "<a href='./librarian'><button>BACK TO HOME</button></a>";
        if ($existed){
            echo "<a href='./librarian/enterBook'><button >RE-ADD BOOK</button></a>";
        }
        else{
            echo "<a href='./librarian/enterBook'><button>ADD ANOTHER BOOK</button></a>";
        }
        echo "</center>";
    ?>
</body>
</html>