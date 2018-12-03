<?php     require_once "../templates/master.php";

    startblock("php");
      require_once "../conexion/adminusers.php";

      $users = selectUsers();
    endblock();
?>

<link rel="stylesheet" href="/riddle_abp/assets/css/contact.css">

<?php startblock("titulo"); ?> Contacto
<?php endblock(); ?>

<?php startblock("principal"); ?>
<div class="card border-primary mt-3 mb-2">
            <div class="card-header">
                <h4>Usuarios</h4>
            </div>
            <div class="card-body">

<?php   
                            
    if(isset($users)){

        if (count($users)>0) {
            echo("<table class='mt-2 table table-striped talbe-hover'>
            <thead>

            </thead>
            <tbody>");
            
            foreach ($users as $user) {
                if(isset($user)){                            
                    echo("<tr>
                            <td>
                            <input value='".$user["username"]."' type='text' class='form-control' name='update[id_ciudad]' id='txtHotel' readonly>                        
                            
                            </td>
                            <td>".$user["email"]."</td>

                            <td class='with-td'>
                                <form class='float-right' action='adminusers.php' method='post'>
                                    <button type='sumit' class='btn btn-info btn-sm with-td'>EDITAR</button>
                                    <input type='hidden' value ='".$user["email"]."' name='edit[email]'> 
                                </form>
                                
                            </td>
    
                            <td class='with-td'>
                                <form class='float-right' action='adminusers.php' method='post'>
                                    <button type='sumit' class='btn btn-danger btn-sm with-td'>BORRAR</button>
                                    <input type='hidden' value ='".$user["email"]."' name='delete[emial]'> 
                                </form>                                                
                            </td>
                        </tr>");                                                                                                
                } 
            }
            echo("</tbody>
            </table>");
        }
    }

    else{
        echo("<div class='alert alert-dismissible alert-info'>
                <strong>No hay usuarios.</strong> 
                </div>");
    }
    ?>

    </div>
        </div>
<?php endblock(); ?>