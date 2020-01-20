
<?php 
        if (!class_exists('Xcrud')) {
          include('../../config/xcrud/xcrud.php');
        }
        $db = Xcrud_db::get_instance();    
        $query = 'SELECT COUNT(id_template) AS num FROM docs_templates'; 
        $db->query($query);
        $result = $db->result();
        $countrow = $result[0]['num'];
        $query1 = 'SELECT docs_templates.id_template, docs_tiposdedocumentos.nome_tipodedocumento, docs_templates.versao_template
                   FROM docs_templates
                   INNER JOIN docs_tiposdedocumentos ON docs_templates.id_tipodedocumento = docs_tiposdedocumentos.id_tipodedocumento';
        $db->query($query1);
        $result1 = $db->result();

        $query2 = 'SELECT * FROM docs_produtos'; 
        $db->query($query2);
        $result2 = $db->result();
        $count_product = count($result2);

?>
 <div class="docgen row">
  <div class="col-md-4">
    <div class="data_list">
        <form id="target" action="../backoffice/Download.php" method="post">
            Document Type:
            <select class="js-example-basic-multiple xcrud-input form-control" id="select_tem">
                <option value="0">-selection-</option>
                <?php
                  if($countrow){
                  for ($i=0; $i < $countrow ; $i++) {
                  echo '
                    <option value='.$result1[$i]['id_template'].'>'.$result1[$i]['nome_tipodedocumento'].'-'.$result1[$i]['versao_template'].'</option>
                  ';
                }
              }
          ?>
            </select> <br>
            Input Method:
            <select class="js-example-basic-multiple xcrud-input form-control" id="select_method">
                <option value="0">-selection-</option>
                <option class="select_method" name="check_list" value="order" checked>In order</option>
                <option class="select_method" name="check_list" value="random">Random</option>
            </select>
            
            <div id="order">
              First ID:
              <select id="start_product" class="js-example-basic-multiple xcrud-input form-control" name="product_from">
                <option value="0">-selection-</option>
               <?php
                if($count_product){
                  for ($i=0; $i < $count_product ; $i++) {
                    echo '<option value='.$result2[$i]['id_produto'].'>'.$result2[$i]['id_produto'].'-'.$result2[$i]['nome_produto'].'</option>';
                  }
                }
                ?>
            </select>
            Last ID:
            <select id="end_product" class="js-example-basic-multiple xcrud-input form-control" name="product_to">
              <option value="0">-selection-</option>
               <?php
                if($count_product){
                  for ($i=0; $i < $count_product ; $i++) {
                    echo '<option value='.$result2[$i]['id_produto'].'>'.$result2[$i]['id_produto'].'-'.$result2[$i]['nome_produto'].'</option>';
                  }
                }
                ?>
            </select>
            </div>
            <div id="random">
              Random ID:
              <select id="multiple_product" class="js-example-basic-multiple xcrud-input form-control" name="states[]" multiple="multiple">
               <?php
                if($count_product){
                  for ($i=0; $i < $count_product ; $i++) {
                    echo '<option value='.$result2[$i]['id_produto'].'>'.$result2[$i]['id_produto'].'-'.$result2[$i]['nome_produto'].'</option>';
                  }
                }
                ?>
            </select>
            </div>
            <input type="text" name="" class="xcrud-input form-control dis_none" id="count_product"style value="<?php echo $count_product; ?>">
            <div class="row">
              <div class="col-xs-6">Total Products: <?php echo $count_product; ?></div>
            </div>
            
            <textarea  id="d_header" name="header" class="dis_none" ></textarea>
            <textarea id="d_content" name="content" class="dis_none" ></textarea>
            <textarea id="d_footer" name="footer" class="dis_none" ></textarea>
            <input type="text" name="template" class="dis_none" id="template_name">

    <div id="templateInput">
            
    </div>
    <button type="submit" id="btn_submit" class="xcrud-input form-control btn-success" onclick="download_file()">Generate Pdf</button>
    </form>
  </div>
  </div>
  <div class="col-md-8">
    
    <div class="data_view" style="overflow-y: scroll;height: 750px;">
      <div id="inlineIframe" style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px;'></div>
    </div>
      <p id="totalpage">Totalpages:</p>
     
  </div>
  <input type="text" name="" id="last_num" hidden>
 </div>
  <button type="button" id="show_modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>
 <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Success!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Your document has been generated and is being downloaded..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
 <style type="text/css">
  .docgen .form-control {
    margin-top: 15px;
  }
 </style>
 <script type="text/javascript">

  $(document).ready(function(){

    $("#produtos").attr("required",false);
    $("#random").addClass("view_property");
    $("#order").addClass("view_property");inlineIframe
    $("#inlineIframe").css("visibility", "hidden");     
   });

  $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
  });

 var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    var today = year + "-" + month + "-" + day;  
  $('#select_tem').on('change', function() { 
    var doc_type = $(this).val(); 
    if ( doc_type == '0') {
      $('.data_view').html('');
    }  

    $('#template_name').val($('#select_tem').children("option:selected").text());
 
        var OT = this.value;
        $.ajax({
           dataType: 'json',
           url: "pages/gestaodocs/ajax.php?getContent="+$(this).val(),
           type: "POST",
           data: { "OT": OT },
           })
        .done(function(data){ 
            var data = data['data']; 
                $('.data_view').html("<div id='inlineIframe' style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px;'></div>");
                $('#inlineIframe').html(data);

                if($('#inlineIframe').height()<710){
                  var setheight = $('#inlineIframe').height()-$('#header').height()-$('#contents').height()-90;
                  $('#footer').css('margin-top', setheight);
                }

                var str = data;
                var n = str.match(/<!-- pagebreak -->/gi);
                if(n == null){
                   addpage(1, str);
                  $('#totalpage').text('Totalpages: 1');
                } else{
                var n = n.length;
                var pagenumber = n+1;
                $('#totalpage').text('Totalpages: '+pagenumber);
                if (n > 0) {
                  var n = n + 1;
                  addpage(n, str);
                }
              }
           });

        $.ajax({
           dataType: 'json',
           url: "pages/gestaodocs/ajax.php?get="+$(this).val(),
           type: "POST",
           data: { "OT": OT },
           })
        .done(function(data){ 
            var number = data['number'];
            var data = data['data3'];
            
             $("#templateInput").html('');
                $("#templateInput").append(" <input type='date' class='xcrud-input form-control c_date' placeholder='date' required='true'>");
                   
                $(".c_date").attr("value", today);

              for (var i = 0; i < data.length; i++) {
                    
                  $("#templateInput").append(" <input type='text' id='"+data[i]+"'class='xcrud-input form-control var_list' placeholder='"+data[i]+"' required>");
              }
   
              $("#templateInput input").on("input",function(){

                var intext = $(this).val();
                var classname = $(this).attr("id");
                $(".appendedpage").find("."+$(this).attr("id")).html(intext);
                $("#inlineIframe").find("."+$(this).attr("id")).html(intext);        
                
              })
              $(".c_date").on("input",function(){                         
                var intext = $(this).val();
                $(".appendedpage").find(".create_date").html(intext);
                $("#inlineIframe").find(".create_date").html(intext);


              }) 
           });
        });

  $('#select_method').on('change', function() { 

    var select_val = $(this).val();
    if ( select_val === 'order' ) {
      $("#random").addClass("view_property");
      $("#order").removeClass("view_property");
      $('#multiple_product').val(null).trigger('change');

   } else if ( select_val === 'random' ) {
      
      $("#order").addClass("view_property");
      $("#random").removeClass("view_property");
      $("#start_product").val('0').trigger('change');
      $("#end_product").val('0').trigger('change');
   } 
  });

  $('#end_product').on('change', function() { 

    var start_to = $("#start_product").val();
    var end_to = $("#end_product").val();

    if( start_to > end_to ) {
      alert("Please select correct ID");
    }

  })
    function count() {

      var start_product = $("#start_product").val();
      var end_product = $("#end_product").val();
      if (start_product !== '' && end_product !== ''){
          var selected_nums = end_product-start_product+1;
          $('#selected_nums').text('Selected products: '+selected_nums);
      }
    }

    function download_file(){

        var a = $("#select_tem").val();
        var b = $("#select_method").val(); 
        var c = $("#start_product").val();
        var d = $("#end_product").val();
        var e = $("#multiple_product").val();
        if( a == "0") {
          alert("Please select document type")
          event.preventDefault();

        }
        else if( b == "0") {
          alert("Please select input method")
          event.preventDefault();
        }else if ( b == "random"){
          if ( e == null ){
            alert("Please input the options")
            event.preventDefault();
          }
          }
        else if( c == "0") {
          alert("Please select fist id")
          event.preventDefault();
        }
        else if ( d == "0") {
          alert("Please select last id")
          event.preventDefault();
        } else {
          console.log();
        }

        $("#d_content").val($("#contents").html());     
        $("#d_header").val($('#header').html());
        $("#d_footer").val($('#footer1').html());

    }

    $( "#target" ).submit(function( event ) {

        $("#show_modal").trigger("click");

    })

    function addpage(n, str){
      var addpagecontent = $('#inlineIframe').html();
      if ( n != 1) {
        for (var i = 0; i < n; i++) {
          var p_content = $('#contents').html().split("<!-- pagebreak -->");
      
          $('.data_view').append("<div class='gap'></div><div class='appendedpage' id='inlineIframe"+i+"' style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px; margin: 0 auto;''>"+addpagecontent+"</div>");
          var frameid = "#inlineIframe"+i;
          var pageheader = '<table id="header" style="width:100%"><tr><td style="width:25%">Document Title</td><td style="width:50%;text-align:center">header</td><td style="text-align:right;width25%">{PAGENO}</td></tr></table>';
          var pagecontent = '<div  style="height:580px" id="contents'+i+'">'+p_content[i]+'</div>';
          var pagefooter = '<table id="footer'+i+'" style="width:100%;font-size:80%!important"><thead style="text-align: center"><tr style="border-bottom: 1px solid #000"> <td style="width:33.3333%">Morada</td><td style="width:33.3333%">Contactos</td><td style="width:33.3333%">Informação</td> </tr> </thead> <tbody> <tr><td>Apartado 123</td> <td>Tel.: 000 000 000 e/o 111 111 111</td> <td>NIFº: 504 975 226</td> </tr>  <tr> <td>Fully Address</td><td>Fax: 222 222 222</td><td>Capital Social: 500.000 €uros</td></tr><tr><td>Portugal</td><td>E-mail: xpto@domain.lt</td><td>onservatória do Registo Comercial de Lisboa, sob o nº 999</td></tr><br> <tr><td>Produto: {nome_produto}</td><td>Documento valido até próxima atualização</td><td style="text-align:right">Página: {PAGENO} de {nb}</td></tr></tbody></table>';
          $(frameid).html(pageheader+pagecontent+pagefooter);
          var divname = $('.data_view:last-child() div').attr('id');

          var aaa = "#inlineIframe"+i;
          var contentid = '#contents'+i;
          if ($('#contents').height()>700) {
            $(contentid).css('overflow-y','scroll');
            $('#inlineIframe').css('display', 'none');
            $('#totalpage').append('<p style="color:#f00"><strong>Please Edit This Teplate Again! Text is too long. Use Pagebreak!</strong></p>');
          }
          $('#inlineIframe').css('display', 'none');
          $(".appendedpage .create_date").html(today);
          $("#inlineIframe .create_date").html(today);

          var setheight = $(aaa).height()-$('#header').height()-$('#contents'+i).height()-90; 
          $('#footer'+i).css('margin-top', setheight);

          } 
        } else{
            $('#inlineIframe').css('display', 'none');
            var p_content = $('#contents').html();
            $('.data_view').append("<div class='gap'></div><div class='appendedpage' id='inlineIframe1' style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px; margin: 0 auto;''>"+addpagecontent+"</div>");
              var pageheader = '<table id="header" style="width:100%"><tr><td style="width:25%">Document Title</td><td style="width:50%;text-align:center">header</td><td style="text-align:right;width25%">{PAGENO}</td></tr></table>';
              var pagecontent = '<div style="height:580px;" id="contents">'+p_content+'</div>';
              var pagefooter = '<table id="footer1" style="width:100%;font-size:80%!important"><thead style="text-align: center"><tr style="border-bottom: 1px solid #000"> <td style="width:33.3333%">Morada</td><td style="width:33.3333%">Contactos</td><td style="width:33.3333%">Informação</td> </tr> </thead> <tbody> <tr><td>Apartado 123</td> <td>Tel.: 000 000 000 e/o 111 111 111</td> <td>NIFº: 504 975 226</td> </tr>  <tr> <td>Fully Address</td><td>Fax: 222 222 222</td><td>Capital Social: 500.000 €uros</td></tr><tr><td>Portugal</td><td>E-mail: xpto@domain.lt</td><td>onservatória do Registo Comercial de Lisboa, sob o nº 999</td></tr><br> <tr><td>Produto: {nome_produto}</td><td>Documento valido até próxima atualização</td><td style="text-align:right">Página: {PAGENO} de {nb}</td></tr></tbody></table>';
              $("#inlineIframe1").html(pageheader+pagecontent+pagefooter);
              var divname = $('.data_view:last-child() div').attr('id');

              $(".appendedpage .create_date").html(today);
              $("#inlineIframe1 .create_date").html(today);

              var setheight = $("#inlineIframe1").height()-$('#header').height()-580-90;
              $('#footer1').css('margin-top', setheight);
        }
      }
 </script>
 <style>
  .docgen {
    margin-top: 25px;
  }
  .data_list {

      padding: 15px 15px 30px 15px;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 
       0 2px 10px 0 rgba(0, 0, 0, 0.12);
  }

  .data_view {
        padding: 0px;
        box-shadow: 0 5px 5px 5px rgba(0, 0, 0, 0.16), 
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
  }

  .js-example-basic-multiple {
    margin-bottom: 15px;
  }
  .dis_none {
    display: none;
  }
  .gap{
    height: 20px;
  }
  .data_view{
    font-size: 65%!important;
    background: #e6e6e6;
  }
  #footer{
    font-size: 90%!important;
  }
  #header{
    border-bottom: 1px solid #000;
    margin-bottom: 10px;
  }
  .data_view span {
    background: yellow;
  }

  .view_property {
    display: none;
  }

  #show_modal {
    display: none;
  }
 </style>