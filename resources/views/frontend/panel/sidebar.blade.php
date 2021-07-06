@php
    $prefixed =Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp
{{-- @dd($route) --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center user-info mt-0 ">
        @php
        $admin=Auth::user();
                $img="https://ui-avatars.com/api/?name=".Auth::user()->name."&color=7F9CF5&background=EBF4FF";
                                  @endphp
        <img src=" {{(!empty($admin->profile_photo_path)) ? url('storage/profile-photos/'.$admin->profile_photo_path) : $img}} " width="80" class="rounded-full h-20 w-20 object-cover" alt="avatar">
        <p class="">{{Auth::user()->name}}</p>

</div>

    <ul class="nav">
      <li class="nav-item   {{($route=='dashboard') ? 'active' :''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/widgets/widgets.html">
          <i class="icon-cog menu-icon"></i>
          <span class="menu-title">Widgets</span>
        </a>
      </li>
      <li class="nav-item {{($route=='user.profile') ? 'active' :''}}">
        <a class="nav-link" href="{{route('user.profile')}}">
          <i class="ti-user menu-icon"></i>

          <span class="menu-title">Manage Profile</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" >
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <ul class="dashdrop">
            <li><a href="home.html">Home</a></li>
             <li><a href="category.html">Category</a></li>

 </ul>
      </li>

    </ul>
  </nav>
