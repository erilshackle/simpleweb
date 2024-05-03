<?php
$login = false;
require '../../_main.php';
?>

<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-4">
        </br></br>
        <div class="card p-3">
            <h4>Crie uma Nova conta</h4>
            <div class="card-body">
                <?php if (isset($_SESSION['menssagem'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?= flashMessage('menssagem'); ?></strong>
                    </div>
                <?php endif ?>

                <form action="" method="post">
                    <div class="mb-1">
                        <label for="utilizador" class="form-label">Nome</label>
                        <span class="d-flex">
                            <input type="text" class="form-control" name="fname" id="utilizador" placeholder="Nome"
                                required />
                            <input type="text" class="form-control" name="lname" id="utilizador"
                                placeholder="Apelido" />
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="utilizador" class="form-label">Utilizador</label>
                        <input type="text" class="form-control" name="username" id="utilizador"
                            placeholder="Digite o seu sername" required />
                    </div>
                    <div class="mb-3">
                        <label for="utilizador" class="form-label">Email</label> 
                        <input type="email" class="form-control" name="username" id="utilizador"
                            placeholder="Digite o seu email" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Digite o seu Password" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Confirme o seu Password" required />
                    </div>
                    <button type="submit" name="make_signup" class="btn btn-primary">
                        Criar Conta
                    </button>
                </form>

            </div>
        </div>


    </div>

</div>

<?php
unset($_SESSION['menssagem']);
require 'app/page_end.php'; ?>