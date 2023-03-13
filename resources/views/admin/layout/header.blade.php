<header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-6">
          <div class="header-left d-flex align-items-center">
            <div class="menu-toggle-btn mr-20">
              <button
                id="menu-toggle"
                class="main-btn primary-btn btn-hover"
              >
              Menu
              </button>
            </div>
            <div class="header-search d-none d-md-flex">
              {{-- <form  action="{{route('categories.search')}}" method="GET">
                @csrf
               <input type="text" name="search" placeholder="Tìm kiếm..." />
                <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                  <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                  <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                </svg></button>
              </form> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-6">
           <div class="header-right">
              <!-- notification start -->
              <!-- notification end -->
              <!-- message start -->
              <!-- message end -->
              <!-- filter start -->
              <!-- filter end -->
              <!-- profile start -->
              <div class="profile-box ml-15">
                <button
                  class="dropdown-toggle bg-transparent border-0"
                  type="button"
                  id="profile"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="profile-info">
                    {{-- <div class="info">
                      <h6>{{ auth()->user()->name }}</h6>
                      <div class="image">
                        <img src="{{asset('assets/images/user/'. auth()->user()->image)}}" class="user-img" alt="">
                        <span class="status"></span>
                      </div>
                    </div> --}}
                  </div>

                </button>
                <ul
                  class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="profile"
                >
                <li>
                    {{-- <a href="{{ route('user.show', Auth::User()->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg>&ensp;
                      Thông tin cá nhân
                    </a> --}}
                  </li>
                  <li>
                    {{-- <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <a  href="{{ route('logout') }}"onclick="event.preventDefault();
                    this.closest('form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>&ensp; Đăng xuất</a>
                    </form> --}}
                  </li>
                </ul>
              </div>
              <!-- profile end -->
           </div>
        </div>
     </div>
  </div>
</header>
