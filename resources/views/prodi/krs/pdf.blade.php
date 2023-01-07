<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>KARTU RENCANA STUDI</h1>
    <p>Ronaldo</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode Mata Kuliah</th>
            <th>Semester</th>
            <th>SKS</th>
            <th>Hari</th>
            <th>Ruangan</th>
            <th>Mulai</th>
            <th>Selesai</th>
          </tr>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>