$(document).ready(function(){
    // Basic
    if($("select")) 
    {
        $("select").select2({
            language: 'es',
            theme: "bootstrap-5",
            styles: {
                fontSize: '10px'
            }
        });
    }

    // Small using Select2 properties
    if($("#form-select-sm")) 
    {
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--small", // For Select2 v4.0
            selectionCssClass: "select2--small", // For Select2 v4.1
            dropdownCssClass: "select2--small",
        });
    }
    

    // Small using Bootstrap 5 classes
    if($('#form-select-sm')) 
    {
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#form-select-sm").parent(), // Required for dropdown styling
        });    
    }

    // Large using Select2 properties
    if($('[select2]')) 
    {
        $("[select2]").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--large", // For Select2 v4.0
            selectionCssClass: "select2--large", // For Select2 v4.1
            dropdownCssClass: "select2--large",
        });  
    }
   

    // Large using Bootstrap 5 classes
    if($('#form-select-lg')) 
    {
        $("#form-select-lg").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#form-select-lg").parent(), // Required for dropdown styling
        }); 
    }
    
});

// ------------------------------------------------------- //
//   Inject SVG Sprite - 
//   see more here 
//   https://css-tricks.com/ajaxing-svg-sprite/
// ------------------------------------------------------ //
function injectSvgSprite(path) 
{
  	var ajax = new XMLHttpRequest();
  	ajax.open("GET", path, true);
  	ajax.send();
    
  	ajax.onload = function(e) 
    {
      	var div = document.createElement("div");
      	div.className = 'd-none';
      	div.innerHTML = ajax.responseText;
      	document.body.insertBefore(div, document.body.childNodes[0]);
    }
}

// this is set to BootstrapTemple website as you cannot 
// inject local SVG sprite (using only 'icons/orion-svg-sprite.57a86639.svg' path)
// while using file:// protocol
// pls don't forget to change to your domain :)
injectSvgSprite('https://demo.bootstrapious.com/bubbly/1-0/icons/orion-svg-sprite.57a86639.svg');

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
});

function digito_verificador(ruc, baseMax = 11)
{
    ruc = typeof ruc === 'string' ? ruc : ruc.toString();
    var resultado = 0;
    var index = 0;
    for (var rucIndex = ruc.length - 1; rucIndex >= 0; rucIndex--) {
        resultado += parseInt(ruc[rucIndex]) * (index + 2);
        var r = resultado % baseMax;
        index++;
    };
    var verificador = r > 1 ? baseMax - r : 0;
    return verificador;
}

function redirect(url) 
{
    document.location.href = url;

    return false;
}


Prism.plugins.NormalizeWhitespace.setDefaults({
    'remove-trailing': true,
    'remove-indent': true,
    'left-trim': true,
    'right-trim': true,
});

$('.active').attr("aria-expanded","true");

function ValidationsMessages(messages)
{
    $.each(messages, function(field, message){
        $('input[name='+field+']').addClass("is-invalid");
        $('input[name='+field+']').after('<div class="text-danger">'+message[0]+'</div>');
    });
}