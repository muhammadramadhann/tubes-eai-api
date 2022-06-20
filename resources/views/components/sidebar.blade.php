<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #FCFFE7;" >
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- HC --}}
                <div class="sb-sidenav-menu-heading" style="color:#DEA057" >Core</div>
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <div class="sb-nav-link-icon" style="color:#AE431E;"><i class="fas fa-tachometer-alt"></i></div>
                    <div style="color:#AE431E;">Dashboard</div>
                </a>
                <div class="sb-sidenav-menu-heading" style="color:#DEA057" >Division</div>
                <a class="nav-link {{ Request::is('karyawan', 'karyawan/*', 'pelamar', 'pelamar/*', 'absensi', 'absensi/*', 'pengajuan-cuti', 'pengajuan-cuti/*') ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHc" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon" style="color:#AE431E;"><i class="fas fa-user-tie"></i></div>
                    <div style="color:#AE431E;">Human Capital</div>
                    <div class="sb-sidenav-collapse-arrow" style="color:#AE431E;"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('karyawan', 'karyawan/*', 'pelamar', 'pelamar/*', 'absensi', 'absensi/*', 'pengajuan-cuti', 'pengajuan-cuti/*', 'resign' , 'resign/*') ? 'show' : '' }}" id="collapseHc" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('karyawan', 'karyawan/*') ? 'active' : '' }}" href="/karyawan">Karyawan</a>
                        <a class="nav-link {{ Request::is('absensi', 'absensi/*') ? 'active' : '' }}" href="/absensi">Absensi</a>
                        <a class="nav-link {{ Request::is('pengajuan-cuti', 'pengajuan-cuti/*') ? 'active' : '' }}" href="/pengajuan-cuti">Pengajuan Cuti</a>
                        <a class="nav-link {{ Request::is('resign', 'resign/*') ? 'active' : '' }}" href="/resign">Resign</a>
                        <a class="nav-link {{ Request::is('pelamar', 'pelamar/*') ? 'active' : '' }}" href="/pelamar">Pelamar</a>
                    </nav>
                </div>

                {{-- Finance --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFinance" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon" style="color:#AE431E;"><i class="fas fa-book"></i></div>
                    <div style="color:#AE431E;">Finance</div>
                    <div class="sb-sidenav-collapse-arrow" style="color:#AE431E;"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFinance" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('penggajian', 'penggajian/*') ? 'active' : '' }}" href="/penggajian">Penggajian</a>
                        <a class="nav-link {{ Request::is('pengajuan', 'pengajuan/*') ? 'active' : '' }}" href="/pengajuan">Pengajuan</a>
                        <a class="nav-link {{ Request::is('pencairan', 'pencairan/*') ? 'active' : '' }}" href="/pencairan">Pencairan</a>
                    </nav>
                </div>

                {{-- Marketing --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMarketing" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon" style="color:#AE431E;"><i class="fas fa-search-dollar"></i></div>
                    <div style="color:#AE431E;">Marketing</div>
                    <div class="sb-sidenav-collapse-arrow" style="color:#AE431E;"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMarketing" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">N/A</a>
                    </nav>
                </div>
                
                {{-- IT (produksi) --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseIt" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon" style="color:#AE431E;"><i class="fas fa-laptop-code"></i></div>
                    <div style="color:#AE431E;">IT (Produksi)</div>
                    <div class="sb-sidenav-collapse-arrow" style="color:#AE431E;"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseIt" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Laporan Produksi</a>
                        <a class="nav-link {{ Request::is('productionrequest', 'productionrequest/*') ? 'active' : '' }}" href="/productionrequest">Perencanaan Produksi</a>
                    </nav>
                </div>
                
                {{-- SCM --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseScm" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon" style="color:#AE431E;"><i class="fas fa-warehouse"></i></div>
                    <div style="color:#AE431E;">SCM</div>
                    <div class="sb-sidenav-collapse-arrow" style="color:#AE431E;"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseScm" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Material</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer" style="background-color: #E0D8B0; color: #AE431E;">
            <div class="small" >Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>