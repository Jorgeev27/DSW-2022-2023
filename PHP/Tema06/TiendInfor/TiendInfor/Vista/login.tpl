<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-6 text-center">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="user" class="form">Nombre de usuario:</label>
                            <input type="text" class="form" id="user" name="user" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form">Contraseña:</label>
                            <input type="password" class="form" id="password" name="password" required="required">
                        </div>
                        <button type="submit" id="entrar" name="entrar" class="btn btn-success w-100">Entrar</button>
                    </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>