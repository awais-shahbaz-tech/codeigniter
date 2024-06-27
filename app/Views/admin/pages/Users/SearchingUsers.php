<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Records</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <div class="container mt-4">

                            <div class="form-group mb-3">
                                <h3 class="mb-3"> Find Users with Address or Location</h3>
                                <input type="text" name="autocomplete" id="autocomplete" class="form-control"
                                    placeholder="Choose Location">
                            </div>

                    



                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>Location</th>

                                    <!-- <th>Completion</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php if($users){
                        foreach($users as $user){

                    ?>
                                <tr>
                                    <td><?php echo $user["username"]; ?></td>
                                    <td><span class="location-name" data-lat="<?php echo $user["latitude"]; ?>" data-lng="<?php echo $user["longitude"]; ?>"></span></td>

                                    <!-- <td>37%</td> -->
                                </tr>

                                <?php    
                     }
                    }?>
                            </tbody>

                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAe9eq-RqIW3qMy8I8UJ5vjis9iilcSYik&libraries=places&callback=initAutocomplete"></script>
<script>
$(document).ready(function() {
    $("#latitudeArea").addClass("d-none");
    $("#longtitudeArea").addClass("d-none");
});

google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // No geometry means the user hasn't selected a suggestion
            return;
        }

        var latitude = place.geometry['location'].lat();
        var longitude = place.geometry['location'].lng();
        window.location.href = "<?php echo base_url();?>admin/searchingusers/" + latitude + "/" + longitude;

        $("#latitudeArea").removeClass("d-none");
        $("#longtitudeArea").removeClass("d-none");
    });

    // Custom event for Enter key press 
    google.maps.event.addDomListener(input, 'keydown', function(e) {
        if (e.keyCode === 13) { // Enter key code
            e.preventDefault(); // Prevent form submission

            var firstPredictionService = new google.maps.places.AutocompleteService();
            firstPredictionService.getPlacePredictions({ input: input.value }, function(predictions, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK && predictions.length > 0) {
                    var firstPrediction = predictions[0];
                    var placesService = new google.maps.places.PlacesService(document.createElement('div'));
                    placesService.getDetails({ placeId: firstPrediction.place_id }, function(place, status) {
                        if (status === google.maps.places.PlacesServiceStatus.OK) {
                            var latitude = place.geometry.location.lat();
                            var longitude = place.geometry.location.lng();
                            window.location.href = "<?php echo base_url();?>admin/searchingusers/" + latitude + "/" + longitude;
                        }
                    });
                }
            });
        }
    });
}
</script>

