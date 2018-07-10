<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Menu</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="nav-icon icon-people"></i> Manajemen User
                </a>
                <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                    <i class="nav-icon icon-people"></i> Kelola Mahasiswa
                </a>
                <a class="nav-link" href="{{ route('instansi.index') }}">
                    <i class="nav-icon icon-people"></i> Kelola Instansi
                </a>
                <a class="nav-link" href="{{ route('dosen.index') }}">
                    <i class="nav-icon icon-people"></i> Kelola Dosen
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>