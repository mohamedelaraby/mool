@push('script')
<script type="text/javascript">

    // If country is change then select country
    $(document).ready(function(){
        @if(old('country_id'))
        $.ajax({
                    // request url
                    url:'{{ admin_url('states/create') }}',
                    type:'get',
                    dataType:'html',
                    data:{country_id:'{{ old('country_id') }}',select:'{{ old('city_id') }}'},
                    success: function(data){
                        // get city data as html type
                        $('.city').html(data);
                    }

                });
        @endif
        $(document).on('change','.country_id',function(){

            // Get country selected option
            var  country = $('.country_id option:selected').val();
            if(country > 0){
                $.ajax({
                    // request url
                    url:'{{ admin_url('states/create') }}',
                    type:'get',
                    dataType:'html',
                    data:{country_id:country,select:''},
                    success: function(data){
                        // get city data as html type
                        $('.city').html(data);
                    }

                });
            }
        });
    });


    // If country val > 0 then get country data into states form then display city data also
</script>

@endpush
