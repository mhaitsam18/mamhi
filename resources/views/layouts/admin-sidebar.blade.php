<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            MAM<span>HI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body" id="background-sidebar">
        <ul class="nav">
            <li class="nav-item nav-category">Menu</li>
            <li class="nav-item">
                <a href="/admin" class="nav-link @if($page == 'index') active @endif">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/jadwal-praktik" class="nav-link @if($page == 'jadwal-praktik') active @endif">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Jadwal</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/hasil" class="nav-link @if($page == 'hasil') active @endif">
                    <i class="link-icon" data-feather="file"></i>
                    <span class="link-title">Hasil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($page == 'index') active @endif>" data-bs-toggle="collapse" href="#datas" role="button"
                    aria-expanded="false" aria-controls="datas">
                    <i class="link-icon" data-feather="database"></i>
                    <span class="link-title">Data</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="datas">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="/admin/psikolog" class="nav-link @if($page == 'psikolog') active @endif">Data Psikolog</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/member" class="nav-link @if($page == 'member') active @endif">Data Member</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/konsultasi" class="nav-link @if($page == 'konsultasi') active @endif">Data Konsultasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/psikotes" class="nav-link @if($page == 'psikotes') active @endif">Data Psikotes</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/jadwal" class="nav-link @if($page == 'jadwal') active @endif">Data Jadwal</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
{{-- <nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                    value="sidebar-light" checked>
                <label class="form-check-label" for="sidebarLight">
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                    value="sidebar-dark">
                <label class="form-check-label" for="sidebarDark">
                    Dark
                </label>
            </div>
        </div>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item active" href="../demo1/dashboard.html">
                <img src="/assets-nobleui/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item" href="../demo2/dashboard.html">
                <img src="/assets-nobleui/images/screenshots/dark.jpg" alt="light theme">
            </a>
        </div>
    </div>
</nav> --}}
<!-- partial -->