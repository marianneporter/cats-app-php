<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-width: 100vw; position: fixed; top:0; left:0; z-index: 10">
  <div class="container-fluid" >
    <a class="navbar-brand" style="min-width: 10rem" href="#">Cats App PHP</a>
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" style="min-width: 7rem">
          <a class="nav-link home-link" href="index.php">Home</a>
        </li>
        <li class="nav-item" style="min-width: 7rem">
          <a class="nav-link list-link" href="catslist.php">Cats List</a>
        </li> 
        <li class="nav-item" style="min-width: 7rem">
          <a class="nav-link about-link" href="about.php" >About</a>
        </li>
      </ul>
 
      <?php if( isset($_SESSION['firstName'])) { ?> 
        <ul class="d-flex navbar-nav mb-2 mb-lg-0">
          <li class="nav-item  d-none d-md-block" style="min-width: 12rem"><a class="nav-link" href="#">Logged in as <?php echo $_SESSION['firstName'] ?></a></li>
          <li class="nav-item pe-md-4"><a class="nav-link" href="logout.php" >Logout</a><li>
        </ul>
      <?php } else { ?>
        <ul class="d-flex navbar-nav mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php" >Login</a><li>
        </ul>
      <?php } ?>

    </div>
  </div>
</nav>

<script>
   
    window.addEventListener('load', (event) => {
        if (window.location.pathname.includes('catslist')) {
            document.querySelector('.list-link').classList.add('highlighted');    
        } else if (window.location.pathname.includes('about')) {
            document.querySelector('.about-link').classList.add('highlighted');
        } else {
            document.querySelector('.home-link').classList.add('highlighted');
        }       
    })
    
</script>