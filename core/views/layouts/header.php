<?php
use core\classes\Store;
?>

<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
        <a href="?a=inicio" class="titulo">
            <h3><?= APP_NAME ?></h3>
        </a>
        </div>
        <div class="col-6 text-end p-3">
            <a href="?a=inicio" class="nav-item">Inicio</a>
            <a href="?a=loja" class="nav-item">Loja</a>
            <!-- Verifica se o usuário está logado -->
            <?php if (Store::clienteLogado()) : ?>
                <a href="" class="nav-item">A minha Conta</a>
                <a href="" class="nav-item">Logout</a>
            <?php else : ?>
                <a href="" class="nav-item">Login</a>
                <a href="" class="nav-item">Criar Conta</a>
            <?php endif; ?>
            <a href="?a=carrinho"><i class="fas fa-shopping-cart"></i></a>
            <span class="badge bg-warning"></span>
        </div>
    </div>
</div>
