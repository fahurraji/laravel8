@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/kiriman/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id" value="<?php echo $kirim->id ?>">

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Nomor Resi</label>
    <div class="col-sm-3">
        <input type="text" name="nmr_resi" class="form-control" value="<?php echo $kirim->nmr_resi ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Jenis Layanan</label>
    <div class="col-sm-3">
        <select name="negara_tujuan" class="form-control">
            <option value="POS" <?php if($kirim->layanan=="POS") { echo "selected"; } ?>>POS</option>
            <option value="DHL" <?php if($kirim->layanan=="DHL") { echo "selected"; } ?>>DHL</option>
            <option value="LAINNYA" <?php if($kirim->layanan=="LAINNYA") { echo "selected"; } ?>>LAINNYA</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Nomor Ekspedisi</label>
    <div class="col-sm-6">
        <input type="text" name="nmr_ekpedisi" class="form-control" value="<?php echo $kirim->nmr_ekpedisi ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Nama Pengirim</label>
    <div class="col-sm-6">
        <input type="text" name="nama_pengirim" class="form-control" value="<?php echo $kirim->nama_pengirim ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Alamat Pengirim</label>
    <div class="col-sm-9">
        <textarea name="alamat_pengirim" class="form-control" placeholder="alamat pengirim"><?php echo $kirim->alamat_pengirim ?></textarea>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Telpon Pengirim</label>
    <div class="col-sm-6">
        <input type="text" name="telp_pengirim" class="form-control" value="<?php echo $kirim->telp_pengirim ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Nama Penerima</label>
    <div class="col-sm-6">
        <input type="text" name="nama_tujuan" class="form-control" value="<?php echo $kirim->nama_tujuan ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Alamat Penerima</label>
    <div class="col-sm-9">
        <textarea name="alamat_tujuan" class="form-control" placeholder="alamat penerima"><?php echo $kirim->alamat_tujuan ?></textarea>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">No Telpon Penerima</label>
    <div class="col-sm-9">
        <input type="text" name="telp_tujuan" class="form-control"  value="<?php echo $kirim->telp_tujuan ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Negara Tujuan</label>
    <div class="col-sm-6">
        <select name="negara_tujuan" class="form-control">
            <option value="1">Dalam Negeri</option>
            <option value="2">Luar Negeri</option>
        </select>
    </div>
</div>

{{-- 
<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Status Kirim</label>
    <div class="col-sm-6">
        <select name="status_kirim" class="form-control">
            <option value="1">Barang Siap Dikirim</option>
            <option value="2">Barang Dalam Proses Pengiriman</option>
            <option value="3">Barang Dalam Proses Transit</option>
            <option value="4">Barang Sampai Di Tempat Tujuan</option>
            <option value="5">Barang Diterima - Selesai</option>
        </select>
    </div>
</div> --}}
{{-- 
<div class="form-group row">
    <label class="col-sm-3 control-label text-right">Berat (Kg) </label>
    <div class="col-sm-3">
        <input type="number" name="berat" class="form-control" value="<?php echo $kirim->berat ?>" required>
    </div>
</div> --}}


<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<a href="{{ asset('admin/kiriman') }}" class="btn btn-danger">Kembali</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</form>

