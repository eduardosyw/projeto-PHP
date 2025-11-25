<div class="demo-login-box">
    <p class="demo-status">
        <strong>Status:</strong> 
        <?php echo is_logged_in() ? 'Logado como ' . sanitize_output(get_current_user_name()) : 'Não logado'; ?>
    </p>
    <form method="GET" class="demo-form">
        <label for="usuario_select"><strong>Simular Login (DEMO):</strong></label>
        <select name="usuario_id" id="usuario_select" onchange="this.form.submit()" style="padding: 8px; margin: 10px 0; border-radius: 4px; border: 1px solid #ddd;">
            <option value="0" <?php echo !is_logged_in() ? 'selected' : ''; ?>>-- Não logado --</option>
            <option value="1" <?php echo (is_logged_in() && $_SESSION['usuario_id'] == 1) ? 'selected' : ''; ?>>João Silva</option>
            <option value="2" <?php echo (is_logged_in() && $_SESSION['usuario_id'] == 2) ? 'selected' : ''; ?>>Maria Santos</option>
        </select>
    </form>
    <p class="demo-info">* Selecione um usuário para simular login</p>
</div>
