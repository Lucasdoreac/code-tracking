-- Criação do Custom Post Type Portfolio
INSERT INTO `wp_posts` (
    `post_author`,
    `post_date`,
    `post_date_gmt`,
    `post_content`,
    `post_title`,
    `post_excerpt`,
    `post_status`,
    `comment_status`,
    `ping_status`,
    `post_password`,
    `post_name`,
    `to_ping`,
    `pinged`,
    `post_modified`,
    `post_modified_gmt`,
    `post_content_filtered`,
    `post_parent`,
    `guid`,
    `menu_order`,
    `post_type`,
    `post_mime_type`,
    `comment_count`
) VALUES
(1, NOW(), NOW(), '', 'Portfolio', '', 'publish', 'closed', 'closed', '', 'portfolio', '', '', NOW(), NOW(), '', 0, '', 0, 'page', '', 0);

-- Criação das categorias de portfolio padrão
INSERT INTO `wp_terms` (`name`, `slug`, `term_group`) VALUES
('Web Design', 'web-design', 0),
('E-commerce', 'e-commerce', 0),
('Marketing Digital', 'marketing-digital', 0),
('Aplicativos', 'aplicativos', 0);

-- Associação das categorias com a taxonomia portfolio_category
INSERT INTO `wp_term_taxonomy` (`term_id`, `taxonomy`, `description`, `parent`, `count`) 
SELECT `term_id`, 'portfolio_category', '', 0, 0 FROM `wp_terms` WHERE `slug` IN ('web-design', 'e-commerce', 'marketing-digital', 'aplicativos');