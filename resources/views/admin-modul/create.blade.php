@extends('html.app')
@section('content')
<section class="content">
      <div class="row">

      <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Date picker</h3>
            </div>
            <form method="post" id="save-data">
              <div class="box-body">
                <!-- Date -->
                <div class="form-group">
                  <label>Nama:</label>
                  <input type="text" class="form-control pull-right" name="nama">
                </div>

                <div class="form-group">
                  <label>Tanggal:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                </div>

                <div class="form-group">
                  <label>Date:</label>

                  <div class="box-body pad" style="padding:0px">
                      <form>
                              <textarea id="editor2" name="editor1" rows="10" cols="80">
                                                      This is my textarea to be replaced with CKEditor.
                              </textarea>
                      </form>
                  </div>
                </div>
                
              </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" onclick="simpan()" class="btn btn-info ">Sign in</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>


       
      </div>
      <!-- ./row -->
    </section>
<script>
  function simpan(){
    alert('dasasd');
  }
</script>
@endsection