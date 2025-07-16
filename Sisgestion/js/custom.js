window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
}
window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
    })
}
window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}