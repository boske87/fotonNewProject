<link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/redactor/redactor.css')}}" />
<script src="{{ asset('assets/admin/js/vendor/redactor/redactor.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#desc').redactor({
            buttons: ['html', 'formatting', 'bold', 'italic', 'underline', 'outdent', 'indent', 'alignment', 'unorderedlist', 'orderedlist', 'link'],
            buttonSource: true,
            formatting: ['p', 'h2', 'h3', 'h4', 'blockquote']
        });


    });
</script>

