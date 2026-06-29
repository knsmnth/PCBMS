
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand"
                data-toggle="tooltip"
                data-placement="right"
                title="Store Management">
                Store Management
            </a>
        </div>

    <div class="collapse navbar-collapse" id="navbarToggle">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">
                <i class="fa fa-home fa-navsize"></i>Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-pencil-square-o"></span> Receive Products
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="supplier_controller.php">
                        <i class="fa fa-file-text-o"></i> Suppliers Update</a></li>
                    <li class="divider"></li>
                    <li><a href="product_controller.php">
                        <i class="fa fa-stack-exchange"></i> Product Update</a></li>
                    <li class="divider"></li>
                    <li><a href="delivery_controller.php">
                        <i class="fa fa-bookmark-o"></i> Product Delivery</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="fa fa-profit"></span> Order Products<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="purchase/index.php">
                        <i class="fa fa-file-text-o"></i> Purchase Order</a></li>
                    <li class="divider"></li>
                    <li><a href="expired/index.php">
                        <i class="fa fa-bookmark-o"></i> Expired Products Disposal</a></li>
                </ul>
            </li>
            <li><a href="../login/UserLogout.php">
                <span class="fa fa-sign-out"></span> Logout</a></li>
        </ul>
    </div>

</nav>