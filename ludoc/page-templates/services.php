<?php
/**
 * Template Name: Página de Serviços
 * 
 * Template para exibir os serviços oferecidos
 */

get_header();
?>

<div class="services-page">
    <div class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <p class="hero-description"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="services-grid">
            <div class="card service-card">
                <i class="fas fa-laptop-code"></i>
                <h3><?php esc_html_e('Websites Personalizados', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Desenvolvimento de websites únicos e personalizados que refletem a identidade da sua marca.', 'ludoc'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Design Responsivo', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Otimizado para SEO', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Integração com Redes Sociais', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Painel Administrativo Intuitivo', 'ludoc'); ?></li>
                </ul>
            </div>

            <div class="card service-card">
                <i class="fas fa-store"></i>
                <h3><?php esc_html_e('E-commerce', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Lojas virtuais completas com recursos avançados para impulsionar suas vendas online.', 'ludoc'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Integração com Gateways de Pagamento', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Gestão de Estoque', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Cupons de Desconto', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Relatórios de Vendas', 'ludoc'); ?></li>
                </ul>
            </div>

            <div class="card service-card">
                <i class="fas fa-mobile-alt"></i>
                <h3><?php esc_html_e('Aplicativos Web', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Desenvolvimento de aplicações web progressivas para otimizar processos empresariais.', 'ludoc'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Interface Intuitiva', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Sincronização em Tempo Real', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Funcionamento Offline', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Integração com APIs', 'ludoc'); ?></li>
                </ul>
            </div>

            <div class="card service-card">
                <i class="fas fa-search"></i>
                <h3><?php esc_html_e('Marketing Digital', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Estratégias completas de marketing digital para aumentar sua visibilidade online.', 'ludoc'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('SEO Avançado', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Marketing de Conteúdo', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Gestão de Mídias Sociais', 'ludoc'); ?></li>
                    <li><?php esc_html_e('Email Marketing', 'ludoc'); ?></li>
                </ul>
            </div>
        </div>

        <div class="work-process">
            <h2 class="section-title"><?php esc_html_e('Nosso Processo de Trabalho', 'ludoc'); ?></h2>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3><?php esc_html_e('Descoberta', 'ludoc'); ?></h3>
                    <p><?php esc_html_e('Entendemos suas necessidades e objetivos através de reuniões detalhadas.', 'ludoc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3><?php esc_html_e('Planejamento', 'ludoc'); ?></h3>
                    <p><?php esc_html_e('Desenvolvemos uma estratégia personalizada para seu projeto.', 'ludoc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3><?php esc_html_e('Design', 'ludoc'); ?></h3>
                    <p><?php esc_html_e('Criamos layouts modernos e intuitivos que refletem sua marca.', 'ludoc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3><?php esc_html_e('Desenvolvimento', 'ludoc'); ?></h3>
                    <p><?php esc_html_e('Implementamos seu projeto com as melhores tecnologias do mercado.', 'ludoc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">5</div>
                    <h3><?php esc_html_e('Testes', 'ludoc'); ?></h3>
                    <p><?php esc_html_e('Realizamos testes rigorosos para garantir qualidade e desempenho.', 'ludoc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">6</div>
                    <h3><?php esc_html_e('Lançamento', 'ludoc'); ?></h3>
                    <p><?php esc_html_e('Colocamos seu projeto no ar e oferecemos suporte contínuo.', 'ludoc'); ?></p>
                </div>
            </div>
        </div>

        <div class="cta-section">
            <div class="card cta-card">
                <h2><?php esc_html_e('Pronto para Transformar sua Presença Digital?', 'ludoc'); ?></h2>
                <p><?php esc_html_e('Entre em contato conosco para uma consultoria gratuita sobre seu projeto.', 'ludoc'); ?></p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contato'))); ?>" class="button button-primary">
                    <?php esc_html_e('Solicitar Orçamento', 'ludoc'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>