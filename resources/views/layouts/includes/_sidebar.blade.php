<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/kuitansi" class="{{ (request()->is('dashboard*','kuitansi*')) ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Lakukan Transaksi Ziswaf Disini</span></a></li>

						<li><a href="/petugas" class="{{ (request()->is('petugas*','amil*')) ? 'active' : '' }}"><i class="lnr lnr-pencil"></i> <span>Tambah Petugas</span></a></li>
						<li><a href="/amil" class="{{ (request()->is('petugas*','amil*')) ? 'active' : '' }}"><i class="lnr lnr-pencil"></i> <span>Tampilan Amil</span></a></li>

						<li><a href="/transaksi" class="{{ (request()->is('transaksi*')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Transaksi Ziswaf</span></a></li>

						<li><a href="/muzakki" class="{{ (request()->is('satuan_ziswaf*','jenis_ziswaf*','muzakki*')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Cek Muzakki</span></a></li>
						<li><a href="/satuan_ziswaf" class="{{ (request()->is('satuan_ziswaf*','jenis_ziswaf*','muzakki*')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Added Satuan Ziswaf</span></a></li>
						<li><a href="/jenis_ziswaf" class="{{ (request()->is('satuan_ziswaf*','jenis_ziswaf*','muzakki*')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Added Jenis Ziswaf</span></a></li>                                                                

					</ul>
				</nav>
			</div>
		</div>