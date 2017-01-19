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
                    <p>JOIN : JOIN permet de créer des jointures entre les tables. En gros nous pouvons lié par exemple 2 tables entres elles.</p>
                </fieldset>
                <h3>SQL : DATE</h3>
                <fieldset>
                    <legend>SQL : DATE</legend>
                    <p>DATE : </p>
                </fieldset>
                <h3>SQL : FUNCTIONS</h3>
                <fieldset>
                    <legend>SQL : FUNCTIONS</legend>
                    <p>FUNTIONS :</p>
                </fieldset>
                <h3>SQL : GROUP BY et HAVING</h3>
                <fieldset>
                    <legend>SQL : GROUP BY</legend>
                    <p>GROUP BY : permet de regrouper des éléments par ce qu'on aura spécifier.</p>
                </fieldset>
                <fieldset>
                    <legend>SQL : HAVING</legend>
                    <p>HAVING : permet de spécifier un élément si il dispose de tel ou tel contenu.</p>
                </fieldset>
            </article>

            <article>
                <h2>PHP et MySQL</h2>
                <hr>
                <h3>PDO ou MySQLi</h3>
                <fieldset>
                    <legend>PDO</legend>
                </fieldset>
                <fieldset>
                    <legend>MySQLi</legend>
                </fieldset>
                <h3>Connexion à une base de données</h3>
                <fieldset>
                    <legend>Connexion à une base de données</legend>
                    <p>Voici le code généralement utiliser pour se connecter à une base de donnée. Localhost pour une base de donnée spécifiquement disponible en local.</p>
                </fieldset>
                <h3>fonction query</h3>
                <fieldset>
                    <legend>fonction query</legend>
                </fieldset>
                <h3>fonction prepare et execute</h3>
                <fieldset>
                    <legend>fonction prepare</legend>
                </fieldset>
                <fieldset>
                    <legend>fonction execute</legend>
                </fieldset>
            </article>
        </section>
        
        <footer>
            <p>Alain tous droits réserver</p>
        </footer>


    </body>
</html>