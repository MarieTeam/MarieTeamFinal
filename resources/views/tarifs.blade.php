<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>MARIE TEAM</title>
    <meta charset="UTF-8">
</head>
<body>
@include('components/nav')
<div>
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach( $types as $type )
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="v-pills-{{ $type->libelle }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $type->libelle }}" type="button" role="tab" aria-controls="v-pills-{{ $type->libelle }}" aria-selected="true">{{ $type->libelle }}</button>
            @endforeach
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            @foreach( $types as $type )
                    @if($type->libelle == "Passager")
                        <div class="tab-pane fade show active " id="v-pills-{{ $type->libelle }}" role="tabpanel" aria-labelledby="v-pills-{{ $type->libelle }}-tab" tabindex="0">
                            @foreach($TarifsEte as $tarif)
                                @foreach($tarifsHiver as $tarifH)
                                    @if ($tarif->lettre_type == "A" && $tarifH->lettre_type == "A" && $tarifH->num_type == $tarif->num_type)
                                        Prix indiqués aller simple:<br>
                                        <b>{{ $tarif->libelle }}</b><br>
                                        <div class="d-flex flex-row">
                                            <p style="color:blue;">{{ $tarif->tarif }}€</p> - <p style="color:red;">{{ $tarifH->tarif }}€</p>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                    @if($type->libelle == "Véhinf5m")
                        <div class="tab-pane fade" id="v-pills-{{ $type->libelle }}" role="tabpanel" aria-labelledby="v-pills-{{ $type->libelle }}-tab" tabindex="0">
                        @foreach($TarifsEte as $tarif)
                                @foreach($tarifsHiver as $tarifH)
                                    @if ($tarif->lettre_type == "B" && $tarifH->lettre_type == "B" && $tarifH->num_type == $tarif->num_type)
                                        Prix indiqués aller simple:<br>
                                        <b>{{ $tarif->libelle }}</b><br>
                                        <div class="d-flex flex-row">
                                            <p style="color:blue;">{{ $tarif->tarif }}€</p> - <p style="color:red;">{{ $tarifH->tarif }}€</p>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                    @if($type->libelle == "Véhsup5m")
                        <div class="tab-pane fade" id="v-pills-{{ $type->libelle }}" role="tabpanel" aria-labelledby="v-pills-{{ $type->libelle }}-tab" tabindex="0">
                        @foreach($TarifsEte as $tarif)
                                @foreach($tarifsHiver as $tarifH)
                                    @if ($tarif->lettre_type == "C" && $tarifH->lettre_type == "C" && $tarifH->num_type == $tarif->num_type)
                                        Prix indiqués aller simple:<br>
                                        <b>{{ $tarif->libelle }}</b><br>
                                        <div class="d-flex flex-row">
                                            <p style="color:blue;">{{ $tarif->tarif }}€</p> - <p style="color:red;">{{ $tarifH->tarif }}€</p>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endif
            @endforeach
        </div>
    </div>
</div>
</body>

</html>
