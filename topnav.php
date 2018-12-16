<header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a style="color: #fff; font-size: 25px; text-transform: uppercase; font-weight: bolder;" href="main.php">
                            Find Your Project
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
   
                            <li>
                                <a href="main.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Projects</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="list-projects.php">All Projects</a>
                                    </li>
                                <?php if($_SESSION['userinfo']['role']==1 || $_SESSION['userinfo']['role']==2) { ?>
                                    <li>
                                        <a href="new-project.php">Add New</a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </li>
                            
                            <?php if($_SESSION['userinfo']['role']==1) { ?>
                                <li  class="has-sub">
                                    <a href="#">
                                        <i class="fas fa-trophy"></i>
                                        <span class="bot-line"></span>Users</a>
                                    <ul class="header3-sub-list list-unstyled">
                                        <li>
                                            <a href="list-users.php">All Users</a>
                                        </li>
                                        <li>
                                            <a href="new-user.php">New User</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                    </ul>
                    </div>
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
            </div>
        </header>