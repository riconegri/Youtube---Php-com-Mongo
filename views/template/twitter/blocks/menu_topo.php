<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Youtube - Twitter</a>
        <div class="nav-collapse">
            <ul class="nav">
                <li><a href="javascript:mostViewed()">Mais Visualizados</a></li>
                <li><a href="javascript:mostLinked()">Mais Linkados</a></li>
                <li><a href="javascript:getHot()">Melhores</a></li>
                <li>
                    <?php if (!$this->bid->isLogged()): ?>
                        <a class="janrainEngage" href="#">Sign-In</a>
                    <?php else: ?>
                        <a href="#" onclick="return false;">Olá <?php echo $this->bid->auth['email']; ?></a>
                    <?php endif ?>
                </li>
                <?php if ($this->bid->isLogged()): ?>
                    <li><a onclick="logout();return false;" href="#">Logout</a></li>
                <?php endif ?>
                <li class="info_bid"></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>