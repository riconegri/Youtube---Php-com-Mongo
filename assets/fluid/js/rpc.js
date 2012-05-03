function rpc(tipo,valor,title){
    this.url = Path.app + "rpc";
    this.error = false;
    this.reply = false;
    this.valor = valor;
    this.title = false;
    this.tipo = tipo;
    
    switch(tipo)
    {
        case 'search':
            this.flat = 'videos.buscas.keywords';
            break;
        case 'visualizados':
            this.flat = 'videos.visualizados';
            break;
        default:
            return false;
            break;
    }
    
    this.ajx = function(){
        if(this.tipo && this.flat && this.valor){
            $.ajax({
                type: "POST",
                url: this.url,
                data: {
                    tipo: this.tipo,
                    flat: this.flat,
                    value: this.valor,
                    title: this.title
                }
            }).done(function(reply) {
                return 'ok';
            }).fail(function(jqXHR, textStatus) {
                alert( 'Problema na sua conexão, de um f5: ' + textStatus );
            });
        }

    }
    
    html = function(){
        var tipos = {
            'search': '<a href="javascript::makeRequest("search","'+this.valor+'")" class="label label-success">'+this.valor+'</a>'
        };
        $('#termos_'+ this.valor).append(tipos[this.tipo]);
    }
}