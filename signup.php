<?php
include 'database.php';

$message = '';
$registro_exitoso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $document = $_POST['document'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $country = $_POST['country'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    if (empty($document) || empty($first_name) || empty($last_name) || empty($country) || empty($email) || empty($password)) {
        $message = 'Todos los campos son obligatorios.';
    } else {
        $check_email_stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $check_email_stmt->bind_param('s', $email);
        $check_email_stmt->execute();
        $check_email_stmt->store_result();

        $check_document_stmt = $conn->prepare("SELECT document FROM users WHERE document = ?");
        $check_document_stmt->bind_param('s', $document);
        $check_document_stmt->execute();
        $check_document_stmt->store_result();

        if ($check_email_stmt->num_rows > 0) {
            $message = 'El email ya está registrado.';
        } elseif ($check_document_stmt->num_rows > 0) {
            $message = 'El documento ya está registrado.';
        } else {

            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO users (document, first_name, last_name, country, email, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $document, $first_name, $last_name, $country, $email, $password_hash);


            if ($stmt->execute()) {
                $registro_exitoso = true;
            } else {
                $message = 'Error al registrar el usuario.';
            }

            $stmt->close();
        }
        $check_email_stmt->close();
        $check_document_stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registro de Usuario</title>

</head>


<body>

    <?php
    include 'partials/header.php';
    ?>

    <?php if ($registro_exitoso): ?>
        <p class="mensaje-exito">¡Usuario creado exitosamente! Ahora puedes iniciar sesión.</p>
        <a href="login.php"><button>Iniciar Sesión</button></a>
    <?php elseif (!empty($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>


    <main>
        <div class="fondoregistro">
            <h3>Por favor, Ingrese los siguientes datos para Registrarse</h3>
            <form method="post" action="signup.php">
                <input type="text" name="document" required placeholder="No. Identificacion">
                <input type="text" name="first_name" required placeholder="Nombre">
                <input type="text" name="last_name" required placeholder="Apellido">
                <input type="text" name="country" required placeholder="Pais">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Contraseña">
                <input type="submit" value="Registrar">
            </form>
        </div>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>