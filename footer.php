<footer>
    <p>&copy; site criado como projeto para a disciplina de dev web na Unipê.</p>
    <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') { ?>
        <a href="<?= $base_path; ?>admin/" id="botaoAdmin">Painel Administrativo</a>
    <?php } ?>
</footer>
</body>

</html>