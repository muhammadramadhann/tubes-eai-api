<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- HC --}}
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Division</div>
                <a class="nav-link {{ Request::is('karyawan', 'karyawan/*', 'pelamar', 'pelamar/*', 'absensi', 'absensi/*', 'pengajuan-cuti', 'pengajuan-cuti/*') ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHc" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    Human Capital
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('karyawan', 'karyawan/*', 'pelamar', 'pelamar/*', 'absensi', 'absensi/*', 'pengajuan-cuti', 'pengajuan-cuti/*') ? 'show' : '' }}" id="collapseHc" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('karyawan', 'karyawan/*') ? 'active' : '' }}" href="/karyawan">Karyawan</a>
                        <a class="nav-link" href="/pelamar">Pelamar</a>
                        <a class="nav-link" href="/absensi">Absensi</a>
                        <a class="nav-link" href="/pengajuan-cuti">Pengajuan Cuti</a>
                        <a class="nav-link" href="">Resign</a>
                    </nav>
                </div>

                {{-- Finance --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFinance" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Finance
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFinance" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Penggajian</a>
                        <a class="nav-link" href="">Pengajuan</a>
                        <a class="nav-link" href="">Pencairan</a>
                    </nav>
                </div>

                {{-- Marketing --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMarketing" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-search-dollar"></i></div>
                    Marketing
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMarketing" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">N/A</a>
                    </nav>
                </div>
                
                {{-- IT (produksi) --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseIt" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-laptop-code"></i></div>
                    IT (Produksi)
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseIt" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Laporan Produksi</a>
                        <a class="nav-link" href="">Perencanaan Produksi</a>
                    </nav>
                </div>
                
                {{-- SCM --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseScm" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    SCM
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseScm" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Material</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>