  <?php 
                if(isset($_GET["page"])){
                $page=$_GET["page"];
                }
                else{
                $page='dashboard';    
                }
                $lingua=$_SESSION['jigowatt']['lingua_user'];
  ?>

                    <li class="<?php echo $page == 'dashboard' ? 'active' : '' ?>">
                    <a href="index.php?page=dashboard"> 
                    <i class="icon-home"></i> 
                    <span class="title">Início</span>
                    </a>
                    </li>
                    
                    <li class="<?php echo $page == 'ib/clientes' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/clientes"> 
                    <i class="icon-home"></i> 
                    <span class="title">Clientes</span>
                    </a>
                        
                    <li class="<?php echo $page == 'ib/of' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/of"> 
                    <i class="icon-home"></i> 
                    <span class="title">Ordens de Tratamento</span>
                    </a>
                    
                    <li class="<?php echo $page == 'ib/tratamento' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/tratamento"> 
                    <i class="icon-home"></i> 
                    <span class="title">Tratamento</span>
                    </a>
                    
                    <li class="<?php echo $page == 'ib/arquivo_ot' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/arquivo_ot"> 
                    <i class="icon-home"></i> 
                    <span class="title">Arquivo O.T.</span>
                    </a>
                    
                    <li class="<?php echo $page == 'ib/anexos' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/anexos"> 
                    <i class="icon-home"></i> 
                    <span class="title">Anexos</span>
                    </a>
                    
                    <li class="<?php echo $page == 'ib/tiposdeanexos' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/tiposdeanexos"> 
                    <i class="icon-home"></i> 
                    <span class="title">Tipos de Anexos</span>
                    </a>

                    <li class="<?php echo $page == 'ib/calibres' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/calibres"> 
                    <i class="icon-home"></i> 
                    <span class="title">Calibres</span>
                    </a>

                    <li class="<?php echo $page == 'ib/qualidades' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/qualidades"> 
                    <i class="icon-home"></i> 
                    <span class="title">Qualidades</span>
                    </a>
                    
                    <li class="<?php echo $page == 'ib/slots' ? 'active' : '' ?>">
                    <a href="index.php?page=ib/slots"> 
                    <i class="icon-home"></i> 
                    <span class="title">Slots</span>
                    </a>

                    <?php if(protectThis("1,2,4") ) : ?>
					<li class="<?php echo $page == 'documentos' || $page == 'produtos' || $page == 'uc2/calibres' || $page == 'uc2/listagem_op' || $page == 'uc2/registos_op' || $page == 'uc2/resumo_of' || $page == 'uc2/arquivos_of' ? 'open' : '' ?>">
                    <a href="javascript:;">
                    <i class="icon-docs"></i>
                  
                   <?php if($lingua=="2"):   
                  ?>
                    <span class="title">Documentos</span>


                    <?php elseif($lingua=="3"):
                      ?>
                    <span class="title">Documents</span>


                     <?php else : ?>
                    <span class="title">Documentos</span>
                    <?php endif; ?>
                    <span class="arrow"></span>
                    </a>


  
                    <ul class="sub-menu" style="display:<?php echo $page == 'gestaodocs/categoriasdeprodutos' || $page == 'gestaodocs/documentos' || $page == 'gestaodocs/produtos' || $page == 'gestaodocs/tiposdedocs' || $page == 'gestaodocs/produtos_clientes' || $page == 'gestaodocs/templates' || $page == 'gestaodocs/docgen' || $page == 'gestaodocs/headers' || $page == 'gestaodocs/footers' ? 'block' : 'none' ?>">
                    
                    <?php endif; ?>
<?php if(protectThis("1,2,4") ) : ?>
                        
                                        <?php endif; ?>
<?php if(protectThis("1,2,4") ) : ?>                                                
                    <li class="<?php echo $page == 'gestaodocs/documentos' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/documentos"> 
                    <i class="icon-home"></i> 
                    <span class="title">Documentos</span>
                    </a>
                    </li>
  <?php endif; ?>
<?php if(protectThis("1,2,4") ) : ?>
                    <li class="<?php echo $page == 'gestaodocs/categoriasdeprodutos' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/categoriasdeprodutos"> 
                    <i class="icon-home"></i> 
                    <span class="title">Categorias de Produtos</span>
                    </a>
                    <li class="<?php echo $page == 'gestaodocs/produtos' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/produtos"> 
                    <i class="icon-home"></i> 
                    <span class="title">Produtos</span>
                    </a>
                    
                    <li class="<?php echo $page == 'gestaodocs/tiposdedocs' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/tiposdedocs"> 
                    <i class="icon-home"></i> 
                    <span class="title">Tipos de Documentos</span>
                    </a>
                    
                    <li class="<?php echo $page == 'gestaodocs/produtos_clientes' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/produtos_clientes"> 
                    <i class="icon-home"></i> 
                    <span class="title">Produtos Clientes</span>
                    </a>
                        
                    <li class="<?php echo $page == 'gestaodocs/templates' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/templates"> 
                    <i class="icon-home"></i> 
                    <span class="title">Templates</span>
                    </a>
                        
                    <li class="<?php echo $page == 'gestaodocs/docgen' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/docgen"> 
                    <i class="icon-home"></i> 
                    <span class="title">Document Generator</span>
                    </a>
                        
                    <li class="<?php echo $page == 'gestaodocs/headers' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/headers"> 
                    <i class="icon-home"></i> 
                    <span class="title">Headers</span>
                    </a>
                        
                    <li class="<?php echo $page == 'gestaodocs/footers' ? 'active' : '' ?>">
                    <a href="index.php?page=gestaodocs/footers"> 
                    <i class="icon-home"></i> 
                    <span class="title">Footers</span>
                    </a>
                    
                    </li>
                    </ul>
                </li>

   <?php endif; ?>

  



 
  
  
                           
              
					
					
	