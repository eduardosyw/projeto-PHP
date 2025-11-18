<?php 
include_once 'config/sessao.php';
$base_path = ''; 
include_once 'header.php'; 
?>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 id="hero-title">Bem-vindo ao Pet Shop</h1>
                    <p id="hero-text">Mantenha seu pet feliz e saudável!</p>
                    <button class="button">Cadastre-se</button>
                    
                    <div style="margin-top: 20px; padding: 15px; background-color: #fff3cd; border-radius: 5px; border: 1px solid #ffc107;">
                        <p style="margin: 0 0 10px 0;">
                            <strong>Status:</strong> <?php echo isset($_SESSION['usuario_id']) ? 'Logado como ' . $_SESSION['usuario_nome'] : 'Não logado'; ?>
                        </p>
                        <form method="GET">
                            <label for="usuario_select"><strong>Simular Login (DEMO):</strong></label>
                            <select name="usuario_id" id="usuario_select" onchange="this.form.submit()" style="padding: 8px; margin: 10px 0; border-radius: 4px; border: 1px solid #ddd; width: 100%; max-width: 300px;">
                                <option value="0" <?php echo !isset($_SESSION['usuario_id']) ? 'selected' : ''; ?>>-- Não logado --</option>
                                <option value="1" <?php echo (isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] == 1) ? 'selected' : ''; ?>>João Silva</option>
                                <option value="2" <?php echo (isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] == 2) ? 'selected' : ''; ?>>Maria Santos</option>
                            </select>
                        </form>
                        <p style="margin: 10px 0 0 0; font-size: 0.85rem; color: #856404;">
                            * Selecione um usuário para simular login
                        </p>
                    </div>
                </div>
                <div class="hero-image">
                    <img 
                        src="https://via.placeholder.com/400x300" 
                        alt="Imagem de destaque"
                    />
                </div>
            </div>
        </section>

        <section class="info">
            <div class="container">
                <h2 id="info-title">Fotos</h2>
                <ul class="info__cards">
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 1"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 2"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 3"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 4"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
        </section>
    </main>

<?php include_once 'footer.php'; ?>