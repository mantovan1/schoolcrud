<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "school";

    if (isset($_GET["search"])) {

        
        $connection = mysqli_connect($server, $user, $pass, $db) or die ("ERRO AO CONECTAR NO BANCO");
        $name = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $query = "select * from students where name like '$name%'";
	    $sql = mysqli_query($connection, $query);

        echo "<table class = 'table table-striped'>";

        echo "<thead>
              <th> ID </th>
              <th> NOME </th>
              <th> NASCIMENTO </th>
              <th> CURSO </th>
              <th> DELETAR </th>
              <th> ATUALIZAR </th>
              </thead>";

        while($line = mysqli_fetch_array($sql)){

            echo "<tr>";
            echo "<td>".$line["id"]."</td>";
            echo "<td>".$line["name"]."</td>";
            echo "<td>".$line["birth"]."</td>";
            echo "<td>".$line["career"]."</td>";
            echo "<td> <button type='button' class='btn btn-danger' onclick='deleteData(".$line["id"].")' data-dismiss = 'modal'>Deletar</button> </td>";
            
            echo "<td> 
                <button type='button' class='btn btn-primary'
                data-id='".$line["id"]."'data-name='".$line["name"]."'
                data-birth='".$line["birth"]."'data-career='".$line["career"]."'
                data-toggle='modal' data-target='#modal_update'> Atualizar </button>
            </td>";
            echo "</tr>";

        }

        echo "</table>";

    } else if (isset($_GET["name"]) && isset($_GET["birth"]) && isset($_GET["career"])) {

        $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);;
        $birth = filter_var(date("y-m-d", strtotime($_GET["birth"])), FILTER_SANITIZE_SPECIAL_CHARS);
        $career = filter_input(INPUT_GET, 'career', FILTER_SANITIZE_SPECIAL_CHARS);;
        $connection = mysqli_connect($server, $user, $pass, $db) or die ("ERRO AO CONECTAR NO BANCO");
        $insert = "insert into students values (default, '$name', '$birth', '$career')";
        mysqli_query($connection, $insert);
        mysqli_close();

    } else if (isset($_GET["delete"])){

        $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_SPECIAL_CHARS);;
        $connection = mysqli_connect($server, $user, $pass, $db) or die ("ERRO AO CONECTAR NO BANCO");
        $delete = "delete from students where id = '$id'";
        mysqli_query($connection, $delete);
        mysqli_close();

    } else if (isset($_GET["update"])) {

        $id = filter_input(INPUT_GET, 'update', FILTER_SANITIZE_SPECIAL_CHARS);;
        $nameU = filter_input(INPUT_GET, 'nameU', FILTER_SANITIZE_SPECIAL_CHARS);
        $birthU = filter_var(date("y-m-d", strtotime($_GET["birth"])), FILTER_SANITIZE_SPECIAL_CHARS);
        $careerU = filter_input(INPUT_GET, 'careerU', FILTER_SANITIZE_SPECIAL_CHARS);
        $connection = mysqli_connect($server, $user, $pass, $db) or die ("ERRO AO CONECTAR NO BANCO");
        $update = "update students set name = '$nameU', birth = '$birthU', career = '$careerU' where id = '$id'";
        mysqli_query($connection, $update);
        mysqli_close();

    }

?>    
