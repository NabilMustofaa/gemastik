{/* <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-zinc-100 hover:text-gray-900" role="menuitem">{{$category->name}}</a> */}
$(document).ready(function(){
    $('#profile').mouseenter(function () { 
        var modal = $('#profileModal');
        modal.removeClass('opacity-0 -z-10');
        modal.addClass('opacity-100 z-10');
        $('#profileModalContent').mouseleave(function () { 
            modal.removeClass('opacity-100 z-10');
            modal.addClass('opacity-0 -z-10');
        });
    });
    
    $('#categoryNav').mouseenter(function () { 
        
        var dropdown = $('#categoryDropdown');
        console.log(dropdown);
        dropdown.removeClass('opacity-0 -z-10');
        dropdown.addClass('opacity-100 z-10');
        $('#categoryDropdownContent').mouseleave(function () { 
            dropdown.removeClass('opacity-100 z-10');
            dropdown.addClass('opacity-0 -z-10');
        });
    });
    $('#searchBar').on('keyup', function(){
        $('#searchDropdownContent').empty();
        console.log('searching');
        var value = $(this).val();
        $(this).addClass('z-20') ;
        $('#searchDropdown').removeClass('opacity-0 -z-10');

        $('#searchDropdown').addClass('opacity-100 z-10');
        $.ajax({
            type : 'get',
            url : 'http://127.0.0.1:8000/api/search/'+value,

        }).done(function(data){
            if (data == null) {
                $('#searchDropdownContent').append('No results found');
            }
            else{
            data.forEach(result => {
                console.log(result);
                $('#searchDropdownContent').append('<a href="/category/'+result.value+'" class="block px-4 py-2 text-sm text-gray-700 hover:bg-zinc-100 hover:text-gray-900" role="menuitem">'+result.label+'</a>');
                
            });
            }
        });
        if(value == ''){
            $('#searchDropdown').removeClass('opacity-100 z-10');
            $('#searchDropdown').addClass('opacity-0 -z-10');
            $(this).removeClass('z-20') ;
        }
    });

    $('#LoginButton').click(function () {
        var modal = $('#loginModal');
        modal.removeClass('opacity-0 -z-10');
        modal.addClass('opacity-100 z-10');
        $('#cancelButton').click(function () { 
            modal.removeClass('opacity-100 z-10');
            modal.addClass('opacity-0 -z-10');
        });
        $('#registerButton').click(function () { 
            modal.removeClass('opacity-100 z-10');
            modal.addClass('opacity-0 -z-10');
            $('#signupModal').removeClass('opacity-0 -z-10');
            $('#signupModal').addClass('opacity-100 z-10');
            $('#loginButtonModal').click(function () {
                $('#signupModal').removeClass('opacity-100 z-10');
                $('#signupModal').addClass('opacity-0 -z-10');
                modal.removeClass('opacity-0 -z-10');
                modal.addClass('opacity-100 z-10');
            });
            $('#cancelButtonSignup').click(function () {
                console.log('cancel');
                $('#signupModal').removeClass('opacity-100 z-10');
                $('#signupModal').addClass('opacity-0 -z-10');
            });

        });
    });

    $('#chatButton').click(function () {
        var modal = $('#chatModal');
        
        modal.removeClass('opacity-0 -z-10');
        modal.addClass('opacity-100 z-10');
        $('#cancelButtonChat').click(function () { 
            modal.removeClass('opacity-100 z-10');
            modal.addClass('opacity-0 -z-10');
        });
    });

    
  });