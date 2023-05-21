<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réservation de bateaux en ligne</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-5">
    <h1 class="text-center font-bold text-3xl mb-5">Réservation de bateaux en ligne</h1>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="reservation-form" action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="p-4">
                <!-- Accordion Item #1 -->
                <div class="mb-2">
                    <h2 class="mb-1 text-xl">Accordion Item #1</h2>
                    <div class="border rounded p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="departure_port" class="font-bold mb-1 block">Port de départ</label>
                                <select id="departure_port" class="form-select block w-full rounded-md" name="departure_port" required>
                                    <option value="{{$port_depart}}">{{$port_depart}}</option>
                                </select>
                            </div>
                            <div>
                                <label for="arrival_port" class="font-bold mb-1 block">Port d'arrivée</label>
                                <select id="arrival_port" class="form-select block w-full rounded-md" name="arrival_port" required>
                                    <option value="{{$port_arrivee}}">{{$port_arrivee}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion Item #2 -->
                <div class="mb-2">
                    <h2 class="mb-1 text-xl">Accordion Item #2</h2>
                    <div class="border rounded p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="departure_date" class="font-bold mb-1 block">Date de départ</label>
                                <input type="date" class="form-input block w-full rounded-md" id="departure_date" name="departure_date" required>
                            </div>
                            <div>
                                <label for="arrival_date" class="font-bold mb-1 block">Date de retour</label>
                                <input type="date" class="form-input block w-full rounded-md" id="arrival_date" name="arrival_date" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion Item #3 -->
                <div id="boat-select-div" style="display: none;">
                    <h2 class="mb-1 text-xl">Accordion Item #3</h2>
                    <div class="border rounded p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="boat_id" class="font-bold mb-1 block">Choix du bateau</label>
                                <select id="boat_id" class="form-select block w-full rounded-md" name="boat_id" required>
                                    <option value="">Sélectionnez un bateau</option>
                                </select>
                            </div>
                            <div id="extra_boat_select_div">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion Item #4 -->
                <div id="info-personne">
                    <h2 class="mb-1 text-xl">Accordion Item #4</h2>
                    <div class="border rounded p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="reservation_nom" class="font-bold mb-1 block">nom pour la reservation</label>
                                <input id="reservation_nom" type="text" class="form-input block w-full rounded-md" name="reservation_nom" required>
                            </div>
                            <div>
                                <label for="reservation_adresse" class="font-bold mb-1 block">adresse pour la reservation</label>
                                <input id="reservation_adresse" type="text" class="form-input block w-full rounded-md" name="reservation_adresse" required>
                            </div>
                            <div>
                                <label for="reservation_codepostal" class="font-bold mb-1 block">Code Postal pour la reservation</label>
                                <input id="reservation_codepostal" type="text" class="form-input block w-full rounded-md" name="reservation_codepostal" required>
                            </div>
                            <div>
                                <label for="reservation_ville" class="font-bold mb-1 block">ville pour la reservation</label>
                                <input id="reservation_ville" type="text" class="form-input block w-full rounded-md" name="reservation_ville" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion Item #5 -->
                <div id="people-num-div">
                    <h2 class="mb-1 text-xl">Nombre de personnes</h2>
                    <div class="border rounded p-4">
                        <div>
                            <label for="num_people" class="font-bold mb-1 block">Nombre de personnes</label>
                            <input id="num_people" type="number" class="form-input block w-full rounded-md" name="num_people" required>
                        </div>
                    </div>
                </div>
                <div id="people-info-container">
                    <!-- Dynamically generated people info will go here -->
                </div>

            </div>
            <div class="p-4 border-t">
                <button id="submit-button" type="submit" style="display: none;" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Réserver</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {

        // Cachez la liste des bateaux au début
        $("#info-personne").hide();
        $("#boat-select-div").hide();
        $("#submit-button").hide();
        // Écoutez les changements de valeur dans les champs de date
        $("#departure_date, #arrival_date").on("change", function() {
            // Vérifiez si les deux dates sont sélectionnées
            if ($("#departure_date").val() && $("#arrival_date").val()) {
                // Affichez la liste des bateaux
                $("#boat-select-div").show();
                $("#info-personne").show();
                // Récupérez les bateaux disponibles
                fetchAvailableBoats($("#departure_date").val(), $("#arrival_date").val(), $("#departure_port").val(), $("#arrival_port").val());
                $("#submit-button").show();
            } else {
                // Cachez la liste des bateaux si l'une des dates n'est pas sélectionnée
                $("#boat-select-div").hide();
                $("#submit-button").hide();
                $("#info-personne").hide();
            }
        });
    });

    function fetchAvailableBoats(departure_date, arrival_date, departure_port, arrival_port) {
        $.ajax({
            url: "{{ route('reservations.getAvailableBoats') }}",
            type: 'GET',
            dataType: 'json',
            data: {
                departure_date: departure_date,
                arrival_date: arrival_date,
                departure_port : departure_port,
                arrival_port : arrival_port,
            },
            success: function (data) {
                // Mettez à jour les options de votre champ <select>
                var boat_select = $('#boat_id');
                boat_select.empty();
                boat_select.append('<option value="">Sélectionnez un bateau</option>');
                $.each(data, function (index, available_boats) {
                    var option = '<option value="' + available_boats.id + '">' + available_boats.bateau + ' ' + available_boats.heure + '</option>';
                    boat_select.append(option);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error fetching available boats:', textStatus, errorThrown);
            },
        });
    }

    $('#num_people').on('change', function() {
        let numPeople = $(this).val();
        $('#people-info-container').html(''); // Clear the container

        // Fetch the types of people
        fetchPeopleTypes().then((types) => {
            for (let i = 0; i < numPeople; i++) {
                let personInfoHtml = `
                        <div class="mb-2">
                            <h2 class="mb-1 text-xl">Personne #${i+1}</h2>
                            <div class="border rounded p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="person_${i+1}_name" class="font-bold mb-1 block">Nom</label>
                                        <input id="person_${i+1}_name" type="text" class="form-input block w-full rounded-md" name="person_${i+1}_name" required>
                                    </div>
                                    <div>
                                        <label for="person_${i+1}_type" class="font-bold mb-1 block">Type</label>
                                        <select id="person_${i+1}_type" class="form-select block w-full rounded-md" name="person_${i+1}_type" required>
                                            <option value="">Sélectionnez un type</option>
                                            ${types.map(type => `<option value="${type.libelle}">${type.libelle}</option>`).join('')}
                                        </select>
                                    </div>
                                    <div>
                                        <label for="person_${i+1}_address" class="font-bold mb-1 block">Adresse</label>
                                        <input id="person_${i+1}_address" type="text" class="form-input block w-full rounded-md" name="person_${i+1}_address" required>
                                    </div>
                                    <div>
                                        <label for="person_${i+1}_zip" class="font-bold mb-1 block">Code postal</label>
                                        <input id="person_${i+1}_zip" type="text" class="form-input block w-full rounded-md" name="person_${i+1}_zip" required>
                                    </div>
                                    <div>
                                        <label for="person_${i+1}_city" class="font-bold mb-1 block">Ville</label>
                                        <input id="person_${i+1}_city" type="text" class="form-input block w-full rounded-md" name="person_${i+1}_city" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                $('#people-info-container').append(personInfoHtml);
            }
        });
    });

    async function fetchPeopleTypes() {
        let response = await $.ajax({
            url: "{{ route('peopleTypes') }}",
            type: 'GET',
            dataType: 'json',
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error fetching people types:', textStatus, errorThrown);
            },
        });

        return response;
    }

</script>
</body>
</html>
