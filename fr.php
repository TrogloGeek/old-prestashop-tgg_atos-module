<?php

global $_MODULE;
$_MODULE = array();
$_MODULE['<{tgg_atos}prestashop>tgg_atos_9c9b959391570142356dcd8e8561c35b'] = 'SIPS/ATOS';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_96f00a5ed5345899a56bdb71a08074bb'] = 'Module de paiement SIPS/ATOS par TrogloGeek.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_211c9bbd96ccf2d8d0a254fb84d96c8d'] = 'Si vous désinstallez ce module, votre configuration sera perdue et les fichiers de certificat de production nettoyés. Seuls les logs subsisteront. Si vous souhaitez simplement stopper les paiment via ATOS pour les reprendre plus tard il est conseillé de désactiver le module plutôt que de le désinstaller. Procéder à la désinstallation ?';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_c04e14e8285dfc4a47e6e8f498e03959'] = 'Des erreurs ont été relevées durant l\'installation, consultez %s pour plus de détailes. Renommez, déplacez ou supprimez ce fichier pour faire disparaître cette alerte.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_f3b6717a2d5d57cac739b7d80dc2d23a'] = 'Aucune adresse mail n\'a été configurée pour recevoir les alertes de dysfonctionnement du module. Tant qu\'aucune adresse n\'aura été définie, l\'adresse mail de contact de la boutique sera utilisée pour envoyer les rapports d\'erreur en cas d\'incident.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_468729883ba062e2d7dcbfcb476e152f'] = 'Nouvelle version %s disponible à l\'URL : %s';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_d79d2470492d348cdac222c71c7f6439'] = 'Échec de vérification de la disponibilité d\'une nouvelle version du module.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_39444e49c737848da8b9c507f37c8955'] = 'Installation standard du module (parent::install()) échouée.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_63967f842b98b5dd379970bf9bbc2b2f'] = 'La création de la table nécessaire dans la base de données a échoué.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_6a17f98419d4b2e1a7a1890bcd67c2f6'] = 'L\'enregistrement des variables de configuration du module est un échec.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_30ede1e2651c1ad1970e64857ee02caa'] = 'Impossible d\'écrire le fichier de configuration sur le disque, vérifier les autorisations sur le dossier des fichiers paramètres.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_1c5724614977594c2e9601b9e4af7f5e'] = 'Hook registration: L\'enregistrement de ce module en tant que méthode de paiement à afficher sur la dernière page de paiement est un échec. ($this->registerHook(\"payment\"))';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_68bbfc3de5c96e6d71e5c07e087f233f'] = 'Hook registration: L\'enregistrement du hook permettant l\'affichage de la confirmation de paiement est un échec. ($this->registerHook(\"paymentReturn\"))';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_4b1e2d6e3070adb0d7c76ebd71fdebbf'] = 'Hook declaration: La déclaration de mise à disposition du hook \"tggAtosBankReturn\" est un échec.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_5c803c5537a3fd3266e993bd26d9f6b1'] = 'Hook declaration: La déclaration de mise à disposition du hook \"tggAtosOrderConfirm\" est un échec.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_6a11f683dd5c85f1f0c62a99be4a263c'] = 'Le chemin vers les logs n\'existe pas ou les droits sur les fichiers le rendent invisible.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_ef77e4eac60fb94d0a0a1843a9d9dabb'] = 'La devise par défaut n\'est pas définie ou n\'existe pas.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_37d53bb841d52d658d26f6f84ac1335e'] = 'L\'ID marchand est requis pour les modes préproduction et production. Ajoutez votre certificat de production puis sélectionnez l\'ID marchand correspondant dans la liste.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_823b5212516d4664b3e5c02a2d9496cf'] = 'Le champs Délai de capture était invalide, un entier naturel inférieur à 100 est requis';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_c1e73f834a93c4b3e484a0b806ddcdac'] = 'l\'URL des logos de carte est requis';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_a1bed1b256240536cbc063027e10be9e'] = 'Le nom du logo marchand sur le serveur bancaire est requis';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_bafabcc5dec32a80baccaf366b9b37cc'] = 'Le chemin vers les binaires n\'existe pas ou les droits sur les fichiers le rendent invisible.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_4169ecf7b9671f1cea16a7c89dc48255'] = 'Exécutables introuvables';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_dd77583a58995bb214f226ccf1ec40fe'] = 'Le chemin vers les fichiers paramètres n\'existe pas ou les droits sur les fichiers le rendent invisible.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_6a4719c47bd37f74355adc910191fec8'] = 'Le chemin vers les fichiers de configuration est trop long, 54 caractères maximum, cf documentation du module.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_e171951d6a69ed4860dff695ba42adbb'] = 'L\'ID maximum de transaction saisi était invalide, doit être un entier compris entre 1 et 999999.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_08b018ddf087cd3135203d256e6f91da'] = 'l\'ID de panier retourné dans le champs id_order n\'existe pas';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_869ed2b260b1e37940433b15c218d751'] = 'Le panier dont l\'ID a été retourné dans le champs id_order n\'appartient pas au client dont l\'ID a été retourné dans le champs id_customer';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_14bb0ce31c2f5febaea7a98e4fbf9382'] = 'l\'ID client retourné dans le champs id_customer n\'existe pas';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_57009700995f00eed51d35d6e4ec27e8'] = 'Le code devise indiqué dans le champs currency_code est inconnu';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_e4799ce947bb6dfcd171ad353d43074a'] = 'Le code ISO de la devise';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_189c4eb8a1a4931288907a3f7e554a49'] = 'n\'existe pas dans Prestashop, impossible de traiter ce retour.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_c25c823f32e454148087c6aa8d1aab6a'] = 'CB en %u fois';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_73a61696f100b3858511e212a3feea6b'] = 'Carte bancaire';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_eea1e68dd03c929d46332ab05fab18e8'] = 'Impossible d\'écrire le fichier certificat, vérifiez les permissions sur le dossier de configuration';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_ece5511fc1a1ce00fcbcb5dc5690c59a'] = 'Impossible d\'écrire le fichier de configuration, vérifiez les permissions sur le dossier de configuration';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_81e6564d7d7d61382cb1fa4a3c7f4e87'] = 'Configuration basique mise à jour';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_b9b874d9b9ae712fea1dfc29ffa0debf'] = 'Configuration graphique mise à jour';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_d86e7f0c2fc7211eff1a74e65bb5f7a1'] = 'Configuration avancée mise à jour';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_1e8ed12a3753739bdaa6f290e018332d'] = 'Configuration du paiement en 2 à 3 fois mise à jour';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_b77c59479c211f58fc5cd24951d337d1'] = 'Configuration par défaut chargée';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_3b422ec751997d282d418baf3f1436e1'] = 'Fichier certificat renommé';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_27b640fb585838b462a07c711b50b88d'] = 'Dossier de thème créé.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_7e38473aba6c514c36ef864d21415718'] = 'Le paiement par carte est indisponible jusqu\'à demain en raison d\'un trop grand nombre d\'utilisation du service ajourd\'hui, nous nous excusons pour la gêne occasionnée.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_ed4bd062ba8abdcc0d994f2f29284426'] = 'En raison des frais bancaires liés, l\'utilisation de ce mode de paiement requière un montant de panier minimum de %s, veuillez nous excuser pour la gêne occasionnée.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_383887ef6c8100cfead0524bd7fd0f26'] = '%s (%s%% du montant total de votre commande)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_2f389f00876c879cf273361459f793fc'] = '%s (frais fixes)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_36158474457183a60503f2429a45e71c'] = 'Échec de la génération de l\'ID de transaction ATOS';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_075acc3b4ef01c776e762f4bb9f23aae'] = 'La génération d\'un ID de transaction ATOS est un échec. Vérifiez l’existence de la table %s en base de données. Une mauvaise configuration des privilèges de l\'utilisateur base de données de Prestashop  est généralement l\'origine de la non création de cette table à l\'installation du module. Désinstallez le module, vérifiez les droits (en autres, le privilège CREATE TABLE sur la base de données utilisée est nécessaire) de l\'utilisateur puis réinstallez.%s%s';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_8e37896a8b5fd627063c9d43a315ac92'] = 'Erreur durant l\'appel de l\'exécutable';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_7b7bc2512ee1fedcd76bdc68926d4f7b'] = 'Administrateur';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_72d3fc7c4e43b4a229d9f57175f64ff4'] = 'Réponse invalide';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_d5c45c8fc38ca4b79fad07851fd37ece'] = 'Des erreurs ont été signalées durant l\'installation';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_7692036d19c407292e46348dc1878a07'] = 'Durant l\'installation du module, les erreurs suivantes ont été rapportées:%sLe module pourrait ne pas être correctement installé. Désinstallez-le, traitez les erreurs rapportées, puis réinstallez.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos_2f77384d83e2184f6267f5f627466f0c'] = 'La lecture du fichier de paramètres supplémentaire est un échec.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_ab9b28fcd2890f9d203869abd312fd93'] = 'Paiement en deux fois :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_45f0fb72a0defdfdb01de4b5a5a6876b'] = 'Autoriser';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_2839486b5055bb8c07c72ecd68b3d4df'] = 'Montant minimum du panier pour utiliser cette méthode de paiement:';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_3325a9a38ad34a66949423b5605c7949'] = 'Nombre entier positif, à saisir dans la devise par défaut choisie ci-dessus.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_8c16feff0818ce4c93ed1d7d32f26b41'] = 'Nombre de jours entre les transactions (max 30) :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_ca3fc16bfee1157538ba50b97bc406fa'] = 'Nombre de jours avant la première transaction :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_2f7f4af6083adee4ebd4375a7f81cfd7'] = 'Etat de la commande lors de la validation du paiement :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_852ee04eec7ada0ec659c2bdc90ac4d6'] = 'Montant du premier versement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_7b3f6c6a9c53624d1c07126c2e534a50'] = 'du montant de la commande';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_9355e782659b39bd230bf551e7d9a720'] = 'Partie fixe exprimée dans la devise par défaut du module';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_9b51f8c838b440c2b8123b26899180ff'] = 'Appliquer des frais de traitement :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_9a568a7431b5f0e084d0ece17a67a80b'] = 'Valeur des frais à appliquer exprimée dans la devise par défaut du module.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-23times_621c7d9f1266d3f2e04f8adc25f1b482'] = 'Paiement en trois fois :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_e7dec138f376cd06b4be3d5d85321559'] = 'Adresses e-mail auxquelles envoyer les rapports d\'erreurs générés via le front-office :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_a72f1334321317d30ce4b8460fef1324'] = 'Adresses séparées par des points-virgule, utilisez PS_SHOP_EMAIL comme raccourci vers l\'adresse e-mail de la boutique.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_ef8beeea254a3b90b2cccdc25b5b6054'] = 'Liste des IP autorisées à voir les erreurs générées sur le front-office (cassera toute redirection http se produisant après la levée de l\'erreur) :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_1f631d2d28186c3ea4dbcafe43630ca0'] = 'Votre configuration de navigation actuelle peut-être autorisée via la syntaxe :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_c02d26745c61dd27c05416f2def07f8b'] = 'Cliquez moi pour m\'ajouter à la liste';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_7c1dedf214fb923a36c073daabd7da78'] = 'Liste d\'IP séparées par des points-virgules.rnrnUne syntaxe spéciale permet de tenir compte des proxys :rnrna.a.a.a:b.b.b.b autorise l\'IP b.b.b.b (en-tête HTTP_X_FORWARDED_FOR) lorsqu\'elle navigue via le proxy a.a.a.arnrna.a.a.a:* autorise l\'IP a.a.a.a, et tout accès utilisant le proxy a.a.a.a (que l\'en-tête HTTP_X_FORWARDED_FOR soit présent ou non), en fait il s\'agit exactement du comportement de la syntaxe standard a.a.a.a mais en plus explicite.rnrn*:b.b.b.b autorise n\'importe quel accès tant que l\'en-tête HTTP_X_FORWARDED_FOR est défini sur l\'IP b.b.b.b, ce qui n\'est pas très sécurisé.rnrn*:* autorise n\'importe quel accès pourvu qu\'un en-tête HTTP_X_FORWARDED_FOR soit présent, ce qui est ni vraiment très intéressant, ni sécurisé.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_271a4416160ae98286fa483a39639a6d'] = 'Activer le mode debug pour ces IP (affiche les informations de débogage ATOS ainsi qui la ligne de commande utilisée et la réponse système).';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_82192091e2f359d9b0b9630c10cc8a7e'] = 'Chemin des binaires (path fs) :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_5d26f1d4f31917a1af583adf57f684e0'] = 'Mon serveur détient les binaires ATOS dans ses dossiers d\'inclusion (merci de n\'utiliser ceci que si vous en comprenez la fonction ! Un tiers des soi-disant bugs que l\'on me rapporte proviennent de l\'activation de cette option !)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_c1326b798697963db6332d1192f64d75'] = 'Chemin des fichiers de config ATOS :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_fd1778a5fa31acff7d3649cdb67da735'] = '54 caractères max.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_46ac9b7f3d409f03150bb5ee60948137'] = 'Protocole à utiliser lorsqu\'un utilisateur revient de la banque :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_087737ad22706bfe12aac327b4fa66b3'] = 'Domaine à utiliser lorsqu\'un utilisateur revient de la banque :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_b0f32a9c3d9a7d63c4f2f7dc0dd930fc'] = 'Laisser vide pour utiliser celui par lequel l\'utilisateur visitait votre site.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_4a56d230f4c9806621ddb1ba771ef36e'] = 'Protocole à utiliser par la banque pour contacter votre serveur :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_f98ef7df99d7a0edb24b8c61ee9185d4'] = 'Domaine à utiliser par la banque pour contacter votre serveur :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_24add203defbc2219e9bd01133aa05c4'] = 'Commencer les ID de transaction à :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_7b34f591ddba9706a23527be69ef0534'] = 'ATOS autorise l\'utilisation d\'ID entre 1 et 999999. Plus ce nombre sera élevé plus le nombre de transaction possible par jour sera faible.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_e8aabbe83963bcd3352f187e3e5f6497'] = 'Moyens de paiement acceptés :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-advanced_ad371611f3fa990cf58b842ac2f02d5e'] = 'Cf. documentation de la banque';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_9d51d13092e0f4206937c49e3b9fa3fd'] = 'Banque à utiliser :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_1ee1c44c2dc81681f961235604247b81'] = 'Mode :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_3ab47fb1486208a3c0ab444a4aeddd51'] = 'Démonstration/Test';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_609f68922d202147734e5f007a803c1c'] = 'Préproduction ou production';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_8158078cf0a70b6ea022ae326e395fa6'] = 'ID marchand :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_b2ceffa80fded453e6dde7f413919749'] = 'Aucun certificat de production trouvé';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_e20b55196795ed58fc64c9d05ba328cd'] = 'Ajouter un certificat de production :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_77be54eb528c4c75b67862f6f232dce3'] = 'Devise par défaut :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_2839486b5055bb8c07c72ecd68b3d4df'] = 'Montant minimum du panier pour utiliser cette méthode de paiement:';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_3325a9a38ad34a66949423b5605c7949'] = 'Nombre entier positif, à saisir dans la devise par défaut choisie dans l\'onglet général.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_9b51f8c838b440c2b8123b26899180ff'] = 'Appliquer des frais de traitement :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_7b3f6c6a9c53624d1c07126c2e534a50'] = 'du montant de la commande';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_9a568a7431b5f0e084d0ece17a67a80b'] = 'Valeur des frais à appliquer exprimée dans la devise par défaut du module.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_2f7f4af6083adee4ebd4375a7f81cfd7'] = 'État de la commande lors d\'un paiement validé :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_1d4a59a9d717101613762181fad86d97'] = 'État de la commande lors d\'un retour par annulation :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_ccaec01a54443ccf2bca35b674f83b33'] = 'Ne pas créer de commande';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_3ee203b61b3d1bb68e0cb14dc9cab2ae'] = 'État de la commande lors d\'un échec de paiement :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_9124c70d64d8d45b5861a118167d05b9'] = 'Ne pas créer de commande';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_eb0982d4a5972e945c645107c0f9d21d'] = 'Mode de capture :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_2e0e5bd5204d786c81f59329c451d001'] = '(Atos : CAPTURE_MODE) a une influence sur la façon dont l\'option Délai de capture est utilisé. cf Documentation Atos, section paiement différé.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_24d9d7c6220d4488070f750ac6a9cd22'] = 'Délai de capture (en jours) :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_4f86de27c868e094ea6a26ed35b96a80'] = '(Atos: CAPTURE_DAY) l\'utilisation de cette option dépend du mode de capture sélectionné. cf Documentation Atos, section paiement différé.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_28b02755e6daa724c0142a1ac48dcb72'] = 'Conserver des logs des réponses bancaires :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_7ccfad43d4aa3d53f3f32d125fda6ebd'] = 'Format texte';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_59bcc5f531966f982541ced1e3717b8c'] = 'Format CSV';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_007c9716c4aaf3b217d8dadb6a21e951'] = 'Chemin vers les logs :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_ddd5eea21d94e2120d00ef4938453300'] = 'Forcer la langue (code ISO) :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_2ea1a274ad655852d104899f91e4b0f2'] = 'Laisser vide pour utiliser la même langue sur la boutique et sur le serveur bancaire. Toutes les langues de votre boutique doivent être disponibles sur le serveur bancaire. Contactez votre banque pour connaitre la liste des code ISO utilisables.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_e4b08a1790625e73fb3568be0a0fafa3'] = 'Forcer le retour client :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_4ae1fd3d9680e75cb25177fcd1247171'] = 'Forcer le retour client (renvoie le client sur votre boutique plutôt que d\'afficher la page de résultat de transaction sur le serveur bancaire).';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_7857e774381c017fcbd592d81aa32666'] = 'Cela permet un meilleurs suivi des commandes avec des outils d\'analyse tels que Google Analytics. Cette méthode nécessite que votre serveur accepte de traiter des valeurs de variable GET très longues (plus que ce qu\'autorise le patch Suhosin, des valeurs de près de 1000 caractères ont été constatés, contactez votre technicien ATOS pour connaitre la longueur maximale devant être paramétrée dans ce mode de fonctionnement (NO_RESPONSE_PAGE)).';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_3e82cf94868f11e3ec0df0bd67451cdc'] = 'Ajout d\'un message de log à la commande';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_794f1ea08bb2291aa2fd300ae90e6432'] = 'ajouter les champs configuré dans le tableau de configuration $_responseFieldsLoggedInOrder déclaré dans la classe du module.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_40df05dc35f3cc3c2a7e29b99221c9c9'] = 'Désactivation déconseillée';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_7d93046ce6bb37517dd7d392b8b78fbb'] = 'Vérifier la disponibilité d\'une nouvelle version du module';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_b8c1cd282039df615d4431f13d0b1e06'] = 'Affiche une alerte sur la page de gestion des modules lorsqu\'une version plus récente est disponible. Peut ralentir l\'affichage de cette page.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-basic_17122db0af41c288ccc07526697f6ac7'] = 'Désactiver si cela ralentit trop la page de gestion des modules ou si votre serveur d\'hébergement ne peut communiquer avec le serveur de vérification de version.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-graphic_0ff38066ccbf8300dab41ecb058697ed'] = 'Créer le dossier de thème (écrasera si existant)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-graphic_4bf09e0e791eabfc11bd5ed4e3cb1d5c'] = 'Nom de fichier du logo de votre boutique sur le serveur bancaire :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin-graphic_7ad45879f944d12b4a6f017582d1f05d'] = 'Chemin URL des logos de carte sur votre serveur :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_91ff9ce8f38078daac07c28f7f81c092'] = 'ATOS par TrogloGeek';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_b47641e9c48e2aa87e27d0f254770a97'] = 'Il y a des erreurs';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_0eaadb4fcb48a0a0ed7bc9868be9fbaa'] = 'Attention';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_cc2ec97ebb1b872fc795da07dd9aba5c'] = 'Site web du module';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_f4ed87becea7dc771bd6b43d3215bbcf'] = 'Lire la documentation du module dans le format Open Office';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_fd24afcb6721201ee0582ca2745b63f9'] = 'format ODT (Open Office)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_c7a2349ff2bbfb977ad8ea44017065ec'] = 'Documentation';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_14e79838a09d08708f73c0d009377f5c'] = 'Lire la documentation du module au format PDF (Adobe Reader)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_22657942f7f31bc04d1f91f2aa31d739'] = 'format PDF (Adobe)';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_972e73b7a882d0802a4e3a16946a2f94'] = 'Basique';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_aabf434277385d39ebb16ef7ad6b0e7a'] = 'Graphique';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_9b6545e4cea9b4ad4979d41bb9170e2b'] = 'Avancée';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_3882bd74f1d19f41f534df4087b952de'] = 'Paiement en 2 ou 3 fois';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-admin_df586c9083328eb2209088ec0717cf91'] = 'Charger la configuration par défaut';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-ask-merchant-id_91ff9ce8f38078daac07c28f7f81c092'] = 'ATOS par TrogloGeek';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-ask-merchant-id_254f642527b45bc260048e30704edb39'] = 'Configuration';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-ask-merchant-id_e00ef98c788b0c7a2238b6300ea11094'] = 'Votre fichier certificat nécessite un renommage, veuillez saisir à cet effet le code marchand à 15 chiffres qui vous a été attribué par votre banque dans le champs ci dessous.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-back-ask-merchant-id_2628ec5b39740d08f35e2d807c0ce9dd'] = 'ID marchand :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-hookpayment_14181c267d24a9527791b0e8c44ccf9b'] = 'Cette méthode de paiement un changement de devise pour être utilisée. Votre panier sera converti en %s.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-hookpayment_16365edc296ea13ed82126fdcc57d5b8'] = 'Payer par carte';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-hookpayment_4c13fbac55d3cc8dd22d09ef8f60b7d1'] = 'Cette méthode de paiement est sujette à des frais de traitement bancaires. Votre paiement sera majoré du montant suivant:';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-hookpayment_dd56ee9827210e386b75b7d6d4c662fb'] = 'Total à payer :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-hookpayment_a75be0ca584cf686e25fe52bdaf3ee67'] = 'Payer par carte en 2 fois';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-hookpayment_5c59165f06cffa2770f98cb786e14a76'] = 'Payer par carte en 3 fois';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_5c16afe98ff9cc2a86c5351f69278eaa'] = 'Votre paiement a été validé et votre commande enregistrée.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_52edf7dbe9efe87ffa76f622e8268d96'] = 'Votre commande sera traitée dans les plus brefs délais.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_53a5aada79ab2887c10021217e894f7f'] = 'Récapitulatif de votre paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_229a7ec501323b94db7ff3157a7623c9'] = 'Identifiant de la boutique';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_ac2f3faa8d9b2d545e021b7e417957fc'] = 'Référence de la transaction';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_916d6dada2f9cd1115142b6e235db5fc'] = 'Moyen de paiement utilisé';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_02ee32419411c336ca8a02879480ebc0'] = 'N° d\'autorisation';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_d77bec555bf8adc10cff03bbea6176eb'] = 'Certificat de paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_7133d45d85f629f4c8abe0e1b3d37942'] = 'Date de la transaction';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-order-confirmation_b2f40690858b404ed10e62bdf422c704'] = 'Montant du paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_21ff087f1520a70163128cae982de67a'] = 'Paiement par carte';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_c453a4b8e8d98e82f35b67f433e3b4da'] = 'Paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_fb625994cb6bfee1045d6e7427afb16e'] = 'Échec du paiement par carte';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_a72113bec6c12471a4d2c638916b72ed'] = 'Le serveur bancaire a retourné un échec de transaction. Cela peut-être dû à une annulation de la transaction de votre part ou à un refus de la transaction par votre banque.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_d6098928e0996437c9c4ce8bfc759488'] = 'Cliquez sur le bouton \"Autres méthodes de paiement\" pour revenir au choix de la méthode de paiement.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_569fd05bdafa1712c4f6be5b153b8418'] = 'Autres méthodes de paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_53a5aada79ab2887c10021217e894f7f'] = 'Récapitulatif de la tentative de paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_229a7ec501323b94db7ff3157a7623c9'] = 'Identifiant de la boutique';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_ac2f3faa8d9b2d545e021b7e417957fc'] = 'Référence de la transaction';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_916d6dada2f9cd1115142b6e235db5fc'] = 'Moyen de paiement utilisé';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_02ee32419411c336ca8a02879480ebc0'] = 'N° d\'autorisation';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_d77bec555bf8adc10cff03bbea6176eb'] = 'Certificat de paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_7133d45d85f629f4c8abe0e1b3d37942'] = 'Date de la transaction';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-failure_b2f40690858b404ed10e62bdf422c704'] = 'Montant du paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_21ff087f1520a70163128cae982de67a'] = 'Paiement par carte';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_c453a4b8e8d98e82f35b67f433e3b4da'] = 'Paiement';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_a6c90e02c0b8771a05d2ed0e6dcf6661'] = 'en %u fois';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_6b3c701ab229d45854f6d53ea14a1b12'] = 'Vous avez choisi de payer par carte';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_d910fed17d07a73bb040d26c7fbc55bb'] = 'La transaction s\'effectuera sur un serveur bancaire sécurisé où les informations nécessaires vous seront demandées.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_dd343a53eaec637871b19663fa6e1289'] = 'A n\'importe quel moment vous pourrez revenir au choix des moyens de paiement sur notre boutique en cliquant sur le bouton d\'annulation depuis le serveur bancaire.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_e2867a925cba382f1436d1834bb52a1c'] = 'Total à payer :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_350ff019596efe046c7d08b43d7dc313'] = 'Dont frais de traitement bancaire :';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_733b34ab70968d3997605319f2c483e1'] = 'Cliquez sur le logo correspondant à votre carte pour être redirigé vers le serveur bancaire adéquat.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_8d7b46a7c26cb13e96f240faf42a8565'] = 'Le paiement par carte est indisponible jusqu\'à demain, nous vous prions d\'accepter nos excuses pour cet inconvénient.';
$_MODULE['<{tgg_atos}prestashop>tgg_atos-front-payment-redirect_569fd05bdafa1712c4f6be5b153b8418'] = 'Autres méthodes de paiement';
