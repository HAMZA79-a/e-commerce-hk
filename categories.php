<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background:linear-gradient(skyblue,white);
             background-repeat:no-repeat;
             background-attachment:fixed;">
    <?php include'include/nav.php' ?>
    <center><h2 style="color:white">Liste des catégorie</h2></center>
    
    <div class="container">
    <a href="ajouter_categorie.php" class="btn btn-primary">Ajouter catégorie</a>
        
    
    <table class="table">
    <thead class="table-dark">
      <tr>
        <th>#ID</th>
        <th>Libelle</th>
        <th>Description</th>
        <th>Date Création</th>
        <th>Opération</th>
      </tr>

    </thead>
    <tbody>
    <?php
      require_once 'include/database.php';
      $categories=$pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
      foreach($categories as $categorie){
        ?>
        <tr>
            <td><?php echo $categorie['ID'];  ?></td>
            <td><?php echo $categorie['LIBELLE'];   ?></td>
            <td><?php echo $categorie['DESCRIPTION'];   ?></td>
            <td><?php echo $categorie['DATE_CREATION'];   ?></td>
            <td><a href="modifier_categorie.php?id=<?php echo $categorie['ID']; ?>" class="btn btn-primary">Modifier</a>
                <a href="supprimer_categorie.php?id=<?php echo $categorie['ID']; ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['LIBELLE']; ?>');" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        
        <?php
      }
    ?>
     
    </tbody>
    </table>
   
</div>
</body>
</html>