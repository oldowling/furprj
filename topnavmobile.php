<header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a style="color: #fff; font-size: 25px; text-transform: uppercase; font-weight: bolder;" href="main.php">
                            Find Your Project
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="main.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
       
                        <li class="has-sub">
                            <a class="js-arrow"  href="#">
                                <i class="fas fa-chart-bar"></i>Projects</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="list-projects.php">List Projects</a>
                                </li>
                            <?php if($_SESSION['userinfo']['role']==1 || $_SESSION['userinfo']['role']==2) { ?>    
                                <li>
                                    <a href="new-project.php">New Project</a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                        
                        <?php if($_SESSION['userinfo']['role']==1) { ?>
                            <li class="has-sub">
                                <a class="js-arrow"  href="#">
                                    <i class="fas fa-user"></i>Users</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="list-users.php">List Users</a>
                                    </li>
                                    <li>
                                        <a href="new-user.php">New Users</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
<!--
                        <div class="image">
                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>
-->
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['userinfo']['username']; ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
<!--
                                <div class="image">
                                    <a href="#">
                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
-->
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo $_SESSION['userinfo']['username']; ?></a>
                                    </h5>
                                    <span class="email"><?php echo $_SESSION['userinfo']['email']; ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="logout.php">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  