<!DOCTYPE html>
<html>
<head>
    <title>Country and City Selection</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h2>Select a Country</h2>
    <form id="country-form">
        <select name="country" id="country-select">
            <option value="">Select a country</option>
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country->id ?>"><?= $country->name ?></option>
            <?php endforeach; ?>
        </select>
    </form>

    <h2>Select a City</h2>
    <form id="city-form">
        <select name="city" id="city-select">
            <option value="">Select a city</option>
        </select>
    </form>

    <script>
        $(document).ready(function() {
            $('#country-select').change(function() {
                const countryId = $(this).val();
                $('#city-select').html('<option value="">Select a city</option>'); // Clear the city select

                if (countryId) {
                    $.ajax({
                        url: '<?= base_url('/location/get_cities') ?>', // URL to your controller function
                        type: 'post',
                        data: { country_id: countryId },
                        dataType: 'json',
                        success: function(response) {
                            if (response.cities) {
                                $.each(response.cities, function(key, value) {
                                    $('#city-select').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
