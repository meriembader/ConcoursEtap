<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('dashboard/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('dashboard/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('dashboard/js/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('dashboard/js/sb-admin-2.min.js')}}"></script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script>
    $('.showModal').on('click', function () {
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: '{{route('getClotureDates')}}',
            success: function (data) {
                console.log(data.dates[0].date_cloture);
                $('.date_cloture').val(data.dates[0].date_cloture);
                $('.date_cloture_2').val(data.dates[1].date_cloture);
                $('.date_cloture_3').val(data.dates[2].date_cloture);
            },
            error: function () {
                console.log(data);
            }
        });
    });

    $('.save_dates').on('click', function () {
        $.ajax({
            method: 'GET',
            url: '{{route('SaveDates')}}',
            data: {
                'date_1': $('.date_cloture').val(),
                'date_2': $('.date_cloture_2').val(),
                'date_3': $('.date_cloture_3').val(),
            },
            dataType: "json"
        })
            .done(function (data) {

                $('#exampleModalCenter').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Bien !',
                    text: 'les dates sont enregistrées',
                })
            });
    });
</script>
</html>
