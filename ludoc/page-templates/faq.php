<?php
/**
 * Template Name: FAQ
 * 
 * Template para a página de perguntas frequentes
 */

get_header();
?>

<div class="faq-page">
    <div class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <p class="hero-description"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="faq-content">
            <div class="faq-categories">
                <div class="card faq-category">
                    <h2><?php esc_html_e('Serviços Web', 'ludoc'); ?></h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <h3><?php esc_html_e('Quanto tempo leva para desenvolver um website?', 'ludoc'); ?></h3>
                            <div class="faq-answer">
                                <p><?php esc_html_e('O prazo de desenvolvimento varia de acordo com a complexidade do projeto. Em média, um site institucional leva de 30 a 45 dias, enquanto um e-commerce pode levar de 60 a 90 dias.', 'ludoc'); ?></p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3><?php esc_html_e('Quais tecnologias vocês utilizam?', 'ludoc'); ?></h3>
                            <div class="faq-answer">
                                <p><?php esc_html_e('Trabalhamos com WordPress, PHP, MySQL, HTML5, CSS3, JavaScript e outras tecnologias modernas. Nosso foco é usar as melhores ferramentas para cada projeto específico.', 'ludoc'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card faq-category">
                    <h2><?php esc_html_e('Suporte e Manutenção', 'ludoc'); ?></h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <h3><?php esc_html_e('Como funciona o suporte técnico?', 'ludoc'); ?></h3>
                            <div class="faq-answer">
                                <p><?php esc_html_e('Oferecemos suporte técnico por email, telefone e ticket, com tempo de resposta máximo de 24 horas úteis. Para casos urgentes, temos suporte prioritário.', 'ludoc'); ?></p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3><?php esc_html_e('O site terá backup?', 'ludoc'); ?></h3>
                            <div class="faq-answer">
                                <p><?php esc_html_e('Sim, realizamos backups diários automáticos e mantemos cópias de segurança em diferentes servidores para garantir a segurança dos seus dados.', 'ludoc'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card faq-category">
                    <h2><?php esc_html_e('Pagamentos e Contratos', 'ludoc'); ?></h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <h3><?php esc_html_e('Quais são as formas de pagamento?', 'ludoc'); ?></h3>
                            <div class="faq-answer">
                                <p><?php esc_html_e('Aceitamos pagamentos por transferência bancária, PIX, cartão de crédito e boleto. Os projetos podem ser parcelados em até 12 vezes.', 'ludoc'); ?></p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3><?php esc_html_e('Como é o processo de contratação?', 'ludoc'); ?></h3>
                            <div class="faq-answer">
                                <p><?php esc_html_e('Após a aprovação do orçamento, enviamos o contrato de prestação de serviços. Com o contrato assinado e o pagamento da primeira parcela, iniciamos o desenvolvimento.', 'ludoc'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="still-questions">
                <div class="card cta-card">
                    <h2><?php esc_html_e('Ainda tem dúvidas?', 'ludoc'); ?></h2>
                    <p><?php esc_html_e('Entre em contato conosco que teremos prazer em ajudar.', 'ludoc'); ?></p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contato'))); ?>" class="button button-primary">
                        <?php esc_html_e('Fale Conosco', 'ludoc'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>