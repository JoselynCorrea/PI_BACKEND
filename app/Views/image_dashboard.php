<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        .logout {
            text-align: right;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            background: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form input[type="file"] {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
        }

        form button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #2980b9;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .gallery a {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            text-align: center;
            color: #e74c3c;
        }

        .gallery a:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="logout">
        <a href="<?= base_url('/logout') ?>">Cerrar Sesión</a>
    </div>

    <h1>Administración de Imágenes</h1>

    <form method="post" enctype="multipart/form-data" action="<?= base_url('/upload') ?>">
        <input type="file" name="image" required>
        <button type="submit">Subir Imagen</button>
    </form>

    <?php $currentUserId = null; ?>

    <?php foreach ($images as $image): ?>
        <?php if ($currentUserId !== $image['user_id']): ?>
            <?php if ($currentUserId !== null): ?>
                </div>
            <?php endif; ?>

            <div>
                <h3>User <?= $image['user_id'] ?></h3>
                <div class="gallery">
            <?php $currentUserId = $image['user_id']; ?>
        <?php endif; ?>

        <div>
            <img src="<?= base_url('assets/' . $image['filename']) ?>">
            <a href="<?= base_url('delete/' . $image['id']) ?>">Borrar</a>
        </div>

    <?php endforeach; ?>

    <?php if ($currentUserId !== null): ?>
        </div>
    <?php endif; ?>

</body>
</html>
