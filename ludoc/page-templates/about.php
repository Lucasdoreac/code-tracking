<?php
/**
 * Template Name: Sobre Nós
 * 
 * Template para a página sobre a empresa
 */

get_header();
?>

<div class="about-page">
    <div class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <p class="hero-description"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="about-content">
            <div class="mission-values">
                <div class="card mission-card">
                    <h2><?php esc_html_e('Nossa Missão', 'ludoc'); ?></h2>
                    <p><?php esc_html_e('Transformar ideias em soluções digitais inovadoras que impulsionam o sucesso dos nossos clientes, através de tecnologia de ponta e criatividade.', 'ludoc'); ?></p>
                </div>

                <div class="values-grid">
                    <div class="card value-card">
                        <i class="fas fa-star"></i>
                        <h3><?php esc_html_e('Excelência', 'ludoc'); ?></h3>
                        <p><?php esc_html_e('Buscamos a excelência em cada detalhe dos nossos projetos.', 'ludoc'); ?></p>
                    </div>
                    <div class="card value-card">
                        <i class="fas fa-handshake"></i>
                        <h3><?php esc_html_e('Parceria', 'ludoc'); ?></h3>
                        <p><?php esc_html_e('Construímos relacionamentos duradouros com nossos clientes.', 'ludoc'); ?></p>
                    </div>
                    <div class="card value-card">
                        <i class="fas fa-lightbulb"></i>
                        <h3><?php esc_html_e('Inovação', 'ludoc'); ?></h3>
                        <p><?php esc_html_e('Estamos sempre atualizados com as últimas tendências tecnológicas.', 'ludoc'); ?></p>
                    </div>
                    <div class="card value-card">
                        <i class="fas fa-users"></i>
                        <h3><?php esc_html_e('Colaboração', 'ludoc'); ?></h3>
                        <p><?php esc_html_e('Trabalhamos em equipe para alcançar os melhores resultados.', 'ludoc'); ?></p>
                    </div>
                </div>
            </div>

            <div class="team-section">
                <h2 class="section-title"><?php esc_html_e('Nossa Equipe', 'ludoc'); ?></h2>
                <div class="team-grid">
                    <?php
                    $team_members = array(
                        array(
                            'name' => 'João Silva',
                            'position' => __('Diretor de Tecnologia', 'ludoc'),
                            'bio' => __('Especialista em desenvolvimento web com mais de 10 anos de experiência.', 'ludoc'),
                            'image' => get_template_directory_uri() . '/assets/images/team/member1.jpg'
                        ),
                        array(
                            'name' => 'Maria Santos',
                            'position' => __('Designer UX/UI', 'ludoc'),
                            'bio' => __('Apaixonada por criar interfaces intuitivas e experiências memoráveis.', 'ludoc'),
                            'image' => get_template_directory_uri() . '/assets/images/team/member2.jpg'
                        ),
                        array(
                            'name' => 'Pedro Oliveira',
                            'position' => __('Desenvolvedor Full Stack', 'ludoc'),
                            'bio' => __('Especialista em criar soluções web robustas e escaláveis.', 'ludoc'),
                            'image' => get_template_directory_uri() . '/assets/images/team/member3.jpg'
                        ),
                        array(
                            'name' => 'Ana Costa',
                            'position' => __('Gerente de Projetos', 'ludoc'),
                            'bio' => __('Certificada em metodologias ágeis e gestão de projetos digitais.', 'ludoc'),
                            'image' => get_template_directory_uri() . '/assets/images/team/member4.jpg'
                        )
                    );

                    foreach ($team_members as $member) :
                    ?>
                        <div class="card team-member">
                            <img src="<?php echo esc_url($member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>" class="member-image">
                            <h3 class="member-name"><?php echo esc_html($member['name']); ?></h3>
                            <p class="member-position"><?php echo esc_html($member['position']); ?></p>
                            <p class="member-bio"><?php echo esc_html($member['bio']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="cta-section">
                <div class="card cta-card">
                    <h2><?php esc_html_e('Vamos Trabalhar Juntos?', 'ludoc'); ?></h2>
                    <p><?php esc_html_e('Estamos prontos para ajudar a transformar sua visão em realidade.', 'ludoc'); ?></p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contato'))); ?>" class="button button-primary">
                        <?php esc_html_e('Entre em Contato', 'ludoc'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>