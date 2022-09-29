<style>
    button {
        /* background-color: #4CAF50; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px; */
        background-color: rgb(60, 131, 60);
     color: white;
     display: inline-block;
     position: relative;
     height: 40px;
     border-radius: 8px;
     font-size: 20px;
     margin-left: 15px;
}
</style>
<center>
<h1 style="font-size: 50px">Welcome <?php echo $name ?></h1>
<a href='./librarian/enterBook'><button>ADD A BOOK</button></a>
<a href='./librarian/viewAllBooks'><button>VIEW ALL BOOKS</button></a>
<a href='./librarian/updateBook'><button>UPDATE A BOOK</button></a>
<a href='./librarian/deleteBook'><button>DELETE A BOOK</button></a>
</center>