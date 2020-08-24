<footer class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <p class="cashBack"></p>
                @push('bottom_js')
                    <script>
                        $(document).ready(function(){
                            var year = (new Date()).getFullYear();
                            $('.cashBack').text('©2017-' + year + ' Shopify');
                        });
                    </script>
                @endpush
            </div>
            <div class="col-sm-6 text-right">
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</footer>
