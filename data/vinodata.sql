-- Contenu de la table `vino_adresse`
--
INSERT INTO
    `vino_adresse` (rue, ville, pays, cp)
VALUES
    ("513 rue Regina", "Verdun", "Canada", "H4G 2H2");

--
-- Contenu de la table `vino_utilisateur`
--
INSERT INTO
    `vino_utilisateur` (
        name,
        prenom,
        email,
        mdp,
        telephone,
        type,
        adresse_id
    )
VALUES
    (
        " Pignot ",
        " Sacha ",
        " sacha.pignot @gmail.com ",
        " sacha ",
        " 4383905128 ",
        " admin ",
        1
    );

--
--
-- Contenu de la table `vino_bouteille`
--
INSERT INTO
    `vino_bouteille` (
        nom,
        image,
        code_saq,
        pays,
        description,
        prix_saq,
        url_saq,
        url_img,
        format,
        vino_type_id
    )
VALUES
    (
        'Borsao Seleccion',
        '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$',
        '10324623',
        'Espagne',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 10324623',
        11,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/borsao-seleccion/10324623',
        '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Monasterio de Las Vinas Gran Reserva',
        '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$',
        '10359156',
        'Espagne',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 10359156',
        19,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/monasterio-de-las-vinas-gran-reserva/10359156',
        '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Castano Hecula',
        '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$',
        '11676671',
        'Espagne',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11676671',
        12,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/castano-hecula/11676671',
        '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Campo Viejo Tempranillo Rioja',
        '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$',
        '11462446',
        'Espagne',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11462446',
        14,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/campo-viejo-tempranillo-rioja/11462446',
        '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Bodegas Atalaya Laya 2017',
        '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$',
        '12375942',
        'Espagne',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12375942',
        17,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/bodegas-atalaya-laya-2017/12375942',
        '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Vin Vault Pinot Grigio',
        '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$',
        '13467048',
        'États-Unis',
        'Vin blanc\r\n         \r\n      \r\n      \r\n      États-Unis, 3 L\r\n      \r\n      \r\n      Code SAQ : 13467048',
        55,
        'https://www.saq.com/page/fr/saqcom/vin-blanc/vin-vault-pinot-grigio/13467048',
        '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$',
        ' 3 L',
        2
    ),
    (
        'Huber Riesling Engelsberg 2017',
        '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$',
        '13675841',
        'Autriche',
        'Vin blanc\r\n         \r\n      \r\n      \r\n      Autriche, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13675841',
        22,
        'https://www.saq.com/page/fr/saqcom/vin-blanc/huber-riesling-engelsberg-2017/13675841',
        '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$',
        ' 750 ml',
        2
    ),
    (
        'Dominio de Tares Estay Castilla y Léon 2015',
        '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$',
        '13802571',
        'Espagne',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13802571',
        18,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/dominio-de-tares-estay-castilla-y-leon-2015/13802571',
        '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Tessellae Old Vines Côtes du Roussillon 2016',
        '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$',
        '12216562',
        'France',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      France, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12216562',
        21,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/tessellae-old-vines-cotes-du-roussillon-2016/12216562',
        '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    ),
    (
        'Tenuta Il Falchetto Bricco Paradiso -... 2015',
        '//s7d9.scene7.com/is/image/SAQ/13637422_is?$saq-rech-prod-gril$',
        '13637422',
        'Italie',
        'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13637422',
        34,
        'https://www.saq.com/page/fr/saqcom/vin-rouge/tenuta-il-falchetto-bricco-paradiso---barbera-dasti-superiore-docg-2015/13637422',
        '//s7d9.scene7.com/is/image/SAQ/13637422_is?$saq-rech-prod-gril$',
        ' 750 ml',
        1
    );

--
-- Contenu de la table `vino_cellier`
--
INSERT INTO
    vino_cellier (nom, vino_utilisateur_id)
VALUES
    ("Cellier A", 1),
    ("Cellier B", 1);

--
-- Contenu de la table `vino_type`
--
INSERT INTO
    `vino_type`
VALUES
    (1, 'Vin rouge'),
    (2, 'Vin blanc');

INSERT INTO
    `vino_cellier_has_vino_bouteille` (
        vino_cellier_id,
        vino_bouteille_id,
        quantite,
        date_achat,
        garde_jusqua,
        notes,
        prix,
        millesime
    )
VALUES
    (
        1,
        2,
        2,
        "2018-12-24 23:55:32",
        "2022-12-24 23:55:32",
        "Pas pire bon",
        19.99,
        "1992"
    )