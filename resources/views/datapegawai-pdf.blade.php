<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Data Karyawan Induksi KDC</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nik</th>
            <th>SID</th>
            <th>Usia</th>
            <th>Jabatan</th>
            <th>Perusahaan</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            {{-- <th>Status Induksi HR</th>
            <th>Status Induksi SHE</th> --}}
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $row)
            <tr>

                <td>{{ $no++ }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->nikkaryawan }}</td>
                <td>{{ $row->sid }}</td>
                <td>{{ $row->usia }}</td>
                <td>{{ $row->jabatan }}</td>
                <td>{{ $row->perusahaan }}</td>
                <td>{{ $row->jeniskelamin }}</td>
                <td>0{{ $row->nohp }}</td>
                {{-- <td>{{ $row->induksihr }}</td>
                <td>{{ $row->induksishe }}</td> --}}
                <td>
            </tr>
        @endforeach
    </table>

</body>

</html>
