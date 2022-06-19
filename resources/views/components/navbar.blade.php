<style>
    @media screen and (max-width: 767px) {
        .navbar-brand {
            font-size: 1.1rem;
            width: 150px !important;
        }
    }
    
    @media screen and (max-width: 500px) {
        a.nav-link.text-danger small {
            font-size: 0.8rem;
        }
    }
</style>
<nav class="sb-topnav navbar px-4 navbar-expand navbar-light bg-white border-bottom">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Brand-->
    <a class="navbar-brand fw-bold ms-2" href="/">📌 EAI Easygo</a>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-lg-0 me-2">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link text-danger" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal"><small><i class="fas fa-sign-out-alt me-sm-2 me-1"></i>Logout</small></a>
        </li>
    </ul>
</nav>

<form action="{{ Route('logout') }}">
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </div>
</form>