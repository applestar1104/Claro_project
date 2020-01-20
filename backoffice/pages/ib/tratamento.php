 <h3 class="">Slots</h3>
    <hr>
        <div class="m-grid m-grid-responsive-xs m-grid-demo">
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                    6A - OT - Cliente - Quantidade - [xcrud button]
                </div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                    1A<br>
                    <?php
    $xcrud_slot_1A = Xcrud::get_instance();
    $xcrud_slot_1A->table('ib_tratamentos');
    $variavel='registo';          
    $xcrud_slot_1A->set_var('nome_tabela','ib_tratamentos');
    $xcrud_slot_1A->set_var('nome_campo','id_'.$variavel.'');              
                
    $xcrud_slot_1A->where('id_slot =',1);
    $xcrud_slot_1A->where('activo =',1);
    $xcrud_slot_1A->columns('id_slot,id_of,quantidade_registo,activo');
    $xcrud_slot_1A->relation('id_of','ib_ofs','id_of','id_of','activo=1');
    $xcrud_slot_1A->relation('id_slot','ib_slots','id_slot','nome_slot','activo=1');
	//$xcrud_slot_1a->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
	$xcrud_slot_1A->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
    $xcrud_slot_1A->highlight_row('activo', '=', 1, '#8DED79');
 	$xcrud_slot_1A->column_callback('activo','estados_act');
                    
 	
  	$xcrud_slot_1A->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud_slot_1A->create_action('unpublish', 'unpublish_action');


    $xcrud_slot_1A->unset_add();
    $xcrud_slot_1A->unset_edit();
    $xcrud_slot_1A->unset_remove();
    $xcrud_slot_1A->unset_view();
    $xcrud_slot_1A->unset_csv();
    $xcrud_slot_1A->unset_limitlist();
    $xcrud_slot_1A->unset_numbers();
    $xcrud_slot_1A->unset_pagination();
    $xcrud_slot_1A->unset_print();
    $xcrud_slot_1A->unset_search();
    $xcrud_slot_1A->unset_title();                    
    $xcrud_slot_1A->load_view('list','xcrud_list_view_simple.php'); 

    echo $xcrud_slot_1A->render();
?>
                </div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">6B - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                    1B<br>
                    <?php
    $xcrud_slot_1B = Xcrud::get_instance();
    $xcrud_slot_1B->table('ib_tratamentos');
    $variavel='registo';          
    $xcrud_slot_1B->set_var('nome_tabela','ib_tratamentos');
    $xcrud_slot_1B->set_var('nome_campo','id_'.$variavel.'');              
                
    $xcrud_slot_1B->where('id_slot =',2);
    $xcrud_slot_1B->where('activo =',1);
    $xcrud_slot_1B->columns('id_slot,id_of,quantidade_registo,activo');
    $xcrud_slot_1B->relation('id_of','ib_ofs','id_of','id_of','activo=1');
    $xcrud_slot_1B->relation('id_slot','ib_slots','id_slot','nome_slot','activo=1');
	//$xcrud_slot_1a->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
	$xcrud_slot_1B->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
    $xcrud_slot_1B->highlight_row('activo', '=', 1, '#8DED79');
 	$xcrud_slot_1B->column_callback('activo','estados_act');
                    
 	
  	$xcrud_slot_1B->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud_slot_1B->create_action('unpublish', 'unpublish_action');


    $xcrud_slot_1B->unset_add();
    $xcrud_slot_1B->unset_edit();
    $xcrud_slot_1B->unset_remove();
    $xcrud_slot_1B->unset_view();
    $xcrud_slot_1B->unset_csv();
    $xcrud_slot_1B->unset_limitlist();
    $xcrud_slot_1B->unset_numbers();
    $xcrud_slot_1B->unset_pagination();
    $xcrud_slot_1B->unset_print();
    $xcrud_slot_1B->unset_search();
    $xcrud_slot_1B->unset_title();
    //$xcrud_slot_1A->unset_benchmark();                      
    $xcrud_slot_1B->load_view('list','xcrud_list_view_simple.php'); 

    echo $xcrud_slot_1B->render();
