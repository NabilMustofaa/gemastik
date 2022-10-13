$(document).ready(function(){
    $('#aggrement').click(function(){
        var modal = $('#aggrementModal');
        modal.removeClass('hidden opacity-0');
        modal.addClass('opacity-100');
        $('#cancelAggrement').click(function(){
            modal.removeClass('opacity-100');
            modal.addClass('hidden opacity-0');
        });
    });
    $('#counterButton').click(function(){
        console.log('counter');
        var modal=$('#aggrementUpdateModal');
        modal.removeClass('hidden opacity-0');
        modal.addClass('opacity-100');
        $('#cancelAggrement').click(function(){
            modal.removeClass('opacity-100');
            modal.addClass('hidden opacity-0');
        });
    });
  });


// Language: javascript

// Path: public\js\chat.js


  