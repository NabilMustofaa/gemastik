// function addCategory(){
//     console.log("addCategory");
//     var category = document.getElementById("category").value;
//     console.log(category);
//     var span = document.createElement("span");
//     span.className = "items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit";
//     span.innerHTML = category;
//     var label= document.getElementById("categoryLabel");
//     label.appendChild(span);

// }

$(document).ready(function(){
    var total=$('#totalCategory');
    // category
    $('#category').on('keypress', function(e) {
        var keyCode = e.keyCode ;
        if (keyCode === 13) { 
            e.preventDefault();
            var category  = $('#category').val();
            //send api with value category
            var url = 'http://127.0.0.1:8000/api/category';
            $.ajax({
                url: url,
                type: 'POST',
                data: { 
                    'name': category,
                    'emojiCode': '1f600',
                },
            }).done(function(data){
                $('#categoryLabel').append('<span class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit">'+data.category.name+'</span>');
                $('#categoryLabel').append('<input type="hidden" class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit" name="category'+total.val()+'" value="'+data.category.id+'">');
                total.val(parseInt(total.val())+1);
            }).fail(function(data){
                console.log(url+'/'+category);
                $.ajax({
                    url: url+'/'+category,
                    type: 'GET',
                }).done(function(data){
                    console.log(data);
                    $('#categoryLabel').append('<span class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit">'+data.category.name+'</span>');
                    $('#categoryLabel').append('<input type="hidden" class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit" name="category'+total.val()+'" value="'+data.category.id+'">');
                    total.val(parseInt(total.val())+1);
                });
            });
        };
        
        category.value = "";
        console.log(category);
    });
    $('#categoryButton').click(function(){
        var category  = $('#category').val();
        //send api with value category
        var url = 'http://127.0.0.1:8000/api/category';
        $.ajax({
            url: url,
            type: 'POST',
            data: { 
                'name': category,
                'emojiCode': '1f600',
            },
        }).done(function(data){
            console.log(data);
            $('#categoryLabel').append('<span class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit">'+data.category.name+'</span>');
            $('#categoryLabel').append('<input type="hidden" class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit" name="category'+total.val()+'" value="'+data.category.id+'">');
            total.val(parseInt(total.val())+1);
        }).fail(function(data){
            console.log(url+'/'+category);
                $.ajax({
                    url: url+'/'+category,
                    type: 'GET',
                }).done(function(data){
                    console.log(data);
                    $('#categoryLabel').append('<span class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit">'+data.category.name+'</span>');
                    $('#categoryLabel').append('<input type="hidden" class="items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit" name="category'+total.val()+'" value="'+data.category.id+'">');
                    total.val(parseInt(total.val())+1);
                });
        });
        category.value = "";
        console.log(category);
    });


});