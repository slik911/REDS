<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">First Vision</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('home')}}">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.rfq')}}">
                <i class="align-middle" data-feather="file"></i> <span class="align-middle">RFQ</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.quotation')}}">
                <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Quotation</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#post" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Post</span>
                </a>
                <ul id="post" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class='sidebar-link' href='{{route('admin.renovation')}}'>Renovations</a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{route('admin.rentals')}}'>Rentals</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.role') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Roles</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
                <ul id="users" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class='sidebar-link' href='{{route('admin.staff')}}'>Staff</a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{route('admin.client')}}'>Client</a></li>
                </ul>
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.service') }}">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Services</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.category') }}">
                    <i class="align-middle" data-feather="box"></i> <span class="align-middle">Category</span>
                </a>
            </li>


            

        </ul>
    </div>
</nav>