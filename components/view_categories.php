<?php 
    require_once (realpath (__DIR__ . '/../config/conection.php'));

    $sql = "SELECT * FROM categorias";
    $result = mysqli_query($conn, $sql);
    

    if ($result->num_rows > 0) {
        // <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 1</a></li>
        while($row = $result->fetch_assoc()) {
            echo "<li class='hover:bg-[#4F6D7A]'><a href='index.php?category=" . $row['id_categoria'] . "'>" . $row['name'] . "</a></li>";
        }
    } else {
        echo '<li class="hover:bg-[#4F6D7A]"><a href="index.php">categorias</a></li>';
    }