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
      <li class="active"><a href="{{ route('home') }}"><i class="fa fa-link"></i> <span>Home</span></a></li>
        
        <li class=""><a href="{{ route('validasi') }}"><i class="fa fa-link"></i> <span>Validasi</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i><span>Tambah Kategori</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{URL::to('tambah_kategori/jenis_kategori')}}"><i class="fa fa-link"></i> <span>Tambah Jenis Kategori</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('tambah_kategori/nama_kategori_pemasukan')}}"><i class="fa fa-link"></i> <span>Tambah Nama<br>Kategori Pemasukan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('tambah_kategori/nama_kategori_pengeluaran')}}"><i class="fa fa-link"></i> <span>Tambah Nama<br>Kategori Pengeluaran</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                </li>

          </ul>
      </li>
      
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i><span>Pemasukan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @foreach($jk_masuk as $km)
                <li>
                    <a href="#"><i class="fa fa-link"></i> <span>{{$km->nama_jenis}}</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                <ul class="treeview-menu">
                  @foreach($nama_k_masuk as $nkm)
                    @if($nkm->jenis_kategori_id == $km->id)
                    <li>
                      <a href="{{URL::to('pemasukan/detail/'.$nkm->id)}}"><i class="fa fa-link"></i> <span>{{$nkm->nama_kategori}}</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>        
                    </li>
                    @endif
                  @endforeach
                </ul>
              </li>                
              @endforeach
            </ul>
          </li>      
          
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i><span>Pengeluaran</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @foreach($jk_keluar as $km)
                <li>
                    <a href="#"><i class="fa fa-link"></i> <span>{{$km->nama_jenis}}</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                <ul class="treeview-menu">
                  @foreach($nama_k_keluar as $nkm)
                    @if($nkm->jenis_kategori_id == $km->id)
                    <li>
                      <a href="{{route('histori', $nkm->nama_kategori)}}"><i class="fa fa-link"></i> <span>{{$nkm->nama_kategori}}</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>        
                    </li>
                    @endif
                  @endforeach
                </ul>
              </li>                
              @endforeach
            </ul>
          </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>