?>
                
                
                </div>
            </div>
            <div class="m-grid-row half">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">6S - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">
                    1S<br>
                    <?php
    $xcrud_slot_1S = Xcrud::get_instance();
    $xcrud_slot_1S->table('ib_tratamentos');
    $variavel='registo';          
    $xcrud_slot_1S->set_var('nome_tabela','ib_tratamentos');
    $xcrud_slot_1S->set_var('nome_campo','id_'.$variavel.'');              
                
    $xcrud_slot_1S->where('id_slot =',3);
    $xcrud_slot_1S->where('activo =',1);
    $xcrud_slot_1S->columns('id_slot,id_of,quantidade_registo,activo');
    $xcrud_slot_1S->relation('id_of','ib_ofs','id_of','id_of','activo=1');
    $xcrud_slot_1S->relation('id_slot','ib_slots','id_slot','nome_slot','activo=1');
	//$xcrud_slot_1a->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
	$xcrud_slot_1S->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
    $xcrud_slot_1S->highlight_row('activo', '=', 1, '#8DED79');
 	$xcrud_slot_1S->column_callback('activo','estados_act');
                    
 	
  	$xcrud_slot_1S->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud_slot_1S->create_action('unpublish', 'unpublish_action');


    $xcrud_slot_1S->unset_add();
    $xcrud_slot_1S->unset_edit();
    $xcrud_slot_1S->unset_remove();
    $xcrud_slot_1S->unset_view();
    $xcrud_slot_1S->unset_csv();
    $xcrud_slot_1S->unset_limitlist();
    $xcrud_slot_1S->unset_numbers();
    $xcrud_slot_1S->unset_pagination();
    $xcrud_slot_1S->unset_print();
    $xcrud_slot_1S->unset_search();
    $xcrud_slot_1S->unset_title();
    //$xcrud_slot_1A->unset_benchmark();                      
    $xcrud_slot_1S->load_view('list','xcrud_list_view_simple.php'); 

    echo $xcrud_slot_1S->render();
?>
                
                </div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">7A - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">2A - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">7B - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">2B - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row half">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">7S - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">2S - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">8A - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">3A - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">8B - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">3B - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row half">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">8S - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">3S - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">9A - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">6A - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">9B - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">4B - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row half">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">9S - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">4S - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">10A - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">5A - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">10B - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center">5B - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
            <div class="m-grid-row half">
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">10S - OT - Cliente - Quantidade - [xcrud button]</div>
                <div class="m-grid-col m-grid-col-middle m-grid-col-center" style="height: 30px">5S - OT - Cliente - Quantidade - [xcrud button]</div>
            </div>
        </div>

[START CYCLE BUTTON HERE]

<?php
    
    $xcrud = Xcrud::get_instance();
    
    $variavel='tratamento';

    // chama tabela
    $xcrud->table('ib_tratamentos');
    // nome da tabela
    $xcrud->table_name('Tratamento');
    // nome das label
    $xcrud->label('id_of','O.T.');
    $xcrud->label('id_slot','Slot');
    $xcrud->label('id_cliente','Cliente');
    $xcrud->label('tca','TCA');   
    $xcrud->label('observacoes_gerais','Observações Gerais');
    //$xcrud->label('observacoes','Observações');
    // colunas a mostrar na listagem
    $xcrud->columns('id_slot,id_of,quantidade_registo,activo');     // relações
    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
	$xcrud->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
	
	$xcrud->set_var('nome_tabela','ib_tratamentos');
    $xcrud->set_var('nome_campo','id_'.$variavel.'');
    $xcrud->set_var('accao','Inseriu');
	$xcrud->unset_edit()->unset_view();
    $xcrud->hide_button('add');
    // logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php
    
    $xcrud->relation('id_of','ib_ofs','id_of','id_of','activo=1');
    $xcrud->relation('id_slot','ib_slots','id_slot','nome_slot','activo=1');

	// activar/desactivar
 	$xcrud->column_callback('activo','estados_act');
  	$xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud->create_action('unpublish', 'unpublish_action');

  	// gravar dados no momento de criar 
  	$xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
    // gravar dados no momento do actualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');

    // estes campos do criar e actualizar nao aparecem no editar nem no criar
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','data_saida'), true, true, 'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','data_saida'), true, true, 'create');
    
    $xcrud->highlight_row('activo','=','0','#EEE8AA'); // linha amarela se não tiver anexos
    
    $xcrud->sum('quantidade_registo'); // sum row(), receives data from full table (ignores pagination)
    // botão para adicionar anexo
    $xcrud->button('index.php?page=ib/anexos&id_of={id_of}', false, 'glyphicon glyphicon-plus');
    
