
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel">Input data </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{ asset('admin/kiriman/tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Nomor Resi</label>
					<div class="col-sm-3">
						<input type="text" name="nmr_resi" class="form-control" placeholder="AUTO NUMBER" value="{{ old('nmr_resi') }}" readonly>
					</div>
				</div>

				<div class="form-group row" >
					<label class="col-sm-3 control-label text-right">Jenis Layanan</label>
					<div class="col-sm-3">
						<select name="layanan" id="layanan" class="form-control" required>
							<option value="0">-- Pilih --</option>
							<option value="1">Manual Tracking</option>
							<option value="2">Ekspedisi Tracking</option>
						</select>
					</div>
				</div>

				<div class="form-group row" id="nmr_tracking">
					<label class="col-sm-3 control-label text-right">Nomor Ekspedisi</label>
					<div class="col-sm-3">
						<input type="text" name="nmr_ekpedisi" id="nmr_ekpedisi" class="form-control" placeholder="Nomor Ekspedisi" value="{{ old('nmr_ekpedisi') }}" style="text-transform:uppercase">
					</div>
				</div>

				<div class="form-group row" >
					<label class="col-sm-3 control-label text-right">Nama Pengirim</label>
					<div class="col-sm-6">
						<input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Pengirim" value="{{ old('nama_pengirim') }}" required>
					</div>
				</div>

				<div class="form-group row" >
					<label class="col-sm-3 control-label text-right">Alamat Pengirim</label>
					<div class="col-sm-9">
						<textarea name="alamat_pengirim" class="form-control" placeholder="alamat pengirim">{{ old('alamat_pengirim') }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Telpon Pengirim</label>
					<div class="col-sm-6">
						<input type="text" name="telp_pengirim" class="form-control" placeholder="telpon pengirim" value="{{ old('telp_pengirim') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Nama Penerima</label>
					<div class="col-sm-6">
						<input type="text" name="nama_tujuan" class="form-control" placeholder="nama tujuan" value="{{ old('nama_tujuan') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Alamat Penerima</label>
					<div class="col-sm-9">
						<textarea name="alamat_tujuan" class="form-control" placeholder="alamat penerima">{{ old('alamat_tujuan') }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">No Telpon Penerima</label>
					<div class="col-sm-3">
						<input type="text" name="telp_tujuan" class="form-control" placeholder="Nomor Telpon penerima" value="{{ old('telp_tujuan') }}" required>
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

				
				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Status Kirim</label>
					<div class="col-sm-6">
						<select name="status_kirim" class="form-control">
						@php
							$data = DB::table('status_kirim')->get();
							foreach($data as $dt){
								echo "<option value=".$dt->id.">".$dt->keterangan."</option>";
							}
						@endphp
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Berat (Kg) </label>
					<div class="col-sm-3">
						<input type="number" name="berat" class="form-control" placeholder="Berat" value="{{ old('berat') }}" required>
					</div>
				</div>

				{{-- <div class="form-group row">
					<label class="col-sm-3 control-label text-right">Total Harga </label>
					<div class="col-sm-3">
						<input type="text" name="total" class="form-control" placeholder="Total Harga" value="{{ old('total') }}" required>
					</div>
				</div>				 --}}

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

			</div>
		</div>
	</div>
</div>
