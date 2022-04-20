
<head>
    <!-- <title> Suburban Outfitters </title> -->
    <link rel="stylesheet" href="theme.css">
</head>

<body>
    <ul>
        <div class="navbar">
            <div class="search-container">
                <form action="product_list.php" method="GET">
                    <input type="text" placeholder="Search for products..." name="search">
                    <button type="submit"> Search</button>
                </form>
            </div>
            <a href="cart.php">Cart</a>
            <a  href="login_page.php" 
            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
                ?> disabled="disabled" style="display: none;" <?php 
                } 
            ?>>Login</a>
            <div class="dropdown">
                <button class="dropbtn">Shop</button>
                <div class="dropdown-content">
                    <a href="product_list.php">All Products</a>
                    <a href="all_men.php">All Men's</a>
                    <a href="all_women.php">All Women's</a>
                    <a href="all_shirt.php">All Shirts</a>
                    <a href="all_pant.php">All Pants</a>
                    <a href="all_shoe.php">All Shoes</a>
                </div>
            </div>
            <a href="home_page.php">Home</a>
            <a href="logout.php" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?> disabled="disabled" style="display: show;" <?php } ?>>
            Sign Out</a>
        </div>
    </ul>
    <header align="center">
        <img src="Logo.png" />
    </header>
</body>