// juntar tabela de anexos no view
    $anexos = $xcrud->nested_table('Anexos','id_of','uc2_anexos','id_of'); // 2nd level 2
    $anexos->columns('id_tipodeanexo,nome_anexo,anexo');
    $anexos->column_callback('anexo','anexo_url');
    
    $xcrud->order_by('id_of','desc');
    $xcrud->column_pattern('id_of','<a href="index.php?page=ib/resumo_of&id_of={id_of}">{id_of}</a>');
    
    // nome da tabela
    //$anexos->table_name('Anexos');
    // label
    $anexos->label('nome_anexo','Nome do Anexo');
    $anexos->label('id_tipodeanexo','Tipo de Anexo');
    // relações
    $anexos->relation('id_tipodeanexo','uc2_tiposdeanexos','id_tipodeanexo','nome_tipodeanexo'); //campo origem / tabela / destino / destino_nome
    $xcrud->fields(array('arquivo'), true);
    // esconder 
    $anexos->unset_add();
    $anexos->unset_edit();
    $anexos->unset_remove();
    $anexos->unset_print();
	$anexos->unset_csv();
	$anexos->unset_numbers();
	$anexos->unset_limitlist();
	$anexos->unset_search();
    
    echo $xcrud->render();

    $xcrud2 = Xcrud::get_instance();
    $xcrud2->table('ib_tratamentos');
    //$xcrud2->fields('productLine,htmlDescription');
    $xcrud2->hide_button('save_return,return,save_edit');
    //$xcrud2->set_lang('save_new','Publish');

    $xcrud2->label('id_of','O.F.');
    $xcrud2->label('id_cliente','Cliente');
    $xcrud2->label('tca','TCA');   
    //$xcrud2->label('observacoes_gerais','Observações Gerais');
    //$xcrud->label('observacoes','Observações');
    // colunas a mostrar na listagem
    $xcrud2->columns('id_of,quantidade_registo,activo');     // relações
    $xcrud2->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud2->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
	$xcrud2->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
	$xcrud2->relation('id_slot','ib_slots','id_slot','id_slot','activo=1');

	
	$xcrud2->set_var('nome_tabela','ib_tratamentos');
    $xcrud2->set_var('nome_campo','id_'.$variavel.'');
    $xcrud2->set_var('accao','Inseriu');
    // logs e user
    $xcrud2->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud2->after_update('update_tabela'); // automatic call of functions.php
    
    //$xcrud->after_insert('prioridade_operacoes'); // automatic call of functions.php 
    //$xcrud->after_update('prioridade_operacoes_update'); // automatic call of functions.php 
    // column_callback
    //$xcrud->column_callback('quantidade','numero_format');
    $xcrud2->relation('id_of','ib_ofs','id_of','id_of','activo=1 and arquivo=0 and in_use=0');
    $xcrud2->relation('id_slot','ib_slots','id_slot','nome_slot','activo=1 and in_use=0','id_slot asc');


	// activar/desactivar
 	$xcrud2->column_callback('activo','estados_act');
  	$xcrud2->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud2->create_action('unpublish', 'unpublish_action');

  	// gravar dados no momento de criar 
  	$xcrud2->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud2->pass_var('criado_por', $user_id,'create');
    // gravar dados no momento do actualizar
    $xcrud2->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud2->pass_var('actualizado_por', $user_id,'edit');

    $xcrud2->set_attr('data_entrada',array('placeholder'=>'bla-bla-bla'));

    $xcrud2->pass_default('data_entrada',date('Y-m-d H:i:s'));

    // estes campos do criar e actualizar nao aparecem no editar nem no criar
    $xcrud2->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','data_saida'), true, true, 'edit');
    $xcrud2->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','data_saida'), true, true, 'create');
    
    echo $xcrud2->render('create');

