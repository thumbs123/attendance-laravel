<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">BUJES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link  {{ ($title ==="/")? 'active' :''  }} " href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title ==="about")? 'active' :''  }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title ==="posts")? 'active' :''  }}" href="/posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title ==="categories")? 'active' :''  }}" href="/categories">Category</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav m5-auto">
          <li class="nav-item">
            <a href="/login" class="nav-link">Login</a>
          </ul>
        </li>
      </div>
    </div>
  </nav>



