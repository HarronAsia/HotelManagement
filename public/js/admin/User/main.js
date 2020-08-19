$(document).ready(function() {
            src = "{{ route('admin.users','default')}}";
            $("#search_text").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            // response(data); it shows all array index 
                            // $('form').append('<h1>'+data+'</h1>'); it gives me (object Object ) for each record
                            // $('form').append('<h1>'+data.id+'</h1>'); it gives me undefined
                            // $('form').append('<h1>'+data['id']+'</h1>'); it gives me undefined
                            console.log(data[0].id)

                        }
                    });
                },
                minLength: 1,
            });