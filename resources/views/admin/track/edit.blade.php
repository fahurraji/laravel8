{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
        <form action="{{ asset('admin/track/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
                                    
            <div class="form-group row">
                <label class="col-sm-3 control-label text-right">Nomor Resi</label>
                <div class="col-sm-3">
                    <input type="text" name="nmr_resi" class="form-control" value="<?php echo $track->nmr_resi ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label text-right">Keterangan Status</label>
                <div class="col-sm-6">
                    <select name="id_status" class="form-control">
                        <?php foreach($status as $tr) { ?>
                            <option value="<?php echo $tr->id ?>"><?php echo $tr->keterangan ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                            
            <div class="form-group row">
                <label class="col-sm-3 control-label text-right"></label>
                <div class="col-sm-9">
                    <div class="form-group pull-right btn-group">
                        <input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
                        <input type="reset" name="reset" class="btn btn-success " value="Reset">
                        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    
              