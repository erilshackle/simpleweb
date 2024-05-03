<?php $LOGIN = FALSE;   // is not required to be login to acess the page //! MUST BE FALSE
require '../../_main.php';

/**
 * FUNCUIONANDO CORRETAMENTE
 */

if (isset($_POST['try_login'])) {
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    // Query para encontrar o username pelo email na tabela Users
    $user = (new Model('Usuarios'))->find('username', $uname);
    if ($user) {
        // user Exists
        if (password_verify($upass, $user->password)) {
            // Password is OK
            unset($user->password); // nao armazenar a password
            $_SESSION['login_user'] = $user;
            $_SESSION['login_role'] = $user->role ?? '';
            redirect(ROOT);
        
        } else {
            $_SESSION['message'] = 'Pasavra-passe Incorecto';
        }
    } else {
        $_SESSION['message'] = 'Utilizador não Encontrado';
    }
    // Login Falhou
    $_SESSION['old_uname'] = $uname;
    $_SESSION['old_upass'] = $upass;
    //post_redirect_get();    // isto previne a pagina de pedir a re-submissão dos dados POST
}

if(is_login){
    redirect(ROOT);
}

?>

<div class="d-flex justify-content-center ">
    <div class="col-4 p-3">
        </br></br>
        <div class="card p-4 shadow">
            <h4>Login</h4>
            <div class="card-body">

                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?= flashMessage('message'); ?></strong>
                    </div>
                <?php endif ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="utilizador" class="form-label">Utilizador</label>
                        <input type="text" value="<?= flashMessage('old_uname') ?>" class="form-control" name="username"
                            id="utilizador" placeholder="Digite o seu utilizador" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" value="<?= flashMessage('old_upass') ?>" class="form-control"
                            name="password" id="password" placeholder="Digite o seu Password" required />
                    </div>
                    <button type="submit" name="try_login" class="btn btn-primary">
                        Entrar
                    </button>

                </form>

            </div>
        </div>


    </div>

</div>