?>
<script type="text/javascript">
window.onload = function(){ 
    jQuery(document).on("xcrudafterrequest",function(event,container){   
        if(jQuery(container).closest(".xcrud").prevAll(".xcrud").size()){
            Xcrud.reload(".xcrud:first");
        }
    });

}
</script>


<script type="text/javascript">
jQuery(document).on("xcrudafterrequest",function(event,container){
    if(Xcrud.current_task == 'save')
    {
        Xcrud.show_message(container,'Enviado com sucesso','success');
    }
});
</script>


<script type="text/javascript">

    var quantidade;

     $("a").click(function() {

        var id_slot = $('.linha_id_slot').find('select').val();
        var quantity_val = $('.linha_quantidade_registo').find('input').val(); 
        var OT = $('.linha_id_of').find('select').val();

        setTimeout(function(){

            $.ajax({
                dataType: 'json',
                url: "../backoffice/pages/slotshow.php",
                type: "POST",
                data: { "quantity_val": quantity_val, "OT" : OT },
                }).done(function(data){ 

                    location.reload();

                    var hide = data['hide'];
                    var slot = data['slot']; 

                if( slot == 1) {

                    $(".linha_id_slot option[value=" + id_slot +"]").remove();

                }
                if( hide == 1) {

                    $(".linha_id_of option[value=" + OT +"]").remove();

                }   
            });   
        }, 1000);    
    });

    $('.linha_id_of').find('select').on('change', function() { 

        var OT = this.value;

        if(OT == ''){
            $('#s2id_autogen7').find('table').empty();
        }

        $(".linha_quantidade_registo").find("input").attr({
            type : "number", 
            placeholder: "It must be less the value of Quantidate" 
        });

        $.ajax({
           dataType: 'json',
           url: "../backoffice/pages/idshow.php",
           type: "POST",
           data: { "OT": OT },
           }).done(function(data){ 
                var cliente = data['cliente'];
                var calibre = data['calibre'];
                var qualidade = data['qualidade'];
                    quantidade = data['quantidade'];
                var o_quantidade = data['o_quantidade'];
                var date = data['date']; 

            $('#s2id_autogen7').find('table').empty();
            $('#s2id_autogen7').append('<table class="xcrud-list table table-striped table-hover table-bordered"><thead><tr class="xcrud-th"><th>O.T</th><th>Cliente</th><th>Calibre</th><th>Qualidade</th><th>Quantidate</th><th>Original Quantidate</th><th>Data</th></tr></thead><tbody><tr><td>' + OT + '</td><td>' + cliente + '</td><td>' + calibre + '</td><td>' + qualidade + '</td><td>' + quantidade + '</td><td>' + o_quantidade + '</td><td>' + date + '</td></tr></tbody></table>');
            
                                  
            });

           $(".linha_quantidade_registo").find("input").on('input', function () {
           
                var value = $(this).val();
               
                if ((value !== '') && (value.indexOf('.') === -1)) {

                    $(this).val(Math.max(Math.min(value, quantidade), 0));
                }

            });
    }); 

</script>

