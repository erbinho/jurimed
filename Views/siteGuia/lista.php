<div class="areaListaEmp">
    <div class="formuListaEmp">
        <form method="GET">
            <div class="TituloBuscar">
                <h3 style="font-size: 18px; color: #F44336;">Buscar</h3>
            </div>
            <div class="SubTitulo">
                <h4 style="font-size: 16px;">Palavra-Chave</h4>
                <input type="text" name="sPattern" id="query" placeholder="Eu procuro por...">
            </div> 
            <div class="SubTitulo">
                <h4 style="font-size: 16px;">Região</h4>
                <input type="text" name="sPattern" id="query" placeholder="Selecione a Região...">
            </div>
            <div class="SubTitulo">
                <h4 style="font-size: 16px;">Cidade</h4>
                <input type="text" name="sPattern" id="query" placeholder="Selecione a Cidade...">
            </div> 
            <div class="checkBuscar">
                <input type="checkbox" name="bPic" id="withPicture" value="1">
                <label for="withPicture" class="resp is1200 is767">Apenas Empresas com fotos</span>
            </div>
            <div class="button" id="uniform-blue">
                <button type="submit" class="btn btn-warning">Buscar</button>
            </div>
        </form>
    </div>
    <div class="areaList">
        <div class="topoAreaLista">
            <div class="all active" style="margin-right: 10px;">
                <strong style="color: #7e5e00;">Todos os resultados</strong>
            </div> |
            <div class="counter" style="margin-left: 10px;">
            <span id="totalResult">Página 1 - 1 de <?php echo count($listaBusca);?> Empresas localizadas</span>
            </div>
        </div>
        <ol class="breadcrumb breadcrumb-arrow" style="margin-top: 5px;">
            <li><a href="<?php echo BASE_URL;?>/GuiaEmpresa/">Guia de Empresas</a></li>
            <?php if(!empty($typeBusca)){ ?>
                <li class="active"><span>Resultados da Busca</span></li>
            <?php }else{ ?>
                <?php if(!empty($listaBusca['0']) && count($listaBusca['0']) > 0 ): ?>
                    <li class="active"><span><?php echo $listaBusca['0']['Categoria'];?></span></li>
                <?php else: ?>
                    <li class="active"><span><?php echo $listaBusca['msgAviso'];?></span></li>
                <?php endif; ?>
            <?php } ?>
        </ol>
        <div class="breadcrumb breadcrumb-mob" style="display: none; font-size: 12px;">
            <a class="breadcrumb-item" href="<?php echo BASE_URL;?>/GuiaEmpresa/">Guia de Empresas</a>
            <?php if(!empty($typeBusca)){ ?>
                <span class="breadcrumb-item active">Resultados da Busca</span>
            <?php }else{ ?>
                <span class="breadcrumb-item active" style="white-space: nowrap; min-width: 13em; overflow: hidden; text-overflow: ellipsis; cursor: pointer;"><?php echo $listaBusca['listaBusca']['0']['Categoria'];?></span>
            <?php } ?>
        </div>
        <?php 
        if(isset($listaBusca['msgAviso']) && !empty($listaBusca['msgAviso'])){ ?>
            <div class="alert-warning" role="alert" style=" padding: 15px; font-size: 14px;">
               <?php echo $listaBusca['msgAviso']; ?>
            </div>
        <?php }elseif(isset($listaBusca) && !empty($listaBusca)){
            foreach ($listaBusca as $value) { ?>
                <div class="listaEmpresa">
                    <div class="logoEmpresa">
                    <?php if(!empty($value['logo'])){
                        echo '<img src="'.BASE_URL.'/assets/images/imgGuia/logos/'.$value['logo'].'">';
                    }else{
                        echo '<img src="'.BASE_URL.'/assets/images/imgGuia/logoEmpty.jpg" width="155">';
                    }
                    echo '</div>';
                        echo '<div class="descEmpresa">';
                            echo '<a href="'.BASE_URL.'/GuiaEmpresa/empresa/'.$value['idEmpresa'].'" class="text-warning"><h5>'.$value['nomeFantasia'].'</h5></a>';
                            echo '<label><strong>Endereço:</strong> '.$value['Endereco'].', '.$value['NumeroEndereco'].', '.$value['Bairro'].' / '.$value['Cidade'].'-'.$value['siglaEstado'].'</label><br>';
                            if(!empty($_SESSION['hashLogin'])){
                                echo '<label><strong>Contato:</strong> '.$value['TelefoneFixo'].' </label><br>';
                                echo '<label><strong>Email:</strong> '.$value['email'].' </label><br>';
                            }else{
                                echo '<label><strong>Contato: </strong><span class="badge badge-pill badge-danger">Faça login ou cadastre-se para ter a esta informação.</span></label><br>';
                                echo '<label><strong>Email: </strong><span class="badge badge-pill badge-danger">Faça login ou cadastre-se para ter a esta informação.</span></label><br>';
                            }
                            if(!empty($value['palavra_chave'])){
                                echo '<label><strong>Palavras-chaves:</strong> '.$value['palavra_chave'].'</label><br>';
                            }else{
                                echo '<label><strong>Palavras-chaves:</strong> Não Informado </label><br>';
                            }
                            if(!empty($_SESSION['hashLogin'])){
                                if(!empty($value['descricao'])){
                                    echo '<label class="descEmpBreve"><strong>Descrição:</strong>'.$value['descricao'].'. ...</label><br>';
                                }else{
                                    echo '<label class="descEmpBreve"><strong>Descrição:</strong> Empresa sem Descrição ...</label><br>';
                                }
                            }else{
                                echo '<label class="descEmpBreve"><strong>Descrição: </strong><span class="badge badge-pill badge-danger">Faça login ou cadastre-se para ter a esta informação.</span></label><br>';
                            }
                    echo '</div>';
                    echo '<div class="opcEmpresa" style="margin-left: 10px; flex: 1;">';
                        echo '<a href="'.BASE_URL.'/GuiaEmpresa/empresa/'.$value['idEmpresa'].'" class="btn btn-warning">Mais informações</a>';
                        echo '<div class="empDadosMob">';
                            echo '<div class="opcEmpDados">';
                                echo '<label><strong>Cliente desde: </strong>'.date('d/m/Y', strtotime($value['clientedesde'])).'</label><br>';
                                echo '<label><strong>Categoria: </strong>'.$value['Categoria'].'</label><br>';
                            echo '</div>';
                            echo '<div class="opcEmpView">';
                                echo '<label>Foram feitas <strong>'.$value['totalAvalia'].' </strong> Avaliações de Usuários</label><br>';      
                                echo '<label id="avaliacao" data-type="'.$value['idEmpresa'].'"><strong>Media de: </strong><h2>'.$value['mediaStars'].'<span style="font-size:15px;"> estrelas</span></h2></label><br>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
        ?>
</div>