<div class="sidebar">
  <div class="sidebar-menu">
    <!-- Sidebar brand -->
    <a href="/" class="sidebar-brand">
      <img src="" alt="">
      Collections
    </a>
    <br />
    <a href="/profile/{{ Auth::user()->id }}" class="sidebar-link sidebar-link-with-icon active">
      <span class="sidebar-icon">
        <i class="bi bi-person-fill"></i>
      </span>
      {{ Auth::user()->name }}
    </a>

    <!-- Sidebar content with the search box -->
    <div class="sidebar-content">
      <form action="/accounts" method="get" class="d-flex">
        <input type="text" name="search_account" class="form-control" placeholder="Search accounts">
      </form>

      <div class="mt-10 font-size-12">
        Press <kbd>/</kbd> to focus
      </div>
    </div>
    <!-- Sidebar links and titles -->
    <h5 class="sidebar-title font-size-12 text-uppercase">General</h5>
    <div class="sidebar-divider"></div>
    <a href="#" class="sidebar-link active">Dashboard</a>
    <a href="#" class="sidebar-link">Search</a>
    <br />
    <h5 class="sidebar-title font-size-12 text-uppercase">Admin Controls</h5>
    <div class="sidebar-divider"></div>
    <a href="#" class="sidebar-link">Import Accounts</a>
    <a href="#" class="sidebar-link">Account Distribution</a>
    <a href="#" class="sidebar-link">Team</a>
    <a href="#" class="sidebar-link">Payments</a>
  </div>
</div>