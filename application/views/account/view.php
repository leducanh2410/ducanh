<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
}
</style>
<center>
<h1>Welcome <?php print $username ?></h1>
<a href='./account/edit'><button>Edit profile</button></a>
<a href='./account/signout'><button>Sign out</button></a>
</center>