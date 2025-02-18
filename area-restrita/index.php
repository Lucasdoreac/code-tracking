<?php include_once '../header.php'; ?>

<style>
.restricted-area {
    background: linear-gradient(135deg, #1a2a3c, #2c3e50);
    min-height: 100vh;
    padding: 50px 0;
}

.custom-card {
    background: rgba(52, 73, 94, 0.95);
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.custom-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
}

.icon-container {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto 30px;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-container::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px solid #3498db;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.5;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.feature-icon {
    font-size: 2.5rem;
    color: #3498db;
    margin-bottom: 15px;
    transition: transform 0.3s ease;
}

.feature-icon:hover {
    transform: scale(1.1);
}

.progress-container {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    padding: 5px;
    margin: 30px 0;
}

.custom-progress {
    height: 25px;
    background: linear-gradient(90deg, #3498db, #2ecc71);
    border-radius: 12px;
    transition: width 1.5s ease-in-out;
    position: relative;
    overflow: hidden;
}

.progress-glow {
    position: absolute;
    top: 0;
    left: -50%;
    width: 50%;
    height: 100%;
    background: linear-gradient(
        90deg,
        rgba(255,255,255,0) 0%,
        rgba(255,255,255,0.2) 50%,
        rgba(255,255,255,0) 100%
    );
    animation: glow 2s infinite;
}

@keyframes glow {
    from { left: -50%; }
    to { left: 150%; }
}

.custom-input {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid transparent;
    border-radius: 10px;
    color: #fff;
    transition: all 0.3s ease;
    padding: 12px 20px;
}

.custom-input:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: #3498db;
    box-shadow: 0 0 15px rgba(52, 152, 219, 0.3);
}

.custom-btn {
    background: linear-gradient(135deg, #3498db, #2980b9);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.custom-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        rgba(255,255,255,0) 0%,
        rgba(255,255,255,0.2) 50%,
        rgba(255,255,255,0) 100%
    );
    transition: left 0.5s ease-in-out;
}

.custom-btn:hover::before {
    left: 100%;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 40px;
}

.feature-item {
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
}

.confirmation-message {
    background: rgba(46, 204, 113, 0.2);
    border: 2px solid #2ecc71;
    border-radius: 10px;
    padding: 20px;
    margin-top: 30px;
    display: none;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="restricted-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <div class="icon-container">
                            <i class="fas fa-rocket fa-3x text-primary"></i>
                        </div>
                        
                        <h2 class="text-center mb-4">Área Restrita em Desenvolvimento</h2>
                        <p class="lead text-center mb-4">Estamos criando uma experiência exclusiva para nossos investidores.</p>
                        
                        <div class="progress-container">
                            <div class="custom-progress" style="width: 75%">
                                <div class="progress-glow"></div>
                            </div>
                        </div>
                        
                        <div class="features-grid">
                            <div class="feature-item">
                                <i class="fas fa-chart-line feature-icon"></i>
                                <h5>Análises Avançadas</h5>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-shield-alt feature-icon"></i>
                                <h5>Segurança Total</h5>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-tachometer-alt feature-icon"></i>
                                <h5>Dashboard Personalizado</h5>
                            </div>
                        </div>
                        
                        <div class="text-center mt-5">
                            <p class="mb-4">Quer ser um dos primeiros a ter acesso? Inscreva-se:</p>
                            <form id="waiting-list-form" class="mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <input type="text" class="form-control custom-input" placeholder="Seu nome" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control custom-input" placeholder="Seu e-mail" required>
                                        </div>
                                        <button type="submit" class="btn custom-btn btn-lg w-100">
                                            <i class="fas fa-paper-plane me-2"></i>
                                            Entrar na Lista de Espera
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="text-muted">
                                <small>
                                    <i class="fas fa-lock me-1"></i>
                                    Seus dados estão protegidos e não serão compartilhados
                                </small>
                            </div>
                        </div>
                        
                        <div id="confirmation-message" class="confirmation-message">
                            <i class="fas fa-check-circle fa-2x mb-3 text-success"></i>
                            <h4 class="text-success">Inscrição Confirmada!</h4>
                            <p class="mb-0">Obrigado por se inscrever! Você será um dos primeiros a saber quando a área estiver disponível.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('waiting-list-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Animate the form disappearing
    this.style.opacity = '0';
    this.style.transform = 'translateY(-20px)';
    this.style.transition = 'all 0.5s ease';
    
    // Show confirmation message
    setTimeout(() => {
        this.style.display = 'none';
        document.getElementById('confirmation-message').style.display = 'block';
    }, 500);
});

// Animate progress bar on load
document.addEventListener('DOMContentLoaded', function() {
    const progress = document.querySelector('.custom-progress');
    progress.style.width = '0';
    setTimeout(() => {
        progress.style.width = '75%';
    }, 300);
});
</script>

<?php include_once '../footer.php'; ?>