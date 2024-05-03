# PHP BASIC PROJECT TEMPLATE

#### Configurações Iniciais

1. ##### estrutura basica para funcionamento
   ``` php
    <?php require '/caminho-até/_main.php'; ?>
    <?php INCLUDE_HEADER() ?>    <!-- para incluir o  app/template/header.php -->
    <main class="container">
    <!-- 
    your cotents go here 
    -->
    </main>
    <?php INCLUDE_FOOTER() ?>  <!-- para incluir o  app/template/footer.php, fechando a página </body> </html> -->
    ```

    - Incluir o Header e O footer é opcional
      - caso não incluir o footer, você deve fechar a página `` </body></html>``.
    - Escreva sua pagina dentro das tags ``<main>...</main>``

2. ##### Page Access Control
    - Antes de ``REQUIRE _MAIN``, você pode inicializar uma varivel ``$login`` para controlar o acesso a página:
      
    ```php
    // todos tem acesso a página
        $login = false;
        $login = [] ;
        $login = [''] ;
    // É preciso estar logado para acessar a página
        $login = true;
    // É preciso estar logado como 'xyz' para acessar a página
        $login = ['xyz'];
    // O utilizador precisa ser 'admin' ou 'mod' para acessar a página
        $login = ['admin', 'mod'];

    ```
    * Essas ``'xyz'`` devem ser configurados por si na sua base de dados e adicionado ao ``$_SESSION['login_roles']``
    * O login é verificado caso existir uma variavel ``login_user`` no ``$_SESSION`` então ao condificar seu login não esqueça de atribuir o seu usuario ao ``$_SESSION['login_user']``
    * ```` php
        $_SESSION['login_user'] = {...}
        $_SESSION['login_roles'] = {...}
        
