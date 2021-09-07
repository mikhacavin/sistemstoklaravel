<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/home" class="nav-link {{request()->is('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Home
                </p>
            </a>
        </li>

        @if(auth()->user()->level=='admin')
        <li class="nav-item {{request()->is('laporankeluar','laporanmasuk') ? 'menu-open'  : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                    Laporan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/laporankeluar" class="nav-link {{request()->is('laporankeluar') ? 'active' : '' }}">
                        <i class="fas fa-caret-up text-danger"></i>
                        <p>Produk Keluar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanmasuk" class="nav-link {{request()->is('laporanmasuk') ? 'active' : '' }}">
                        <i class="fas fa-caret-down text-success"></i>
                        <p>Produk Masuk</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/laporankeluar/add" class="nav-link {{request()->is('laporankeluar/add') ? 'active' : '' }}">
                <i class="nav-icon fas fa-dolly"></i>
                <p>
                    Ambil Produk
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/laporanmasuk/add" class="nav-link {{request()->is('laporanmasuk/add') ? 'active' : '' }}">
                <i class="nav-icon fas fa-shipping-fast"></i>
                <p>
                    Produk Masuk
                </p>
            </a>
        </li>

        <li class="nav-item {{request()->is('produk','sales','user') ? 'menu-open'  : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-astronaut"></i>
                <p>
                    Kelola
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/produk" class="nav-link {{request()->is('produk') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Kelola Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/sales" class="nav-link {{request()->is('sales') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-ninja"></i>
                        <p>
                            Kelola Sales
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user" class="nav-link {{request()->is('user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Kelola User
                        </p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item {{request()->is('kategori','brand') ? 'menu-open'  : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                    Pengaturan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/kategori" class="nav-link {{request()->is('kategori') ? 'active' : '' }}">
                        <i class="fas fa-poll nav-icon"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/brand" class="nav-link  {{request()->is('brand') ? 'active' : '' }}">
                        <i class="far fa-gem nav-icon"></i>
                        <p>Brand</p>
                    </a>
                </li>
            </ul>
        </li>
        @elseif(auth()->user()->level=='sales')
        <li class="nav-item {{request()->is('laporankeluar','laporanmasuk') ? 'menu-open'  : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                    Laporan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/laporankeluar" class="nav-link {{request()->is('laporankeluar') ? 'active' : '' }}">
                        <i class="fas fa-caret-up text-danger"></i>
                        <p>Produk Keluar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanmasuk" class="nav-link {{request()->is('laporanmasuk') ? 'active' : '' }}">
                        <i class="fas fa-caret-down text-success"></i>
                        <p>Produk Masuk</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/laporankeluar/add" class="nav-link {{request()->is('laporankeluar/add') ? 'active' : '' }}">
                <i class="nav-icon fas fa-dolly"></i>
                <p>
                    Ambil Produk
                </p>
            </a>
        </li>
        @endif
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-link">
                @csrf
                <button type="submit" style="background-color: #343a40; color:orangered;">
                    <i class="nav-icon fas fa-user"></i>
                    Logout</button>
            </form>
        </li>
    </ul>
</nav>