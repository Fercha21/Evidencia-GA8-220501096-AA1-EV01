<?php
session_start();
include 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    if (empty($email) || empty($password)) {
        $message = 'Email y contraseña son obligatorios.';
    } else {

        $stmt = $conn->prepare("SELECT password_hash FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();


        if ($stmt->num_rows === 0) {
            $message = 'Credenciales incorrectas.';
        } else {

            $stmt->bind_result($password_hash);
            $stmt->fetch();


            if (password_verify($password, $password_hash)) {
                $_SESSION['user_email'] = $email;
                $message = 'Autenticación satisfactoria.';

                header('Location: menu.php');
                exit();
            } else {
                $message = 'Credenciales incorrectas.';
            }
        }

        $stmt->close();
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
    <title>Ingresar</title>


</head>

<body>
    <?php
    include 'partials/header.php';
    ?>

    <?php if (!empty($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <main>
        <div class="fondoingreso">
            <h1>Ingreso</h1>
            <form method="post" action="login.php">
                <input type="email" name="email" required placeholder="Correo">
                <input type="password" name="password" required placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>