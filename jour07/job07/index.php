<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="">
        <label for="str">Text:</label>
        <input type="text" name="str" id="str" required>

        <label for="fonction">Choisissez le pays:</label>
        <select name="fonction" id="fonction" required>
            <option value="france">France</option>
            <option value="amerique">Amerique</option>
            <option value="japon">Japon</option>
        </select>

        <button type="submit">Submit</button>


    </form>

    <?php

    /*Créez un formulaire <form> qui contient :
    ● un champ <input> nommé “str” de type “text”,
    ● une liste déroulante <select> nommée “fonction”
    ● un bouton <button> submit.
    Lorsque vous validez le formulaire, vous devez appliquer des transformations à “str” en
    fonction de l’option <option> choisie dans la liste déroulante.
    Les choix possibles sont :
    ● “gras” : une fonction qui prend en paramètre “str” : gras($str). Elle écrit “str” en
    mettant en gras (<b>) les mots commençant par une lettre majuscule.
    ● “cesar” : une fonction qui prend en paramètre “$str” et un nombre “$decalage”
    (qui vaut 2 par défaut) : cesar($str, $decalage). $str doit s’afficher en décalant
    chaque caractère d’un nombre égal à “$decalage”.
    ex : Si $decalage vaut 1 alors “e” devient “f”. Si décalage vaut 3 alors “z” devient
    “c”.
    ● “plateforme”, une fonction qui prend en paramètre “$str” : plateforme($str).
    Elle affiche “$str” en ajoutant un “_” aux mots finissant par “me”*/

    function gras($str){
        
    }









    ?>


</body>

</html>