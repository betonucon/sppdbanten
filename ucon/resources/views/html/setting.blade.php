<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <!-- <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
      <!-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content" >
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <ul class="control-sidebar-menu">
        @if(Auth::user()->role_id==3)
          <li>
            <a href="{{url('/user/')}}">
            <h4 class="control-sidebar-subheading"><i class="fa fa-gear"></i> Pengaturan Role</h4>
            </a>
          </li>
          <li>
            <a href="{{url('/akses/')}}">
            <h4 class="control-sidebar-subheading"><i class="fa fa-group"></i> Data Pengguna</h4>
            </a>
          </li>
        @endif
          <li>
            <a href="{{url('/employe/')}}">
            <h4 class="control-sidebar-subheading"><i class="fa fa-gear"></i> Pengaturan Umum</h4>
            </a>
          </li>
        @if(permision_role(6)>0)
          <li>
            <a href="{{url('/pegawai/report/report')}}">
            <h4 class="control-sidebar-subheading"><i class="fa fa-clone"></i> Report Pegawai</h4>
            </a>
          </li>
        @endif
        @if(permision_role(3)>0)
          <li>
            <a href="{{url('/surat_tugas/report/report')}}">
            <h4 class="control-sidebar-subheading"><i class="fa fa-clone"></i> Report Surat Tugas</h4>
            </a>
          </li>
        @endif
        @if(permision_role(4)>0)
          <li>
            <a href="{{url('/surat_tugas/kwitansi/ok')}}">
            <h4 class="control-sidebar-subheading"><i class="fa fa-clone"></i> Report Kwitansi</h4>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading"><i class="fa fa-clone"></i> Report Kwitansi Detail</h4>
            </a>
          </li>
         @endif 
        </ul>
        
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>