<div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">YouTube Interage Twitter</a>
        <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user"></i><?php echo $this->bid->auth['email'];?>
                <span class="caret"></span>
            </a>
            <?php if (!$this->bid->isLogged()): ?>
            <a class="janrainEngage" href="#">Sign-In</a>
            <?php endif ?>
            <?php if ($this->bid->isLogged()): ?>
            <ul class="dropdown-menu">
                <!--li><a href="#">Profile</a></li-->
                <li class="divider"></li>
                <li><a onclick="logout();return false;" href="#">Logout</a></li>
            </ul>
            <?php endif ?>
        </div>
        <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>