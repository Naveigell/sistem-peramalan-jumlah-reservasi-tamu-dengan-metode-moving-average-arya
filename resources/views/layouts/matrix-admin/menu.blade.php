<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('sales.index') }}" class="sidebar-link">
                <i class="mdi mdi-move-resize-variant"></i><span class="hide-menu"> Reservasi </span>
            </a>
        </li>
        {{-- <li class="sidebar-item">
            <a href="{{ route('babies.index') }}" class="sidebar-link">
                <i class="mdi mdi-codepen"></i><span class="hide-menu"> Baby </span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('births.index') }}" class="sidebar-link">
                <i class="mdi mdi-move-resize-variant"></i><span class="hide-menu"> Birth </span>
            </a>
        </li> --}}
        <li class="sidebar-item">
            <a href="{{ route('users.index') }}" class="sidebar-link">
                <i class="mdi mdi-codepen"></i><span class="hide-menu"> Pengguna </span>
            </a>
        <li class="sidebar-item">
            <a href="{{ route('sale-reports.index') }}" class="sidebar-link">
                <i class="mdi mdi-move-resize-variant"></i><span class="hide-menu"> Laporan Reservasi </span>
            </a>
        </li>
    </ul>
</nav>
<!-- End Sidebar navigation -->