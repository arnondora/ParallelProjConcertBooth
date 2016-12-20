<nav class="navbar navbar-light bg-faded">
  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
  <div class="collapse navbar-toggleable-md" id="navbarResponsive">
    <a class="navbar-brand" href="#">Ticket Booth | Tina Concert Hall</a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/ticket">Ticket Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/show">Show Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/user">User Control</a>
      </li>
    </ul>
    <form class="form-inline float-lg-right">
      <a href = "/dashboard/user" class="btn btn-outline-success">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
      <a href = "/logout" class="btn btn-danger">Logout</a>
    </form>
  </div>
</nav>
