<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">
<div class="container mx-auto my-3">
    <h1 class="text-3xl text-center font-bold mb-8">Réservation de bateaux en ligne</h1>
    <div class="max-w-7xl mx-auto bg-white rounded-md overflow-hidden shadow-md px-6 py-8 mt-12">
        <form id="reservation-form" action="{{ route('recapitulatif') }}" method="GET">
            @csrf
            <div id="accordionExample">
                <div class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                    <h2 class="mb-0" id="headingOne">
                        <button
                            class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                            type="button" data-te-collapse-init data-te-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                            <span
                                class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                      </svg>
                    </span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="!visible" data-te-collapse-item data-te-collapse-show aria-labelledby="headingOne" data-te-parent="#accordionExample">
                        <div class="px-5 py-4">
                            <div class="flex flex-row gap-12">
                                <div class="mb-4">
                                    <label for="departure_port" class="block text-gray-700 font-bold mb-2">Port de départ</label>
                                    <select id="departure_port" class="form-select rounded-md shadow-sm block w-full" name="departure_port" required>
                                        <option value="{{$port_depart}}">{{$port_depart}}</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="arrival_port"  class="block text-gray-700 font-bold mb-2">Port d'arrivée</label>
                                    <select id="arrival_port" class="form-select rounded-md shadow-sm block w-full" name="arrival_port" required>
                                        <option value="{{$port_arrivee}}">{{$port_arrivee}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                    <h2 class="mb-0" id="headingTwo">
                        <button
                            class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                            type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                            <span
                                class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                      </svg>
                    </span>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="!visible hidden" data-te-collapse-item aria-labelledby="headingTwo" data-te-parent="#accordionExample">
                        <div class="px-5 py-4">
                            <div class="flex flex-row gap-12">
                                <div class="mb-4">
                                    <label for="departure_date" class="block text-gray-700 font-bold mb-2">Date de départ</label>
                                    <input type="date" class="form-input rounded-md shadow-sm block w-full" id="departure_date" name="departure_date" required>
                                </div>

                                <div class="mb-4">
                                    <label for="arrival_date"  class="block text-gray-700 font-bold mb-2">Date d'arrivée</label>
                                    <input type="date" class="form-input rounded-md shadow-sm block w-full" id="arrival_date" name="arrival_date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-b-lg border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                    <h2 class="accordion-header mb-0" id="headingThree">
                        <button
                            class="group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                            type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                            <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>
                            </span>
                        </button>
                    </h2>
                    <div id="collapseThree" class="!visible hidden" data-te-collapse-item aria-labelledby="headingThree" data-te-parent="#accordionExample">
                        <div class="px-5 py-4">
                            <div class="mb-4">
                                <label for="boat_id" class="block text-gray-700 font-bold mb-2">Bateau</label>
                                <select id="boat_id" class="form-select rounded-md shadow-sm block w-full" name="boat_id" required>
                                    <option value="">Sélectionnez un bateau</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-b-lg border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                    <h2 class="accordion-header mb-0" id="headingFour">
                        <button
                            class="group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                            type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Accordion Item #4
                            <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>
                            </span>
                        </button>
                    </h2>
                    <div id="collapseFour" class="!visible hidden" data-te-collapse-item aria-labelledby="headingFour" data-te-parent="#accordionExample">
                        <div class="px-5 py-4">
                            <div class="mb-4">
                                <div class="flex flex-col gap-6">
                                    <div class="border border-gray-300 rounded-xl flex flex-row w-fit">
                                        <div class="flex flex-col py-3 pl-6 pr-16">
                                            <div class="flex flex-row gap-6">
                                                <div class="title">Adulte</div>
                                                <div class="prix border border-gray-300 px-1 rounded">22€</div>
                                            </div>
                                            <p>Passager à partir de 26 ans</p>
                                        </div>
                                        <div class="bg-blue-400 py-3 px-2 rounded-r-xl">
                                            <div class="flex flex-row gap-3">
                                                <button type="button" onclick="updateCompteur('-')" class="shadow-md border border-white w-8 h-8 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M200 606v-60h560v60H200Z"/></svg>
                                                </button>
                                                <div>
                                                    <button type="button"  onclick="updateCompteur('+')" class="shadow-md border border-white w-8 h-8 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M450 856V606H200v-60h250V296h60v250h250v60H510v250h-60Z"/></svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="flex flex-row gap-2">Quantité :<div id="compteur">{{ $compteur }}</div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <p id="availability" class="text-center"></p>
            </div>

            <div class="text-center">
                <button type="submit" id="submit-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-md disabled:opacity-50">Réserver</button>
            </div>

        </form>
    </div>
</div>





<script>
    $(document).ready(function() {
        // Cachez la liste des bateaux au début
        $("#boat_id").parent().hide();
        $("#extra_boat_select_div").hide();
        $("#submit-button").hide();

        // Écoutez les changements de valeur dans les champs de date
        $("#departure_date, #arrival_date").on("change", function() {
            // Vérifiez si les deux dates sont sélectionnées
            if ($("#departure_date").val() && $("#arrival_date").val()) {
                // Affichez la liste des bateaux
                $("#boat_id").parent().show();
                // Affichez le troisième champ <select>
                $("#extra_boat_select_div").show();
                // Récupérez les bateaux disponibles
                fetchAvailableBoats($("#departure_date").val(), $("#arrival_date").val(), $("#departure_port").val(), $("#arrival_port").val());
                $("#submit-button").show();
            } else {
                // Cachez la liste des bateaux si l'une des dates n'est pas sélectionnée
                $("#boat_id").parent().hide();
                // Cachez le troisième champ <select> si l'une des dates n'est pas sélectionnée
                $("#extra_boat_select_div").hide();
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
                var extra_boat_select = $('#extra_boat_id');
                boat_select.empty();
                extra_boat_select.empty();
                boat_select.append('<option value="">Sélectionnez un bateau</option>');
                extra_boat_select.append('<option value="">Sélectionnez un bateau supplémentaire</option>');
                $.each(data, function (index, available_boats) {
                    var option = '<option value="' + available_boats.id + '">' + available_boats.bateau + ' ' + available_boats.heure + '</option>';
                    boat_select.append(option);
                    extra_boat_select.append(option);
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error fetching available boats:', textStatus, errorThrown);
            },
        });
    }
</script>
<script>
    function updateCompteur(action) {
        const counter = document.getElementById('compteur');
        let currentValue = parseInt(counter.innerText);

        if (action === '+') {
            currentValue += 1;
        } else if (action === '-' && currentValue > 0) {
            currentValue -= 1;
        }

        counter.innerText = currentValue;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>h
</body>
</html>

