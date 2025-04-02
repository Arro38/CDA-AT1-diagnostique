<?php
include("db.php");


if (isset($_POST['name'])) {
  $name = $_POST['name']; //valeur de l'input avec name="name"
  $sql = "INSERT INTO task (name) VALUES ('$name')";
  $conn->query($sql);
}
if (isset($_POST['update'])) {
  $name = $_POST['update']; //valeur de l'input avec name="name"
  $id = $_POST['id'];
  $sql = "UPDATE task SET name='$name' WHERE id=$id";
  $conn->query($sql);
}





$sql = "SELECT * FROM task";
$tasks = $conn->query($sql);



$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Task Manager</title>
</head>

<body>
  <div class="main-container">
    <h1>Task Manager</h1>
    <form method="post" id="form1">
      <input type="text" name="name" placeholder="Nom de la tâche" />
      <button>+</button>
    </form>
    <ul>
      <?php
      if ($tasks->num_rows > 0) {
        // output data of each row
        while ($row = $tasks->fetch_assoc()) {
      ?>
          <li id="<?php echo $row["id"] ?>">
            <?php echo $row["name"] ?> <button class="edit" id="edit<?php echo $row["id"] ?>">
              <img height="10px" src="edit.svg" />
            </button><a href="delete.php?id=<?php echo $row["id"] ?>"><button>x</button></a>
          </li>
          <script>

    let li<?=$row["id"] ?> = document.getElementById(<?=$row["id"] ?>);
    let editbutton<?=$row["id"] ?> = document.getElementById("edit<?= $row["id"]?>");
    editbutton<?=$row["id"] ?>.addEventListener("click",()=>{
        form1.style.display = "none";
        li<?=$row["id"] ?>.innerHTML = `<form method="post">
        <input type="hidden" name="id" value="<?=$row["id"]?>"/>
      <input type="text" name="update" value="<?=$row["name"]?>"  />
      <button>Update</button>
    </form> `;
    });
    </script>
    
      <?php
        }
      }
      ?>

    </ul>
  </div>
  
</body>

</html>