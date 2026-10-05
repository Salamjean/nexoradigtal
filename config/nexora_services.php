<?php

/*
 * The six service pages (Figma frames 486:950, 486:1132, 486:1223, 486:1314, 486:1405, 486:1496),
 * keyed by URL slug: /service/{slug}.
 *
 * Vertical offsets are Figma pixels on the 1886px frame (see service-detail.blade.php):
 *   label     top of "Nos services" below the hero (frame y - 909)
 *   title     gap between "Nos services" and the title line box
 *   title_x   extra left offset of the title
 *   paras     [gap above the paragraph, text]
 *   glow      blue glow overlay on the main image
 *   img       image prefix: public/assets/img/figma_svc_{img}_main.jpg and _g1/_g2/_g3.jpg (gallery, left to right)
 */

return [
    'web-mobile' => [
        'name' => 'Plateforme web & mobile',
        'title' => 'PLATEFORME WEB & MOBILE',
        'label' => 155, 'title_gap' => 52.6, 'title_x' => 9,
        'paras' => [
            [52, "NEXORA conçoit et développe des plateformes web et mobiles sur mesure, alliant performance, design soigné et expérience utilisateur optimale. Nos équipes pluridisciplinaires couvrent l'intégralité du cycle produit : conception UX/UI, développement et déploiement en production."],
            [48.5, "Nous maîtrisons les technologies front-end, back-end et les frameworks mobiles natifs et cross-platform pour iOS et Android, garantissant des solutions digitales robustes et évolutives."],
        ],
        'glow' => true,
        'img' => 'web',
    ],
    'erp' => [
        'name' => 'ERP & Systèmes d’information',
        'title' => 'ERP & SYSTEMES D’INFORMATION',
        'label' => 165, 'title_gap' => 52.6, 'title_x' => 9,
        'paras' => [
            [42, "NEXORA DIGITAL SARL est spécialisée dans la conception et le déploiement de solutions ERP sur mesure pour les entreprises africaines. Nous accompagnons nos clients dans la digitalisation complète de leurs processus métier, en intégrant les systèmes d'information les plus performants du marché."],
            [48.5, "Notre équipe d'experts certifiés garantit une mise en œuvre efficace, de l'analyse des besoins jusqu'à la formation des utilisateurs finaux et au support post-déploiement continu."],
        ],
        'glow' => false,
        'img' => 'erp',
    ],
    'automatisation-ia' => [
        'name' => 'Automatisation & IA',
        // The Figma frame has no title here; same title style and position as the other pages
        'title' => 'AUTOMATISATION & IA',
        'label' => 165, 'title_gap' => 52.6, 'title_x' => 0,
        'paras' => [
            [42, "Nos équipes maîtrisent des technologies de pointe telles que le développement d'applications web et mobiles, l'intelligence artificielle et l'automatisation des processus, qui garantissent des solutions robustes et évolutives adaptées aux réalités africaines. Nous sommes également spécialisés dans la mise en œuvre rapide de projets digitaux, avec des approches agiles pour une transformation efficace et rentable de votre organisation."],
        ],
        'glow' => true,
        'img' => 'ia',
    ],
    'audit' => [
        'name' => 'Audit SI & AMOA',
        'title' => 'AUDIT SI & AMOA',
        'label' => 165, 'title_gap' => 52.6, 'title_x' => 2,
        'paras' => [
            [130, "NEXORA mobilise des consultants certifiés, rigoureux et expérimentés pour les missions d'audit de systèmes d'information et d'assistance à maîtrise d'ouvrage, particulièrement adaptées aux projets de transformation numérique et aux programmes stratégiques des organisations."],
        ],
        'glow' => false,
        'img' => 'audit',
    ],
    'conseil' => [
        'name' => 'Conseil & transformation',
        'title' => 'CONSEIL & TRANSFORMATION',
        'label' => 165, 'title_gap' => 39.6, 'title_x' => 0,
        'paras' => [
            [56, "Nous accompagnons les organisations dans leurs projets de transformation stratégique, en mobilisant des consultants expérimentés pour piloter le changement et créer de la valeur. Nous déployons des équipes pluridisciplinaires, allant des experts en stratégie."],
            [46.5, "aux spécialistes en conduite du changement, pour concevoir et mettre en œuvre des transformations durables adaptées aux enjeux de votre organisation."],
        ],
        'glow' => false,
        'img' => 'conseil',
    ],
    'btp' => [
        'name' => 'BTP & fournitures matériel IT',
        'title' => 'BTP & FORNITURES MATERIEL IT',
        'label' => 165, 'title_gap' => 49.6, 'title_x' => 0,
        'paras' => [
            [45, "Une fois la structure principale établie, des équipements complémentaires sont déployés pour garantir une performance durable et une infrastructure intérieure optimisée. Pour les projets BTP, nous coordonnons l'ensemble des ressources spécialisées, du gros œuvre jusqu'aux finitions techniques. Pour la fourniture de matériel I."],
            [23.3, "nous proposons des solutions complètes, telles que l'installation de réseaux structurés (câblage cuivre et fibre optique) ou la mise en place de baies de brassage (configurations sur mesure), afin de créer des infrastructures robustes."],
        ],
        'glow' => false,
        'img' => 'btp',
    ],
];
