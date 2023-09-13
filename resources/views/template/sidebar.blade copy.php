<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            {{-- <i class="fa fa-face-smile-wink"></i> --}}
            <i class="fa-solid fa-user-astronaut fa-beat-fade"></i>
            {{-- <i class="fa-sharp fa-regular fa-user-astronaut fa-beat-fade"></i> --}}
            {{-- <i class="fa-solid fa-user-alien"></i> --}}
        </div>
        {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
        <div class="sidebar-brand-text mx-3" style="text-transform:capitalize">hi. system</div>
    </a>


    <!-- Divider -->
    {{-- <hr class="sidebar-divider my-0"> --}}
    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0"> --}}
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-chart-line"></i>
            <span>Dashboard</span></a>
    </li>
    {{-- <hr class="sidebar-divider my-0"> --}}
    {{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-brain"></i>
            <span>Master</span></a>
    </li> --}}
    {{-- <hr class="sidebar-divider my-0"> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#general_request"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-sharp fa-solid fa-people-robbery"></i>
            <span>General Request</span>
        </a>
        <div id="general_request" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="/user_request">User Request</a>
                <a class="collapse-item" href="/advance_request">Advance Request</a>
            </div>
        </div>
    </li>
    {{-- <hr class="sidebar-divider my-0"> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#logistic" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fa-solid fa-dolly"></i>
            <span>Logistic</span>
        </a>
        <div id="logistic" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="{{ route('reservation_slip.index') }}">Reservation Slip</a>
                <a class="collapse-item" href="{{ route('purchase_requisition.index') }}">Purchase Requisition</a>
                <a class="collapse-item" href="{{ route('good_receipt.index') }}">Good Receipt</a>
            </div>
        </div>
    </li>
    {{-- <hr class="sidebar-divider my-0"> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#purchasing"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-tags"></i>
            <span>Purchasing</span>
        </a>
        <div id="purchasing" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="{{ route('purchase_order.index') }}">Purchase Order</a>
            </div>
        </div>
    </li>
    {{-- <hr class="sidebar-divider my-0"> --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#finance" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fa-solid fa-comments-dollar"></i>
            <span>Finance & Accounting</span>
        </a>
        <div id="finance" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="login.html">Reservation Slip</a>
                <a class="collapse-item" href="register.html">Purchase Requisition</a>
                <a class="collapse-item" href="forgot-password.html">Good Receipt</a>
            </div>
        </div>
    </li> --}}
    {{-- <hr class="sidebar-divider my-0"> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#preventive"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Preventive Maintenance</span>
        </a>
        <div id="preventive" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="/work_order">Work Order</a>
                <a class="collapse-item" href="/material_request">Material Request</a>

                {{-- <a class="collapse-item" href="register.html">Purchase Requisition</a>
                <a class="collapse-item" href="forgot-password.html">Good Receipt</a> --}}
            </div>
        </div>
    </li>
    {{-- <hr class="sidebar-divider my-0"> --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hr" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fa-solid fa-people-arrows"></i>
            <span>Human Resource</span>
        </a>
        <div id="hr" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="login.html">Reservation Slip</a>
                <a class="collapse-item" href="register.html">Purchase Requisition</a>
                <a class="collapse-item" href="forgot-password.html">Good Receipt</a>
            </div>
        </div>
    </li> --}}
    {{-- <hr class="sidebar-divider my-0"> --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ga" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fa-solid fa-person-shelter"></i>
            <span>General Affair</span>
        </a>
        <div id="ga" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="login.html">Reservation Slip</a>
                <a class="collapse-item" href="register.html">Purchase Requisition</a>
                <a class="collapse-item" href="forgot-password.html">Good Receipt</a>
            </div>
        </div>
    </li> --}}
    {{-- <hr class="sidebar-divider my-0"> --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#direction"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-people-group"></i>
            <span>Direction</span>
        </a>
        <div id="direction" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="login.html">Reservation Slip</a>
                <a class="collapse-item" href="register.html">Purchase Requisition</a>
                <a class="collapse-item" href="forgot-password.html">Good Receipt</a>
            </div>
        </div>
    </li> --}}
    {{-- <hr class="sidebar-divider my-0"> --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user_master"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-user-lock"></i>
            <span>User Master</span>
        </a>
        <div id="user_master" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner ">
                <a class="collapse-item" href="login.html">Reservation Slip</a>
                <a class="collapse-item" href="register.html">Purchase Requisition</a>
                <a class="collapse-item" href="forgot-password.html">Good Receipt</a>
            </div>
        </div>
    </li> --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
