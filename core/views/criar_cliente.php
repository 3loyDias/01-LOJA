<div class="container">
  <div class="row my-5">
    <div class="col-12">
      <div class="login-page">
        <div class="form">

        <!--    ===================  Criar Conta ===================  -->
          <form class="create-account-form" action="?a=criar_cliente" method="post">
            <h2 style="margin-top: -20px;"><strong>Criar Conta</strong></h2>
            <input type="text" name="text_email" placeholder="Email" />
            <input type="password" name="text_senha_1" placeholder="Senha" />
            <input type="password" name="text_senha_2" placeholder="Repetir a senha" />
            <input type="text" name="text_nome_completo" placeholder="Nome Completo" />
            <input type="text" name="text_morada" placeholder="Morada" />
            <input type="text" name="text_cidade" placeholder="Cidade" />
            <input type="text" name="text_telefone" placeholder="Telefone" />
            <button>Criar conta</button>
            <p class="message">Ja tens conta? <a href="?a=login">Login</a></p>
          </form>
       <!--    ===================  fim Criar Conta ===================  -->


        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_SESSION['erro'])) : ?>
  <div class="alert alert-danger" text-center p-2:>
    <?php $_SESSION['erro']; ?>
    <?php $_SESSION['erro']=''; ?>
<?php endif; ?>