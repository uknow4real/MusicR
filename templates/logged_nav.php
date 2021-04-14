<style>
    @media screen and (max-width: 1079px){
        .container{
            min-width: 90vw;
        }
        .navbar-toggler{
            min-height: 7vh;
            min-width: 15vw;
        }
        .nav-link{
            font-size: 6vw;
        }
        #navbarid > div > a > img{
            height:5.5vh;
            width:auto;
        }
        #navbarid > div > a{
            font-size: 4vw;
        }
        #navbarid > div > button > span {
            height: 5vh;
            width: 5vh;
        }
    }
</style>
<nav id="navbarid" class="navbar navbar-expand-lg navbar-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/musicr">
            <img src="/musicr/img/logo_small.jpeg" height="60px" width="60px" />  MusicR
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="explore.php"><i class="fas fa-compact-disc"></i> Beats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php"> Services</a>
                </li>
                <li class="nav-item" id="nav-cart">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart <span>(0)</span></a>
                </li>

                <!-- Sign in Window -->
                <li class="nav-item dropdown" id="sign-in">
                    <a class="nav-link" href="profile.php"><i class="far fa-user"></i> <?php echo $_SESSION['username'];?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inc/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
