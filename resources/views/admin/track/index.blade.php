
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<p>
@include('admin/track/tambah')
</p>
<form action="{{ asset('admin/track/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">

<div class="col-md-12">
<div class="btn-group">
    {{-- <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
        <i class="fa fa-trash">&nbsp; Hapus</i>
    </button>  --}}
    {{-- <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
        <i class="fa fa-plus"></i> Tambah Baru
    </button> --}}
</div>
</div>
</div>


<div class="clearfix"><hr></div>
<div class="table-responsive mailbox-messages">
<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <th width="5%">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
            </button>
        </div>
    </th>
<th width="10%">Nomor Resi</th>
<th width="40%">Status Terakhir</th>
<th width="30">Tanggal update</th>
<th width="30">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($track as $st) { ?>

<td class="text-center">
    <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id[]" value="<?php echo $st->id ?>" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
    </div>
</td>
<td>
    <?php echo $st->nmr_resi ?>
</td>
<td>
    <?php echo $st->keterangan ?>
</td>
<td>
    <?php echo $st->created_at ?>
</td>
<td>
    <div class="btn-group">
    <a href="{{ asset('admin/track/edit/'.$st->id) }}" 
      class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

    </div>

</td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
</form>