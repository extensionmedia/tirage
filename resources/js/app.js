require('./bootstrap');

$(document).ready(function(){
    $(document).on('keypress', '.this_number', function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            var idx = $('.this_number').index(this);
            if (idx == $('.this_number').length - 1) {
                $('.this_number')[0].select()
            } else {
                $('.this_number')[idx + 1].focus(); //  handles submit buttons
                $('.this_number')[idx + 1].select();
            }
            return false;
            
        }
    });

    $('.resultat').on('click', function(){

        var tirage = 0;
        var number = 0;
        $('.this_tirage').each(function(){
            tirage = parseInt( $(this).text() );
            if(!$(this).hasClass('is_c')){
                $('.this_number').each(function(){

                    number = parseInt( $(this).val() );
                    if(number > 0){
                        if(number == tirage){
                            $(this).addClass('bg-red-600');
                        }
                        
                    }
                });
            }
        });
    });
});
