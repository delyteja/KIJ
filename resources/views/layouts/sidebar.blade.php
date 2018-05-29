  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i><span>Pemasukan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-link"></i> <span>Pemasukan Rutin</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{URL::to('pemasukan/gaji_pokok')}}"><i class="fa fa-link"></i> <span>Gaji Pokok</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>        
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-link"></i> <span>Gaji Tunjangan</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>        
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-link"></i> <span>Pembayaran Kos</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>        
                        </li>              
                    </ul>    

                </li>

            </ul>
              <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-link"></i> <span>Pemasukan Per 6 Bulan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#"><i class="fa fa-link"></i> <span>Panen Padi</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>        
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-link"></i> <span>Panen Rempah Rempah</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>        
                        </li>              
                    </ul>    
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-link"></i> <span>Pemasukan Tahunan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#"><i class="fa fa-link"></i> <span>Pembayaran Sewa Rumah</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>        
                        </li>              
                    </ul>    
                </li>
            </ul>

        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Pengeluaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            
            <li>
              <a href="#"><i class="fa fa-link"></i> <span>Pengeluaran Rutin</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              
              <ul class="treeview-menu">
                
                <li>
                  <a href="{{ route('histori', 'Tagihan Listrik') }}"><i class="fa fa-link"></i> <span>Tagihan Listrik</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('histori', 'Tagihan Air') }}"><i class="fa fa-link"></i> <span>Tagihan Air</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('histori', 'Biaya Sekolah') }}"><i class="fa fa-link"></i> <span>Biaya Sekolah</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('histori', 'Pajak Bulanan') }}"><i class="fa fa-link"></i> <span>Pajak Bulanan</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('histori', 'Sewa Rumah') }}"><i class="fa fa-link"></i> <span>Sewa Rumah</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>

              </ul>

            </li>
            <li>
              <a href="#"><i class="fa fa-link"></i> <span>Pengeluaran Tidak Tentu</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              
              <ul class="treeview-menu">
                
                <li>
                  <a href="{{ route('histori', 'Pembayaran Hutang') }}"><i class="fa fa-link"></i> <span>Pembayaran Hutang</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('histori', 'Lain Lain') }}"><i class="fa fa-link"></i> <span>Lain Lain</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                </li>

              </ul>

            </li>

          </ul>

        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>