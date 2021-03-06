<?php 
    require_once "./classes/Crud_user_information.class.php";

    $user_information = new user_information();

    ob_start();
    session_start();

    $dados = $user_information->select_user_information();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro de Empresários</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['full-name']) && isset($_POST['cell']) && isset($_POST['state']) && isset($_POST['city'])){

            $full_name = addslashes($_POST['full-name']);
            $cell = addslashes($_POST['cell']);
            $business_father = addslashes($_POST['business-father']);
            $state = addslashes($_POST['state']);
            $city = addslashes($_POST['city']);

            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d H:i:s');
            
            if(!empty($full_name) && !empty($cell) && !empty($state) && !empty($city)) {
                $full_name = ucwords(strtolower($_POST['full-name']));

                if(!$user_information->insert($full_name, $cell, $state, $city, $date, $business_father)){
            ?>
                    <div class="alert-erro">
                        <span class="fa fa-thumbs-o-up"></span>
                        <span class="msg">Já existe uma pessoa cadastrada com esse Celular</span>
                        <span class="close-btn">
                            <span class="fa-time"></span>
                        </span>
                    </div>
            <?php
                }else {
                    header("Location: index.php");              
                }
            }
        }   
        ?>
        <form method="POST" class="form-register">
            <h3 class="text-center">Cadastro de Empresários</h3>
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="full-name">Nome Completo</label>
                    <input type="text" class="form-control full-name" name="full-name" id="full-name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cell">Celular</label>
                    <input type="text" class="form-control cell" name="cell" id="cell"  maxlength="15" onkeypress="mask(this)" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="business-father"> Pai Empresarial</label>
                    <select id="business-father" class="form-control" name="business-father">
                            <option value="-" class="text-center"> - </option>
                        <?php
                            foreach ($dados as $value){
                        ?>  
                                <option value="<?php echo $value['full_name']?>">
                                        <?php
                                            echo $value['full_name'];
                                        ?>
                                </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="state">Estado</label>
                    <select id="state" class="form-control state" name="state" required onchange="buscaCidades(this.value)">
                        <option value=""></option>
                        
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="city">cidades</label>
                    <select id="city" class="form-control" name="city">
                        <option value=""></option>
                    </select>
                    
                </div>
            </div>
            <input type="submit" class="btn btn-primary register-btn">
        </form>

        <div class="table_info">
            <table id="example" class="table table-striped">
                <thead>
                    <tr id="title-register">
                        <th>Nome Completo</th>
                        <th>Celular</th> 
                        <th>Cidade/UF</th> 
                        <th>cadastrado em</th> 
                        <th>Pai Empresarial</th> 
                        <th>Rede</th> 
                        <th>-</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        foreach ($dados as $value){

                            $date = $value['joined_on'];
                            $result = date('d/m/Y H:i', strtotime($date));
                    ?>
                        <tr id="value-register">
                    <?php 
                            echo "<td>".$value['full_name']."</td>";
                            echo "<td>".$value['cell']."</td>";
                            echo "<td>".$value['city']." / ".$value['state']."</td>";
                            echo "<td>".$result."</td>";
                            echo "<td>".$value['business_father']."</td>";
                    ?>
                            <td>
                                <a href="?id_view=<?php echo $value['full_name'];?>" id="to-edit">Rede</a>
                            </td>
                            <td>
                                <a href="?id_delete=<?php echo $value['id_user'];?>" id="delete">Excluir</a>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
            if (isset($_GET['id_delete'])) {
            ?>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#exampleModalCenter').modal('show');
                    })
                </script>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLongTitle">Tem certeza de que deseja excluir os dados ?</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php
                                $dados = $user_information->select_id((int)$_GET['id_delete']);

                                if(count($dados) > 0){
                                    
                                    echo "<h5> Nome: ".$dados['full_name']."</h5>";
                                    
                                }
                                $_SESSION["id_user"] = $dados["id_user"];
                            ?>
                            </div>
                            <div class="modal-body">
                                <p>Caso os dados sejam excluidos, não sera possível desfazer essa ação!!.</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                    <a href="index.php" class="btn btn-danger">Não</a>
                                    <a href="index.php?id=<?php echo $_SESSION["id_user"];?>" class="btn btn-success">Sim</a>
                            </div>
                            <?php 
                            ?>
                        </div>
                    </div>
                </div>
            <?php           
            }elseif (isset($_GET["id"])) {

                $id = (int)$_SESSION["id_user"];
                $user_information->delete($id);
                header("Location: index.php");

            }elseif (isset($_GET['id_view'])) {                
                ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#exampleModalCenter').modal('show');
                })
            </script>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php
                            $dados = $user_information->select_network($_GET['id_view']);
                        ?>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <a href="index.php" class="btn btn-success">Fechar</a>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>

    <script type="text/javascript" src="scripts/city.js"></script>
    <script type="text/javascript" src="scripts/validates.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<?php
    ob_end_flush();
?>