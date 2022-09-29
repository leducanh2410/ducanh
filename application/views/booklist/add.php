<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">
<link rel="stylesheet" href="./public/css/librarian.css" type="text/css">

<?php
    if ($status == 0) {
        print '
        <div class="form-container">
	        <div class="form-header">Add Booklist</div>	
            <div class="form-data">
                <center>
                <form id="main-form" method="post" name="add-booklist" action="">
                    <table class="librarian">
                        <tbody>
                            <tr>
                                <td class="key"><label for="booklist-name">Booklist Name:</label></td>
                                <td class="value"><input type="text" id="booklist-name" name="name"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <center>
            </div>		
            <div class="form-submit">
                <input class="button" type="submit" form="main-form" value="Submit">
            </div>
        </div>
        ';
    }
    elseif ($status == 1) {
        print '
        <div class="notice-container">
            <div class="notice-data">Successfully add booklist</div>
            <div class="button-container">
                <a href="./booklist/add"><button>Continue add booklist</button></a>
                <a href="./booklist"><button>Go to booklist</button></a>
            </div>
        </div>
        ';
    }
?>