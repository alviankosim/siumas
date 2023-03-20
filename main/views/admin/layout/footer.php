</div>
</div>
<footer class="footer">
    <div>SIUMAS - Aplikasi Iuran Masyarakat © 2023 SIUMAS DEV.</div>
    <div class="ms-auto d-none d-md-block">Powered by&nbsp; SIUMAS DEV</div>
</footer>
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $('.select2remote').each(function() {
            const that = $(this);
            that.select2({
                theme: 'bootstrap4',
                delay: 250,
                placeholder: that.data('select2placeholder'),
                ajax: {
                    url: that.data('select2url'),
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            ...params,
                            ...that.data('addparam')
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function(data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: data.results
                        };
                    }
                },
                minimumInputLength: 3
            })
        });
    });
</script>

</body>

</html>