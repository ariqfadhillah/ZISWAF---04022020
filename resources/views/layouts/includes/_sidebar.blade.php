<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/kuitansi" class="{{ (request()->is('dashboard*','kuitansi*')) ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>ZISWAF Disini</span></a></li>
						<li><a href="/petugas" class="{{ (request()->is('petugas*','amil*')) ? 'active' : '' }}"><i class="lnr lnr-pencil"></i> <span>Tampilan Account</span></a></li>
						<li><a href="/muzakki" class="{{ (request()->is('satuan_ziswaf*','jenis_ziswaf*','muzakki*')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Cek Zakat</span></a></li>                                                                

					</ul>
				</nav>
			</div>
		</div>