<?php
use core\classes\Store;
?>

<div>
    <?php if (store::clienteLogado()) : ?>
        <p>SIM </p>
    <?php else : ?>
        <p>NAO </p>
    <?php endif; ?>
</div>