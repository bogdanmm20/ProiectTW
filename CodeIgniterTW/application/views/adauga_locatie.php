<!DOCTYPE html>
<html>
<head>

	<title>Adaugare Locatii </title>
</head>
<body>
   

    <form method="post">
        <div>
            <label for="nume">Nume:</label>
            <input type="text" id="nume" name="nume" />
        </div>
    	<div>
            <label for="categorie">Categorie:</label>
            <input type="text" id="categorie" name="categorie" />
        </div>
    	<div>
            <label for="latitudine">Latitudine:</label>
            <input type="text" id="latitudine" name="latitudine" />
        </div>
    	<div>
            <label for="longitudine">Longitudine:</label>
            <input type="text" id="longitudine" name="longitudine" />
        </div>
        <div>
            <label for="oras">Oras:</label>
            <input type="text" id="oras" name="oras" />
        </div>
    	<div>
            <label for="tara">Tara:</label>
            <input type="text"id="tara" name="tara" />
        </div>
        <div>
            <label for="descriere">Descriere:</label>
            <textarea id="descriere" name="descriere"></textarea>
        </div>
        
        <div class="button">
            <button type="submit">Send your location</button>
        </div>
    </form>

</body>
</html>