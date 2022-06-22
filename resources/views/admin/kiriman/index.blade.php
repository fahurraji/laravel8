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
  @include('admin/kiriman/tambah')
</p>
<form action="{{ asset('admin/kiriman/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">

  <div class="col-md-12">
    <div class="btn-group">
      <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
          <i class="fa fa-trash"></i>
      </button> 
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
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
    <th width="15%">Nomor Resi</th>
    <th width="20%">Pengirim</th>
    <th width="20%">Alamat Pengirim</th>
    <th width="20%">Alamat Tujuan</th>
   
    <th>ACTION</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($kirim as $video) { ?>

    <td class="text-center">
        <div class="icheck-primary">
            <input type="checkbox" class="icheckbox_flat-blue " name="id[]" value="<?php echo $video->id ?>" id="check<?php echo $i ?>">
            <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
    <td>
        <?php echo $video->nmr_resi ?>
    </td>

    <td><?php echo $video->nama_pengirim ?></td>
    <td><small><?php echo $video->alamat_pengirim ?></small></td>
    <td><small><?php echo $video->alamat_tujuan ?></small> </td>
    <td>
        <div class="btn-group">
        <a href="{{ asset('admin/kiriman/edit/'.$video->id) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

          <a href="{{ asset('admin/kiriman/delete/'.$video->id) }}" class="btn btn-danger btn-sm  delete-link">
            <i class="fa fa-trash"></i></a>
        </div>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
</form>