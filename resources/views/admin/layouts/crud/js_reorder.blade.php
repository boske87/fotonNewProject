<script src="{{ asset('assets/admin/js/vendor/jquery/jquery.tablednd.js') }}"></script>
<script>

    var order;
    var tableName = $('#tableName').text();

    // reordering
    $('#sortable-table').tableDnD({
        onDragClass: 'dragged',
        scrollAmount: '20',
        onDrop: function() {
            order = $.tableDnD.reorder();
            console.log(order);
            $('.fnc-reordering-save').addClass('changed');
        }
    });

    function removeURLParameter(url, parameter) {
        //prefer to use l.search if you have a location/link object
        var urlparts= url.split('?');
        if (urlparts.length>=2) {

            var prefix= encodeURIComponent(parameter)+'=';
            var pars= urlparts[1].split(/[&;]/g);

            //reverse iteration as may be destructive
            for (var i= pars.length; i-- > 0;) {
                //idiom for string.startsWith
                if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                    pars.splice(i, 1);
                }
            }

            url= urlparts[0]+'?'+pars.join('&');
            return url;
        } else {
            return url;
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // save
    $('.fnc-reordering-save').click(function() {
        var return_url = removeURLParameter('{!! Request::fullUrl() !!}' , 'reorder_mode');
        if ($(this).hasClass('changed')) { // save
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/reorderSave') }}/" + tableName,
                data: "order=" + order + ";url={{  Request::fullUrl() }}",
                beforeSend: function() {
                    $(this).addClass('disabled');
                },
                success: function() {
                    window.location.href = return_url;
                }
            });
        } else { // go back
            window.location.href = return_url;
        }
        return false;
    });

     // close
    $('.fnc-reordering-close').click(function() {
        var return_url = removeURLParameter('{!! Request::fullUrl() !!}' , 'reorder_mode');
        window.location.href = return_url;
    });
</script>
