<?php

/*
 * The six service pages (Figma frames 486:950, 486:1132, 486:1223, 486:1314, 486:1405, 486:1496),
 * keyed by URL slug: /service/{slug}.
 *
 * Texts and images are the defaults seeded into the "service_pages" table (edited from /admin/services);
 * the pixel layout below stays in this file.
 *
 * Vertical offsets are Figma pixels on the 1886px frame (see service-detail.blade.php):
 *   label     top of "Nos services" below the hero (frame y - 909)
 *   title     gap between "Nos services" and the title line box
 *   title_x   extra left offset of the title
 *   paras     [gap above the paragraph, text]
 *   glow      blue glow overlay on the main image
 *   tab       label of the category pill under the hero (same order as this file)
 *   img       image prefix: public/assets/img/figma_svc_{img}_main.jpg and _g1/_g2/_g3.jpg (gallery, left to right)
 */

return [
    'web-mobile' => [
        'name' => 'Plateforme web & mobile', 'tab' => 'Web & Mobile',
        'title' => 'PLATEFORME WEB & MOBILE',
        'label' => 155, 'title_gap' => 52.6, 'title_x' => 9,
        'paras' => [
            [52, "NEXORA conçoit et développe des plateformes web et mobiles sur mesure, alliant performance, design soigné et expérience utilisateur optimale. Nos équipes pluridisciplinaires couvrent l'intégralité du cycle produit : conception UX/UI, développement et déploiement en production."],
            [48.5, "Nous maîtrisons les technologies front-end, back-end et les frameworks mobiles natifs et cross-platform pour iOS et Android, garantissant des solutions digitales robustes et évolutives."],
        ],
        'glow' => true,
        'img' => 'web',
        // Services page: carousel card (null = no card) and overview block
        'card' => 'Plateforme web & mobile',
        'overview' => ['title' => 'PLATEFORME WEB &MOBILE', 'image' => 'figma_service_web.jpg', 'text' => "NEXORA conçoit et développe des plateformes web et applications mobiles sur mesure, couvrant l'intégralité du cycle produit. De la conception UX/UI au déploiement en production, nous assurons le développement front-end et back-end, ainsi que les intégrations API et l'architecture cloud. Nos solutions sont conçues pour la performance, la sécurité et la scalabilité sur les marchés africains et internationaux."],
    ],
    'erp' => [
        'name' => 'ERP & Systèmes d’information', 'tab' => 'ERP',
        'title' => 'ERP & SYSTEMES D’INFORMATION',
        'label' => 165, 'title_gap' => 52.6, 'title_x' => 9,
        'paras' => [
            [42, "NEXORA DIGITAL SARL est spécialisée dans la conception et le déploiement de solutions ERP sur mesure pour les entreprises africaines. Nous accompagnons nos clients dans la digitalisation complète de leurs processus métier, en intégrant les systèmes d'information les plus performants du marché."],
            [48.5, "Notre équipe d'experts certifiés garantit une mise en œuvre efficace, de l'analyse des besoins jusqu'à la formation des utilisateurs finaux et au support post-déploiement continu."],
        ],
        'glow' => false,
        'img' => 'erp',
        // Services page: carousel card (null = no card) and overview block
        'card' => 'ERP 1 Système d’information',
        'overview' => ['title' => 'ERP SYSTEMES D’INFORMATION', 'image' => 'figma_service_web.jpg', 'text' => "NEXORA déploie et paramètre des systèmes ERP adaptés à vos processus métiers, en s'appuyant sur les meilleures solutions du marché. Nous accompagnons la migration de vos outils vers des environnements intégrés qui centralisent vos données, automatisent vos flux et optimisent votre pilotage opérationnel. Nos consultants assurent une adoption fluide et un transfert de compétences durable vers vos équipes. Nous couvrons les modules clés : finance, RH, logistique, CRM et gestion de projets."],
    ],
    'automatisation-ia' => [
        'name' => 'Automatisation & IA', 'tab' => 'Automatisation & IA',
        // The Figma frame has no title here; same title style and position as the other pages
        'title' => 'AUTOMATISATION & IA',
        'label' => 165, 'title_gap' => 52.6, 'title_x' => 0,
        'paras' => [
            [42, "Nos équipes maîtrisent des technologies de pointe telles que le développement d'applications web et mobiles, l'intelligence artificielle et l'automatisation des processus, qui garantissent des solutions robustes et évolutives adaptées aux réalités africaines. Nous sommes également spécialisés dans la mise en œuvre rapide de projets digitaux, avec des approches agiles pour une transformation efficace et rentable de votre organisation."],
        ],
        'glow' => true,
        'img' => 'ia',
        // Services page: carousel card (null = no card) and overview block
        'card' => 'Automatisation & IA',
        'overview' => ['title' => 'AUTOMATISATION & IA', 'image' => 'figma_service_ia.jpg', 'text' => "Nos équipes maîtrisent des technologies d'automatisation avancées telles que la RPA, les workflows intelligents et les connecteurs API, qui éliminent les tâches répétitives et accélèrent vos opérations. Nous déployons également des modules d'intelligence artificielle pour l'analyse prédictive, la reconnaissance documentaire et la prise de décision assistée en temps réel. Chaque solution est dimensionnée aux réalités de votre secteur d'activité."],
    ],
    'audit' => [
        'name' => 'Audit SI & AMOA', 'tab' => 'Audit',
        'title' => 'AUDIT SI & AMOA',
        'label' => 165, 'title_gap' => 52.6, 'title_x' => 2,
        'paras' => [
            [130, "NEXORA mobilise des consultants certifiés, rigoureux et expérimentés pour les missions d'audit de systèmes d'information et d'assistance à maîtrise d'ouvrage, particulièrement adaptées aux projets de transformation numérique et aux programmes stratégiques des organisations."],
        ],
        'glow' => false,
        'img' => 'audit',
        // Services page: carousel card (null = no card) and overview block
        'card' => 'Audit SI & AMOA',
        'overview' => ['title' => 'AUDI SI & AMOA', 'image' => 'figma_service_audit.jpg', 'text' => "NEXORA réalise des audits approfondis de vos systèmes d'information, identifiant les axes d'amélioration, les risques et les opportunités d'optimisation. En tant qu'assistant à maîtrise d'ouvrage (AMOA), nous pilotons vos projets de transformation de bout en bout, du cadrage à la réception."],
    ],
    'conseil' => [
        'name' => 'Conseil & transformation', 'tab' => 'Infrastructure',
        'title' => 'CONSEIL & TRANSFORMATION',
        'label' => 165, 'title_gap' => 39.6, 'title_x' => 0,
        'paras' => [
            [56, "Nous accompagnons les organisations dans leurs projets de transformation stratégique, en mobilisant des consultants expérimentés pour piloter le changement et créer de la valeur. Nous déployons des équipes pluridisciplinaires, allant des experts en stratégie."],
            [46.5, "aux spécialistes en conduite du changement, pour concevoir et mettre en œuvre des transformations durables adaptées aux enjeux de votre organisation."],
        ],
        'glow' => false,
        'img' => 'conseil',
        // Services page: carousel card (null = no card) and overview block
        'card' => 'Conseil et transformation',
        'overview' => ['title' => 'CONSEIL & TRANSFORMATION', 'image' => 'figma_service_conseil.jpg', 'text' => 'Nous accompagnons les dirigeants dans la définition de leur feuille de route digitale. Stratégie, gouvernance des données et conduite du changement : notre pôle conseil mobilise des experts reconnus pour accélérer la transformation de votre organisation et maximiser votre retour sur investissement technologique.'],
    ],
    'btp' => [
        'name' => 'BTP & fournitures matériel IT', 'tab' => 'BTP',
        'title' => 'BTP & FORNITURES MATERIEL IT',
        'label' => 165, 'title_gap' => 49.6, 'title_x' => 0,
        'paras' => [
            [45, "Une fois la structure principale établie, des équipements complémentaires sont déployés pour garantir une performance durable et une infrastructure intérieure optimisée. Pour les projets BTP, nous coordonnons l'ensemble des ressources spécialisées, du gros œuvre jusqu'aux finitions techniques. Pour la fourniture de matériel I."],
            [23.3, "nous proposons des solutions complètes, telles que l'installation de réseaux structurés (câblage cuivre et fibre optique) ou la mise en place de baies de brassage (configurations sur mesure), afin de créer des infrastructures robustes."],
        ],
        'glow' => false,
        'img' => 'btp',
        // Services page: carousel card (null = no card) and overview block
        'card' => null,
        'overview' => ['title' => "BTP & FORNITURES\nMATERIEL IT", 'image' => 'figma_service_btp.jpg', 'text' => "NEXORA propose une offre intégrée de fournitures de matériels informatiques, de solutions d'infrastructure réseau et de travaux de câblage BTP. Nous assurons l'approvisionnement en équipements certifiés — serveurs, postes de travail, switches et solutions de stockage — ainsi que leur installation et maintenance. Nos équipes déploient des infrastructures conformes aux standards internationaux, en garantissant la performance, la sécurité et la durabilité de vos installations numériques sur le long terme."],
    ],
];
