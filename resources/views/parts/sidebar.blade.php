<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('dashboard') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="{{ route('data-karyawan.index') }}">
                        <span class="icon-holder">
                            <i class="anticon anticon-user"></i>
                        </span>
                        <span class="title">Data Karyawan</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="{{ route('laporan') }}">
                        <span class="icon-holder">
                            <i class="anticon anticon-table"></i>
                        </span>
                        <span class="title">Laporan Patroli</span>
                    </a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="anticon anticon-form"></i>
                        </span>
                        <span class="title">Patroli</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('patroli') }}">Patroli</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
