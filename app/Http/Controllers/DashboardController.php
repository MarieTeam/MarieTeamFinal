<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        // Calculer le nombre total de réservations
        $totalReservations = $reservations->count();

        // Définir la langue de Carbon en français
        Carbon::setLocale('fr');

        // Calculer le nombre de réservations par mois
        $reservationsPerMonth = $reservations->groupBy(function ($reservation) {
            setlocale(LC_TIME, app()->getLocale());
            $createdAt = Carbon::parse($reservation->created_at);
            return $createdAt->locale(app()->getLocale())->isoFormat('MMMM YYYY');
        })->map(function ($group) {
            return $group->count();
        });

        // Calculer le pourcentage des réservations mensuelles
        $percentagePerMonth = $reservationsPerMonth->map(function ($count) use ($totalReservations) {
            return round(($count / $totalReservations) * 100, 2);
        });

        return view('dashboard', [
            'reservations' => $reservations,
            'totalReservations' => $totalReservations,
            'reservationsPerMonth' => $reservationsPerMonth,
            'percentagePerMonth' => $percentagePerMonth,
        ]);

    }

}
