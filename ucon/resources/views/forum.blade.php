@extends('html.app')
@section('content')
<section class="content">

        <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="mailbox-controls" style="background:#d6d6e3;margin-bottom:10px">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm" ><i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                
                </div>
                <!-- /.pull-right -->
            </div>
            <div class="chatts" id="scroll-class">
                <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                        <span class="bg-red">
                        10 Feb. 2014
                        </span>
                </li>
                
                @for($x=1;$x<10;$x++)

                <li>
                    <i class="fa fa-envelope bg-blue"></i>
                    <div class="timeline-item" style="width: 80%;font-size: 12px;">
                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a></h3>
                        <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
                    </div>
                </li>
                @endfor
                </ul>
            </div>
            <div class="create">
                <span data-toggle="modal" data-target="#modalreplay" class="btn btn-primary btn-sm">Replay</span>
            </div>
        </div>
        <!-- /.col -->
    </div>


</section>
<!-- /.row -->
<div class="modal fade" id="modalreplay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Forum</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Replay</label>

                    <div class="input-group">
                        <textarea id="editor1" name="editor1" rows="20" cols="80"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<style>
    @media only screen and (max-width: 600px) {

        .chatts{
            width:100%;
            height:200px;
            overflow-y:scroll;
        }
    }

    @media only screen and (min-width: 768px) {
        .chatts{
            width:95%;
            height:385px;
            overflow-y:auto;
        }
        .create{
            width:100%;
            padding:10px;
            background:#d6d6e1;
        }
    }
</style>

@endsection
