<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cours MySQL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header>
            <h1>Révision MySQL</h1>
            <hr>
            <q>Révision faites grâce à la formation de John Codeur sur udemy.com</q>
        </header>

        <section>
            <article>
                <h2>Les bases de MySQL</h2>
                <hr>
                <p>Avant toutes choses, MySQL est un SGBDD il utilise un langage informatique appelé le SQL.</p>
                <p>MySQL permet de stocker des données dans des tables. Quelles soient relationnel ou non, elles disposent de colonnes aussi appelé champs. Chaque table dispose d'un identifiant unique qui sera automatiquement incrémenté. Dans nos tables, on peux choisir quelle type de donnée nous allons stocker. Elle peut-être de type text, date, int, varchar etc.. la liste est bien assez longue.</p>
                <h3>SQL : CREATE</h3>
                <fieldset>
                    <legend>SQL : CREATE</legend>
                    <p>CREATE, permet de créer des éléments.</p>
                    <p>Dans un premier temps, il faut créer une base de donnée. Il est possible de le faire manuellement avec l'interface de phpMyAdmin. Mais également il est possible de la créer avec le langage SQL. soit :</p>
                    <pre>
                        CREATE DATABASE nomdeladb;
                    </pre>
                    <p>Une fois la base de donnée créée, il faut créer une table. voici la commande a exécuter.</p>
                    <pre>
                        CREATE TABLE mytable (
                            id int(11),
                            field1 varchar(100),
                            field2 varchar(250)
                        );
                    </pre>
                </fieldset>
                <h3>SQL : SELECT</h3>
                <fieldset>
                    <legend>SQL : SELECT</legend>
                    <p>SELECT, permet de sélectionner des éléments.</p>
                    <p>Pour sélectionner une information il faut sélectionner un champ que l'on recherche d'une table spécifique. En premier temps, juste après le SELECT, on spécifie le champ à rechercher. Si on utilise *, celà spécifiera que l'on cherche tous les éléments de la table qu'on aura renseigné juste après le FROM. Généralement, il faut y rajouter le mot clé LIMITE qui prends 2 informations. Le premier étant le numéro d'ID par ou on commence et le second permet lui de spécifier la limite max d'affichage que l'on souhaite. Exemple ci-dessous ou l'on sélectionne le champ email d'une table customers. La limite est de 25 maximum et minimum 0</p>
                    <pre>
                        SELECT email 
                        FROM customers 
                        LIMIT 0, 25;
                    </pre>
                    <p>Un autre exemple ou là, je décide d'afficher plusieurs champs issue de la même table.</p>
                    <pre>
                        SELECT id, first_name, last_name, email
                        FROM customers;
                    </pre>
                    <p>SELECT DISTINCT permet de spécifier uniquement un seul élément même si il est visible à plusieurs reprise. Exemple on a 3 personnes don le nom est Dupond avec un D et un seul Dupont avec T. Grossomodo on affichera à l'écran DUPOND et DUPONT et non 3 fois DUPOND. Autre exemple ou cette fois-ci on récupère uniquement un seul password différent : </p>
                    <pre>
                        SELECT DISTINCT password 
                        FROM curstomers;
                    </pre>
                    <p>Selectionner tous les éléments mais les réorganiser par ordre décroissant avec le mot clé DESC. Bien entendu avant il aura fallu utiliser le mot clé ORDER BY sur un champ précis exemple id. DESC peut être remplacer par ASC mais c'est la méthode par défaut. Donc exemple :</p>
                    <pre>
                        SELECT * 
                        FROM customers
                        ORDER BY last_name DESC;
                    </pre>
                </fieldset>
                <h3>SQL : INSERT</h3>
                <fieldset>
                    <legend>SQL : INSERT</legend>
                    <p>INSERT : permet d'insérer des éléments.</p>
                    <p>Pour inserer des nouvelles informations il faut connaître avant tout comment est constituée la table en question. Ensuite lorsqu'on va saisir le nouvel enregistrement il faudra spécifier en premier : INSERT INTO suivi du nom de la table puis entre parenthèse le nom de chaque champ (inutile d'indiquer l'id). Une fois ceci indiquer, il faut rajouter le mot clé VALUES suivi entre parenthèse des données à indiquer. Exemple :</p>
                    <pre>
                        INSERT INTO customers (first_name, last_name, email, password, avatar, join_date) 
                        VALUES (
                            "Alain", 
                            "Guillon", 
                            "contact@alain-guillon.fr", 
                            "123456789", 
                            "images/avatar.jpg", 
                            now()
                        );
                    </pre>
                </fieldset>
                <h3>SQL : UPDATE</h3>
                <fieldset>
                    <legend>SQL : UPDATE</legend>
                    <p>UPDATE : permet de mettre à jour un élément.</p>
                    <p>Pour mettre à jour il faut utiliser le mot clé SET suivi du champ à mettre à jour. Attention l'exemple ci-dessous met à jour l'intégralité du champ password. Si il y a 250 users, c'est 250 mdp qui deviendront identique.</p>
                    <pre>
                        UPDATE customers SET password='omg69330';
                    </pre>
                    <p>Par contre il est possible de mettre à jour un seule mot de passe avec le mot clé WHERE suivi d'un champ spécifique ou l'on désignera ce que l'on cible précisément. Même exemple que précédemment avec une modification sur Barry White</p>
                    <pre>
                        UPDATE customers SET `password`='mypassword' 
                        WHERE `last_name`= 'white';
                    </pre>
                </fieldset>
                <h3>SQL : DELETE</h3>
                <fieldset>
                    <legend>SQL : DELETE</legend>
                    <p>DELETE : permet de supprimer des éléments.</p>
                    <p>DELETE est extrêmement cours à condition de ne pas faire n'importe quoi. Si on oubli le WHERE, on est sur qu'on va supprimer l'intégraliter d'une table... Exemple.</p>
                    <pre>
                        DELETE FROM customers WHERE `first_name`='Marjorie';
                    </pre>
                </fieldset>
                <h3>SQL : WHERE</h3>
                <fieldset>
                    <legend>SQL : WHERE</legend>
                    <p>WHERE : permet de spécifier un endroit précis ou nous pouvons trouver un élément.</p>
                    <p>Avec le WHERE on peut combiner plusieurs conditions avec le mot clé AND. Exemple : ou les 2 conditions son vrai donc il affichera bien les 2 éléments.</p>
                    <pre>
                        SELECT * 
                        FROM customers 
                        WHERE last_name='white'
                        AND id >= 5;
                    </pre>
                    <p>Même exemple avec une différence, l'id sera inférieur à 15 et donc un seule enregistrement sera visible.</p>
                    <pre>
                        SELECT * 
                        FROM customers 
                        WHERE last_name='white'
                        AND id < 15;
                    </pre>
                    <p>Même exemple avec le mot clé OR qui permettre d'afficher toutes les résultat de notre première condition. Mais aussi tous les résultats de notre seconde condition.</p>
                    <pre>
                        SELECT * 
                        FROM customers 
                        WHERE last_name='white'
                        OR id < 5;
                    </pre>
                    <p>Il est possible via des parenthèse de regrouper un certain nombre de condition. Exemple :</p>
                    <pre>
                        SELECT * 
                        FROM customers
                        WHERE (last_name='Smith' AND id < 10)
                        OR first_name='Donald';
                    </pre>
                    <p>On a la possibilité aussi de dire que nous recherchons dans un endroit précis des données spécifique. Pour celà on utilisera le mot clé IN. Exemple</p>
                    <pre>
                        SELECT *
                        FROM customers
                        WHERE last_name IN ('Smith', 'White');
                    </pre>
                </fieldset>
                <h3>SQL : ALIAS</h3>
                <fieldset>
                    <legend>SQL : ALIAS</legend>
                    <p>ALIAS : nous permet de renomer le nom d'une table autrement qu'avec son nom d'origine. Pour celà on utilise le mot clé AS. Exemple</p>
                    <pre>
                        SELECT email, `password` AS mdp 
                        FROM customers;
                    </pre>
                    <p>On peut également concaténer des champs. On utilisera le mot clé CONCAT(). Exemple :</p>
                    <pre>
                        SELECT customer, CONCAT(
                            address, '- ', 
                            address2, '- ', 
                            city, '- ', 
                            state, ': ', 
                            zipcode
                        ) FROM customer_addresses;
                    </pre>
                    <p>Même exemple mais avec un alias</p>
                    <pre>
                        SELECT customer, CONCAT(
                            address, '- ', 
                            address2, '- ', 
                            city, '- ', 
                            state, ': ', 
                            zipcode
                        ) AS Addresse_complète FROM customer_addresses;
                    </pre>
                </fieldset>
                <h3>SQL : JOIN</h3>
                <fieldset>
                    <legend>SQL : JOIN</legend>
                    <p>JOIN : JOIN permet de créer des jointures entre les tables. En gros nous pouvons lié par exemple 2 tables entres elles. Au préalable, il faut créer un champ qui sera la clé étrangère qui nous permettra de faire la relation.</p>
                    <p>Les jointures sont assez complexe à comprendre. En somme imaginons que l'on recherche le nom d'un produit ainsi que son type. Sauf que chacune de ces informations est inscrite dans une table indépendante. Pour réaliser la jointure, on sélectionnera la table suivi d'un point puis le nom du champ pour la première table. On indiquera ensuite une virgule et on sélectionnera la seconde table suivit également d'un point et du nom du champ à afficher. On désigne ou es-ce que l'on veut voir l'opération avec le FROM exemple product_categories puis, on y ajoute les mots clé INNER JOIN. On indique une autre table (ex : products) puis à nouveau on utilise un autre mot clé ON ou l'on spécifie notre première table suivi d'un point est égale à notre autre table point le champ ou se trouve notre clé étrangère. Quatre exemple avec des utilisations de plusieurs choses qui ont été vu.</p>
                    <h4>INNER JOIN</h4>
                    <p>Si une par exemple une catégorie de produit ne comporte aucun produit, cette catégorie ne sera pas visible.</p>
                    <pre>
                        SELECT product_categories.name, products.name
                        FROM product_categories
                        INNER JOIN products
                        ON product_categories.id = products.category;
                    </pre>
                    <h4>LEFT JOIN</h4>
                    <p>Avec LEFT si une catégorie ne comporte pas de produit, celle-ci sera tout de même afficher avec pour résultat NULL dans la désignation du produit.</p>
                    <pre>
                        SELECT product_categories.name, products.name
                        FROM product_categories /* Cette table qui prime avec LEFT */
                        LEFT JOIN products
                        ON product_categories.id = products.category;
                    </pre>
                    <h4>RIGHT JOIN</h4>
                    <p>Avec RIGHT, si nous voulons afficher tous les produits mêmes ceux qui ne comporte pas de catégorie, se sera possible des les affiche. Le champ catégorie aura comme valeur NULL</p>
                    <pre>
                        SELECT product_categories.name, products.name
                        FROM product_categories
                        RIGHT JOIN products /* Cette table qui prime avec RIGHT */
                        ON product_categories.id = products.category;
                    </pre>
                    <h4>Un ALIAS avec les JOINTURE</h4>
                    <p>Les ALIAS nous facilite grandement la tâche en réduisant le nombre de caractère à saisir. Reprenons le premier exemple modifié avec des ALIAS :</p>
                    <pre>
                        SELECT pc.name, p.name
                        FROM product_categories AS pc /* pc pour product_categories */
                        INNER JOIN products AS p /* p pour products */
                        ON pc.id = p.category;
                    </pre>
                    <p>Tout fonctionne très bien sauf que le soucis c'est que nos 2 champs porte le même nom. On a le nom de la catégorie et le nom du produit. Pour arrangé ça on reprendre la même syntaxe que précédemment avec l'ajout d'un alias pour désigner le nouveau nom de nos champ :</p>
                    <pre>
                        SELECT pc.name AS categoryName, p.name AS productsName
                        FROM product_categories AS pc
                        INNER JOIN products AS p
                        ON pc.id = p.category;
                    </pre>
                    
                </fieldset>
                <h3>SQL : DATE</h3>
                <fieldset>
                    <legend>SQL : DATE</legend>
                    <p>Les dates sont très importante dans nos bdd, elles permettent de définir un instant précis lors d'un enregistrement d'un produit, d'une inscription etc.. Plusieurs déclinaisons existe :</p>
                    <dl>
                        <dt>DATE</dt>
                        <dd>C'est la date : Mois / jour / année</dd>
                    </dl>
                    <dl>
                        <dt>DATETIME</dt>
                        <dd>C'est la date et un temps dans la journée. Mois / jour / année / secondes / minutes / heures.</dd>
                    </dl>
                    <dl>
                        <dt>TIMESTAMP</dt>
                        <dd>C'est la même chose que datetime</dd>
                    </dl>
                    <dl>
                        <dt>TIME</dt>
                        <dd>C'est uniquement un temps. Seconde / minutes / heures</dd>
                    </dl>
                    <dl>
                        <dt>YEAR</dt>
                        <dd>C'est l'année</dd>
                    </dl>
                    <dl>
                        <dt>NOW</dt>
                        <dd>C'est maintenant.</dd>
                    </dl>
                    <p>Exemple d'une requete SQL permettant d'afficher une date spécifique qui aura été récupérer dans la bdd</p>
                    <pre>
                        SELECT first_name, last_name, join_date 
                        FROM customers
                        WHERE join_date = "2014-02-20 21:07:19";
                    </pre>
                    <p>Autre exemple avec un interval qui nous permettrait de retrouver tous les membres qui se sont connecté à une heure spécifique.</p>
                    <pre>
                        SELECT first_name, last_name, join_date
                        FROM customers
                        WHERE join_date >= "2014-02-20 02:00:00"
                        AND join_date <= "2014-02-21 12:00:00";
                    </pre>
                    <p>Nous pouvons avec le mot clé BETWEEN qui signifie entre indiqué la même requête écrite donc différemment.</p>
                    <pre>
                        SELECT first_name, last_name, join_date
                        FROM customers
                        WHERE join_date BETWEEN "2014-02-20 02:00:00"
                        AND "2014-02-21 12:00:00";
                    </pre>
                    <p>Un exemple avec une fonction qui nous permettra d'afficher uniquement l'année au lieu de toutes les informations</p>
                    <pre>
                        SELECT first_name, last_name, YEAR(join_date) AS yearDate
                        FROM customers
                        WHERE join_date BETWEEN "2014-02-20 02:00:00"
                        AND "2014-02-21 12:00:00";
                    </pre>
                    <p>Exemple d'une fonction pour afficher le mois</p>
                    <pre>
                        SELECT first_name, last_name, MONTH(join_date) AS monthDate
                        FROM customers
                        WHERE join_date BETWEEN "2014-02-20 02:00:00"
                        AND "2014-02-21 12:00:00";
                    </pre>
                    <p>Exemple avec la fonction DAY()</p>
                    <pre>
                        SELECT first_name, last_name, DAY(join_date) AS dayDate
                        FROM customers
                        WHERE join_date BETWEEN "2014-02-20 02:00:00"
                        AND "2014-02-21 12:00:00";
                    </pre>
                    <p>Même exemple avec un mixte de plusieurs fonctions : HOUR(), MINUTE(), SECOND()</p>
                    <pre>
                        SELECT first_name, last_name, HOUR(join_date) AS hourDate, MINUTE(join_date) AS minuteDate, SECOND(join_date) AS secondDate
                        FROM customers
                        WHERE join_date BETWEEN "2014-02-20 02:00:00"
                        AND "2014-02-21 12:00:00";
                    </pre>
                    <p>Exemple avec le TIMESTAMP()</p>
                    <pre>
                        SELECT first_name, last_name, TIMESTAMP(join_date) AS timestamp
                        FROM customers
                        WHERE join_date BETWEEN "2014-02-20 02:00:00"
                        AND "2014-02-21 12:00:00";
                    </pre>
                    <p>Exemple avec la fonction maintenant.</p>
                    <pre>
                        SELECT first_name, last_name, NOW() AS now
                        FROM customers
                        WHERE join_date;
                    </pre>
                </fieldset>
                <h3>SQL : FUNCTIONS</h3>
                <fieldset>
                    <legend>SQL : FUNCTIONS</legend>
                    <p>FUNCTIONS :</p>
                    <h4>AVG() - average soit la moyenne</h4>
                    <p>Avec cette fonction il est possible de faire une moyenne d'un champ. Par exemple les prix.</p>
                    <pre>
                        SELECT AVG(price) AS moyennePrix
                        FROM products;
                    </pre>
                    <p>Dans l'exemple qui suit, on va sélectionner tous les éléments don le prix est supérieur à la moyenne de ce même champ.</p>
                    <pre>
                        /* Pour rappel, la moyenne est actuellement de 176.5 */
                        SELECT *
                        FROM products
                        WHERE price > (SELECT AVG(price) FROM products);
                    </pre>
                    <h4>COUNT() - compter une quantité</h4>
                    <p>La fonction count() permet de compter le nombre de ligne qui correspond à la requête demandé.</p>
                    <pre>
                        SELECT COUNT(name) AS quantité
                        FROM products;
                    </pre>
                    <h4>COUNT(DISTINCT xxxxx)</h4>
                    <p>Cette fonction permet de compter uniquement des champ distinct et non le nombre total de ligne qui ont été enregistrer. Si un enregistrement revient une seconde fois, il sera ignoré.</p>
                    <pre>
                        SELECT COUNT(DISTINCT price) AS prixDistinct
                        FROM products;
                    </pre>
                    <p>Il est également possible de compter un certain nombre d'article selon une catégorie spécifique. Exemple on va compter toutes les catégorie qui sont différente de 1</p>
                    <pre>
                        SELECT COUNT(category) AS nbCategory
                        FROM products
                        WHERE category != 1;
                    </pre>
                    <h4>MAX() & MIN()</h4>
                    <p>La fonction MAX return le nombre maximal qui aura été saisi. En revanche la fonction MIN fera l'inverse.</p>
                    <pre>
                        /* PRIX MAX */
                        SELECT name, MAX(price)
                        FROM products;
                    </pre>
                    <pre>
                        /* PRIX MIN */
                        SELECT name, MIN(price)
                        FROM products;
                    </pre>
                </fieldset>
                <h3>SQL : GROUP BY et HAVING</h3>
                <fieldset>
                    <legend>SQL : GROUP BY</legend>
                    <p>GROUP BY : permet de regrouper des éléments par ce qu'on aura spécifier.</p>
                    <p>Exemple on va spécifier la moyenne des produit groupé par categorie.</p>
                    <pre>
                        SELECT category, AVG(price) AS moyennePrix
                        FROM products
                        GROUP BY category;
                    </pre>
                    <p>Même exemple sauf qu'on compte également le nombre de produit dans ma table products.</p>
                    <pre>
                        SELECT category, COUNT(category) AS nbCategorie, AVG(price) AS moyennePrix
                        FROM products
                        GROUP BY category;
                    </pre>
                    <p>Même exemple tout en spécifiant le nom de la category</p>
                    <pre>
                        SELECT product_categories.name, AVG(products.price) AS average_prince
                        FROM products
                        INNER JOIN product_categories
                        ON product_categories.id = products.category
                        GROUP BY product_categories.name;
                    </pre>
                    <p>Spécifions des ALIAS pour alléger la syntaxe</p>
                    <pre>
                        SELECT pc.name, AVG(p.price) AS average_price
                        FROM products AS p
                        INNER JOIN product_categories AS pc
                        ON pc.id = p.category
                        GROUP BY pc.name;
                    </pre>
                </fieldset>
                <fieldset>
                    <legend>SQL : HAVING</legend>
                    <p>HAVING : permet après un groupement de spécifier une requête plus précise. Reprenons l'exemple précédent en y ajoutant le HAVING() dont la moyenne sera supérieur à 100</p>
                    <pre>
                        SELECT pc.name, AVG(p.price) AS average_price
                        FROM products AS p
                        INNER JOIN product_categories AS pc
                        ON pc.id = p.category
                        GROUP BY pc.name
                        HAVING average_price > 100;
                    </pre>
                </fieldset>
            </article>

            <article>
                <h2>PHP et MySQL</h2>
                <hr>
                <h3>PDO ou MySQLi</h3>
                <fieldset>
                    <legend>PDO</legend>
                    <p>PDO est supportée par PHP7 et il est compatible avec tous les SGBDD disponible. Pourquoi s'en priver ?</p>
                    <p>PDO étant un module de php il peut arriver qu'il ne soit pas activer par défaut. Pour celà il faut ouvrir Php.ini et retirer le " ; " de la ligne :</p>
                    <pre>
                        extension=php_pdo_mysql.dll
                    </pre>
                </fieldset>
                <fieldset>
                    <legend>MySQLi</legend>
                    <p>Encore supporté aujourd'hui par PHP7. mysqli_ communique UNIQUEMENT avec MySQL...</p>
                </fieldset>
                <h3>Connexion à une base de données LOCAL</h3>
                <fieldset>
                    <legend>Connexion à une base de données</legend>
                    <p>Voici le code généralement utiliser pour se connecter à une base de donnée en local.</p>
                    <pre>
                        &lt;?php
                            $bdd = new PDO('mysql:host=localhost;dbname=store','identifiant','password');
                        ?&gt;
                    </pre>
                    <p>Si on spécifie un mauvais identifiant ou mot de passe, le risque sera grand dans le senso u nos informations seront visible en ligne... Dans notre cas précédent nous aurions obtenu :</p>
                    <p>
                        <img src="http://puu.sh/tsW08/81d015124d.png" alt="erreur code afficher">
                    </p>
                    <p>Sur ce coup ce n'est pas intéressant vu qu'on apperçoit directement l'identifiant ainsi que le mot de passe saisi... </p>
                    <p>Pour contrer tout ça, il est possible d'essayer une tentative et si une erreur existe, elle sera capturer sans dévoiler le mot de passe. Pour celà on utilise les blocs TRY {}CATCH {}</p>
                    <pre>
                        &lt;?php
                            
                            try {
                                $bdd = new PDO ('mysql:host=localhost;dbname=store','identifiant', "password");
                            } catch(Exception $error) {
                                die('Erreur : '. $error->getMessage());
                            }
                        ?&gt;
                    </pre>
                    <p>L'erreur affichera : <br />
                    <img src="http://puu.sh/tsXHv/d148309398.png" alt=""></p>
                </fieldset>
                <h3>Connexion à une base de données en LIGNE</h3>
                <fieldset>
                    <legend>Connexion à une base de données</legend>
                    <p>Pour spécifier une bdd en ligne, il faut créer un utilisateur, lui spécifier les droits, ensuite nous devons l'ajouter à notre sgbdd. Par la suite on créer une table et on importe un fichier sql ou bien on le créer depuis le début.</p>
                    <p>Les informations de ma connexion ne seront ici pas visible mais pour information il faut saisir l'identifiant le mdp ainsi que le serveur auquel on se connecte.</p>
                    <?php
                        include ('connexion.php');

                        $resultat = $bdd->query('SELECT first_name FROM customers');

                        while ( $row = $resultat->fetch()) {
                            echo $row['first_name']. '<br />';
                        }
                        echo '<hr>';

                        $marjorie = $bdd->query('SELECT name, description, price FROM products');

                        while ( $row = $marjorie->fetch()) {
                            echo '<p>'. $row['name'] . ' dispose comme description <mark>' . $row['description']. '</mark> et son prix est de : ' . $row['price'] . ' €.</p>';
                        }
                    ?>
                   
                </fieldset>
                <h3>fonction query</h3>
                <fieldset>
                    <legend>fonction query</legend>
                    <p>la fonction query qui veut dire requête en français, permet en php d'écrire nos reqûetes SQL. Un requête vient après une connexion à notre bdd.</p>
                    <h4>FETCH()</h4>
                    <p>fetch() permet de récupérer une ligne.</p>
                    <pre>
                    &lt;?php

                        // Code accès à la bdd ici...

                        $myResult = $bdd->query(" REQUETE SQL ICI ");
                        $myResult->fetch();

                        var_dump($myResult->fetch());
                    ?&gt;
                    </pre>
                    <p>pour voir le contenu d'une variable spécifique, on peut faire un var_dump($myResult->fetch()) ce qui afficherai tout même les index.</p>
                    <p>Même chose avec la possibilité d'utiliser PDO pour restreindre l'affichage dans notre var_dump.</p>
                    <pre>
                        var_dump($myResult->fetch(PDO::FETCH_ASSOC));
                    </pre>
                    <p>Pour obtenir le même résultat avec uniquement les index dans le var_dump, il faut saisir :</p>
                    <pre>
                        var_dump($myResult->fetch(PDO::FETCH_NUM));
                    </pre>
                    <h4>FETCHALL()</h4>
                    <p>fetchall() permet de récupérer toutes les lignes.</p>
                    <pre>
                    &lt;?php

                        // Code accès à la bdd ici...

                        $myResult = $bdd->query(" REQUETE SQL ICI ");
                        $myResult->fetchall();

                        var_dump($myResult->fetchall());
                    ?&gt;
                    </pre>
                    <p>Affiché les lignes une à une avec la boucle while()</p>
                    <p>2 Possibilités, en 1 on créer la variable et on définit le fetch dans cette même variable. Puis dans le while on appel la variable. Sinon la 2ème possibilité, c'est de saisir sirectement la variable avec le fetch dans le while.</p>
                    <h4>Exemple 1</h4>
                    <pre>
                    &lt;?php
                        $row = $myResult->fetch();

                        while ($row) {
                            // code ici...
                            $row = $myResult->fetch();
                        }
                    ?&gt;
                    </pre>
                    <h4>Exemple 2</h4>
                    <pre>
                    &lt;?php
                        while ($row = $myResult->fetch()) {
                            // code ici...
                        }
                    ?&gt;
                    </pre>
                    <p>Il est aussi possible d'insérer une donnée directement, sans forcément voir le résultat à l'écran</p>
                    <pre>
                    &lt;?php
                        $bdd->query('INSERT INTO customers(first_name, last_name) VALUES (\'Walt\', \'Disney\')');
                    ?&gt;
                    </pre>
                </fieldset>
                <h3>fonction prepare et execute</h3>
                <fieldset>
                    <legend>fonction prepare & execute</legend>
                    <p>la fonction prepare permet de préparer une requête. En gros on ne sait pas forcément quelle donnée sera renseigné.. Quant à la fonction execute, elle permet d'exécuter une requete qui aura été préparer...</p>
                    <pre>
                    &lt;?php
                        $ask->prepare('INSERT INTO customers (first_name, last_name) VALUES (?,?)')
                    ?&gt;
                    </pre>
                    <p>Puis pas mal de chose se passe et là les valeurs arrivent.</p>
                    <pre>
                        $firstName = "Willy";
                        $lastName = "Rovelly";
                    </pre>
                    <p>Enfin on exécute les valeurs qui auront été insérer dans nos variables.</p>
                    <pre>
                    &lt;?php
                        $ask->execute(array($firstName,$lastName));
                    ?&gt;
                    </pre>
                </fieldset>
                <fieldset>
                    <legend>fonction execute</legend>
                    <p></p>
                </fieldset>
            </article>
        </section>
        
        <footer>
            <p>Alain tous droits réserver</p>
        </footer>              


    </body>
</html>