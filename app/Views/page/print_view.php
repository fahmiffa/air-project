<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo isset($title)?$title:'' ?></title>

	<style>
		.text-center {
			text-align:  center;
		}
		table.table {
			width: 100%;
			border-collapse: collapse !important;
		}
		table.table tr  th, table.table tr td{
			border:1px solid #000;
			padding: 8px;
		}
		table.table tr th {
			text-align: left;
			width: 120px;
			padding-top:20px;
		}
		table.table tr td {
			width:120px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<header class="">
			<h4>Kop Surat Sekolah</h4>
			<hr>
		</header>
		<div class="content">
			<table class="table" border="">
				<tr>
					<th>Nama Lengkap</th>
					<td><?php echo $data['students_fullname']; ?></td>
					<th>Nama Ayah</th>
					<td><?php echo $data['students_name_of_father']; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo ($data['students_gender'] == 'l')?'<span class="badge badge-success">Laki-laki</span>':'<span class="badge badge-primary">Perempuan</span>' ?></td>
					<th>Nama Ibu</th>
					<td><?php echo $data['students_name_of_mother']; ?></td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td><?php echo $data['students_born_place']; ?></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td><?php echo $data['students_born_date']; ?></td>
				</tr>
				<tr>
					<th>Telepon</th>
					<td><?php echo $data['students_phone']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $data['students_email']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td><?php echo $data['students_address']; ?></td>
				</tr>
			</table>	
		</div>
	</div>
</body>
</html>