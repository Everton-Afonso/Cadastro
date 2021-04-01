<?php 
    require_once "./classes/Crud_business_father.class.php";
   $business_father = new business_father();
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
        <form class="form-register">
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="full-name">Nome Completo</label>
                    <input type="text" class="form-control" name="full-name" id="full-name">
                    <span class="check-message hidden">Obrigatório</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cell">Celular</label>
                    <input type="number" class="form-control" name="cell" id="cell">
                    <span class="check-message hidden">Obrigatório</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="business-father"> Pai Empresarial</label>
                    <select id="business-father"class="form-control">
                        <?php
                            $dados = $business_father->select_business_father();

                            foreach ($dados as $value){
                        ?>  
                                <option value="<?php echo $value['id_business_father']?>">
                                        <?php
                                            echo $value['name'];
                                        ?>
                                </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="state">Estado</label>
                    <select id="state"class="form-control" onchange="buscaCidades(this.value)">
                        <option value=""></option>
                        
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="city">cidades</label>
                    <select id="city" class="form-control">
                        <option value=""></option>
                    </select>
                    
                </div>
            </div>
            <input type="submit" class="btn btn-primary register-btn" disabled>
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
                    <tr id="value-register">
                        <td>Everton</td>
                        <td>999999999</td>
                        <td>Machado/Mg</td>
                        <td>02/04/2021</td>
                        <td>teste</td>
                        <td>[Ver Rede]</td>
                        <td>[Excluir]</td>
                    </tr>
                    <tr id="value-register">
                        <td>Everton</td>
                        <td>999999999</td>
                        <td>Machado/Mg</td>
                        <td>02/04/2021</td>
                        <td>teste</td>
                        <td>[Ver Rede]</td>
                        <td>[Excluir]</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="scripts/validates_form.js"></script>

    <script type="text/javascript" src="scripts/city.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>