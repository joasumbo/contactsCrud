<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos PDF</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Lista de contactos</h1>
    <table border="1" cellspacing="0" cellpadding="5" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telemóvel</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
