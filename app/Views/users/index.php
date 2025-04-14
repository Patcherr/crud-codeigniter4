<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <h1 class="text-4xl font-bold text-black text-center">Lista de Usuarios</h1>
    
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <table class="table-auto border-collapse border=1 border-gray-200 w-full">
            <thead>
                <tr class="bg-black text-white">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2"><?= esc($user['id']); ?></td>
                    <td class="border px-4 py-2"><?= esc($user['name']); ?></td>
                    <td class="border px-4 py-2"><?= esc($user['email']); ?></td>
                    <td class="border px-4 py-2">               
                        <a class="bg-black text-white px-2 py-1 rounded-lg shadow-lg hover:bg-gray-700 hover:border-gray-400" href="/users/edit/<?= esc($user['id']); ?>">Editar</a>
                        <a class="bg-black text-white px-2 py-1 rounded-lg shadow-lg hover:bg-gray-700 hover:border-gray-400" href="/users/delete/<?= esc($user['id']); ?>" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</a>
                    </td>
                </tr>      
                <?php endforeach; ?>           
            </tbody>
        </table>
    </div>
    <div class="text-center mt-6">
        <button class="bg-black text-white px-6 py-3 border border-gray-500 rounded-lg shadow-lg hover:bg-gray-700 hover:border-gray-400"><a href="/users/create">Agregar Nuevo Usuario</a></button>
    </div>
</body>
</html>
