<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PDF</title>
	<style>
		@page { size: A4 }
  
	h1 {
		font-weight: bold;
		font-size: 20pt;
		text-align: center;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	.table th {
		padding: 8px 8px;
		border:1px solid #000000;
		text-align: center;
	}

	.table td {
		padding: 3px 3px;
		border:1px solid #000000;
	}

	.text-center {
		text-align: center;
	}
	</style>
</head>

<table align="center">
	<tr>
		<td><img src="{{ public_path('/images/user.png') }}" width="70" height="70"><td>
		<td><center>
			<font size="4">KABUPATEN KUTAI KARTANEGARA</font><br>
			<font size="5">DINAS KOMUNIKASI DAN INFORMATIKA</font><br>
			<font size="2"><i>Jln.Pahlawan Bukit Biru No.1 Tenggarong telp. 0541 2234</i></font></center>
		</td>
	</tr>
	<tr>
		<td colspan="2"><hr> </td>
	</tr>
</table>
<br>

<body>
	<h1>Report Decline List</h1>
	<div class="container">
		<div>
			<table class="table">
				<thead>
					<tr class="table-info">
						<th scope="col" width="50">No.</th>
						<th scope="col">Tanggal</th>
						<th scope="col">NIK</th>
						<th scope="col">Nama Masyarakat</th>
						<th scope="col">Isi Aduan</th>
						<th scope="col">Photo Pendukung</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($report as $item)
						<tr>
							<th scope="row">{{ $loop->iteration}}</th>
							<td>{{ $item->tgl_pengaduan }}</td>
							<td>{{ $item->masyarakat->nik}}</td>
							<td>{{ $item->masyarakat->nama }}</td>
							<td>{{ $item->isi_laporan }}</td>
							<td><img width="50px" src="{{ storage_path('app/public/foto/'.$item->foto) }}" alt=""></td>
							<td>{{ $item->status }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>