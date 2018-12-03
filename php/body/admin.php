<?php 
    require_once "../templates/master.php";
    startblock("php");
      require_once "../conexion/adminusers.php";
      checkUser();

      $users = selectUsers();
    endblock();
?>

<link rel="stylesheet" href="/riddle_abp/assets/css/contact.css">

<?php startblock("titulo"); ?> Contacto
<?php endblock(); ?>

<?php startblock("principal");

?>
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
                <h5 class='text-danger'>Your role :  <b>".$_SESSION['user']['role']."</b></h5>
            </thead>
            <tbody>");
            
            foreach ($users as $user) {
                if(isset($user)){ 
                        
                    echo("<tr>
                            <form class='float-right' action='/riddle_abp/php/conexion/usersController.php' method='post'>
                                <td>
                                <input value='".$user["username"]."' type='text' class='form-control' name='edit[name]' id='txtHotel'>                        
                                
                                </td>
                                <td>".$user["email"]."</td>
                                <td>".$user["role"]."</td>

                                <td class='with-td'>
                                    <button type='sumit' class='btn btn-info btn-sm with-td'>GUARDAR</button>
                                    <input type='hidden' value ='".$user["email"]."' name='edit[email]'> 
                                    <input type='hidden' value ='".$user["role"]."' name='edit[role]'> 
                                                                   
                                </td>
                            </form>
        
                                <td class='with-td'>
                                    <form class='float-right' action='/riddle_abp/php/conexion/usersController.php' method='post'>
                                        <button type='sumit' class='btn btn-danger btn-sm with-td'>BORRAR</button>
                                        <input type='hidden' value ='".$user["email"]."' name='delete[email]'>                                                                                 
                                        <input type='hidden' value ='".$user["role"]."' name='delete[role]'>                                                                                 
                                    </form> 
                                </td>");

                        if($_SESSION['user']['role'] == 2 && $user['role'] < 2){
                            echo ("<td class='with-td'>
                                  <form class='float-right' action='/riddle_abp/php/conexion/usersController.php' method='post'>");
                            
                            if($user['role'] == 1){
                                echo ("<button type='sumit' class='btn btn-secondary btn-sm with-td'>QUITAR PERMISO</button>");
                            }
                            elseif($user['role'] == 0){
                                echo ("<button type='sumit' class='btn btn-succes btn-sm with-td'>DAR PERMISO</button>");
                            }
                            echo ("  <input type='hidden' value ='".$user["email"]."' name='change[email]'>                                                                                 
                                    <input type='hidden' value ='".$user["role"]."' name='change[role]'>                                                                                 
                                  </form> 
                                  </td>");
                        }
                        echo ("</tr>");                                                                                                
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