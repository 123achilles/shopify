<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>--}}

<script type="text/javascript" src="{{asset('js/fontawesome.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/a076d05399.js')}}"></script>

<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

<script src="{{ asset('js/app.js') }}" defer></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

<!-- Main File-->
<script type="text/javascript">
    $(window).ready(function() {
        if (!isNaN(parseInt($('.disable-to-check').val()))) {
            console.log($('.disable-to-check').val());
            $('#isRequired').attr('disabled', true);
            $('#isUnique').attr('disabled', true);
        }
    });
    $('.disable-to-check').on('change', function(e) {
        if (!isNaN(parseInt($('.disable-to-check').val()))) {
            $('#isRequired').attr('disabled', true);
            $('#isUnique').attr('disabled', true);
        } else {
            $('#isRequired').removeAttr('disabled');
            $('#isUnique').removeAttr('disabled');
        }
    });

    $('form.delete-form').submit(function() {
        let msg = $(this).children('button').attr('message');
        if (confirm(msg)) {
            return true;
        }
        return false;
    });

</script>

@stack('bottom_js')
